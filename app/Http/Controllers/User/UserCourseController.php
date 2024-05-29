<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseComment;
use App\Models\CourseDocument;
use App\Models\CourseFeedback;
use App\Models\CourseLesson;
use App\Models\User;
use App\Models\UserNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserCourseController extends Controller
{
    public function index($slug, $lesson = null)
    {

        if ($lesson) {
            $lesson = CourseLesson::find($lesson);
            $module = $lesson->module;
            $course = $module->course;
            if ($slug != $course->slug) {
                return redirect()->back();
            }
        } else {
            $course = Course::where('slug', $slug)->first();
            $courseRegistered = $course->registered->where('users_id', Auth::id())->first();
            if ($courseRegistered) {
                $module = null;
                $lesson = null;
            } else {
                return redirect()->route('public.course', $slug);
            }
        }

        return view('user.lesson', compact('course', 'module', 'lesson'));
    }

    public function myCourses()
    {
        $courses = Auth::user()->courses();
        $coursesAvailable = Course::all()->random()->limit(10)->get();

        return view('user.course.my-courses', compact('courses','coursesAvailable'));
    }

    public function myNotes()
    {
        $userNotes = UserNote::where('user_id', Auth::id())->paginate(10);
        return view('user.course.my-notes', compact('userNotes'));
    }

    public function downloadDocument(CourseDocument $document)
    {
        return Storage::download($document->path);
    }

    public function storeComment(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        $comment = new CourseComment();
        $comment->fill($request->all());
        $comment->course_id = $course->id;
        $comment->user_id = Auth::id();
        if ($comment->save()) {
            flash()->addSuccess(__('Gracias por tu comentario'));
        }

        return redirect()->back();
    }

    public function feedback($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if ($course) {
            $module = null;
            $lesson = null;
        } else {
            $module = null;
            $lesson = null;
        }

        return view('user.course.feedback', compact('course', 'module', 'lesson'));
    }

    public function storeFeedback(Request $request, Course $course)
    {
        $request->validate([
            'rate' => 'required|integer|min:1|max:5',
            'comments' => 'required|string',
        ]);

        $feedback = CourseFeedback::firstOrNew([
            'user_id' => Auth::id(),
            'course_id' => $course->id
        ]);
        $feedback->fill($request->all());
        $feedback->course_id = $course->id;
        $feedback->user_id = Auth::id();
        if ($feedback->save()) {
            flash()->addSuccess(__('Gracias por tu tiempo'));
        }

        return redirect()->back();
    }

    public function ajaxLessonRegisterNewNote(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'name_note' => 'required',
                'lesson_id' => ['required', Rule::exists('course_lessons', 'id')],
                'time_video' => 'numeric|required'
            ]);

            \DB::beginTransaction();
            try {

                $note = new UserNote();
                $note->user_id = Auth::id();
                $note->course_lesson_id = $request->lesson_id;
                $note->note = $request->name_note;
                $note->time_video = $request->time_video;
                $note->save();

                \DB::commit();

                $lesson_notes = \Auth::user()->getNotesByLesson($request->lesson_id);

                return view('user.lesson.notes', compact('lesson_notes'));

            } catch (\Exception $exception) {
                \DB::rollBack();
                abort(500, $exception->getMessage());
            }
        } else {
            abort(500, 'Error al realizar petición');
        }
    }

    public function ajaxLessonUpdateNote(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'note_id' => ['required', Rule::exists('user_notes', 'id')],
                'name_note' => 'required'
            ]);

            \DB::beginTransaction();
            try {

                $note = UserNote::where('id', $request->note_id)->where('user_id', Auth::id())->first();

                if (!$note)
                    abort(400, 'No existe nota');

                $note->note = $request->name_note;
                $note->save();

                \DB::commit();

                $lesson_notes = \Auth::user()->getNotesByLesson($note->course_lesson_id);

                return view('user.lesson.notes', compact('lesson_notes'));

            } catch (\Exception $exception) {

                \DB::rollBack();

                abort(500, $exception->getMessage());

            }

        } else {
            abort(500, 'Error al realizar petición');
        }
    }

    public function ajaxLessonDeleteNote(UserNote $note)
    {
        \DB::beginTransaction();
        try {

            $note->delete();

            \DB::commit();

            $lesson_notes = \Auth::user()->getNotesByLesson($note->course_lesson_id);

            return view('user.lesson.notes', compact('lesson_notes'));

        } catch (\Exception $exception) {

            \DB::rollBack();

            abort(500, $exception->getMessage());

        }
    }
}
