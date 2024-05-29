<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseDocument;
use App\Models\CourseLesson;
use App\Models\CourseModule;
use App\Models\CoursePrice;
use App\Models\CourseRegister;
use App\Models\User;
use App\Models\UserBill;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::paginate();
        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $teachers = User::all()->pluck('name', 'id');
        return view('admin.course.create', compact('categories', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name"       => "required",
            "price"      => "required",
            "language"   => "required",
            "level"      => "required",
            "categories" => "required",
            "teacher_id" => 'required|exists:users,id',
            'image'      => 'required|image',
            'video'      => 'nullable|url'
        ]);

        $course = new Course();
        $course->fill($validated);

        //Generamos un nombre aleatorio para la imagen
        $name = uniqid() . '.' . $request->image->getClientOriginalExtension();
        $course->image = $name;
        $course->categories = $course->categories;
        if ($course->save()) {
            $this->uploadImage($request, $course);
            $cp = new CoursePrice();
            $cp->amount = $request->price;
            $cp->courses_id = $course->id;
            $cp->save();
            flash()->addSuccess('Curso creado');
        } else {
            $with = [];
        }
        return redirect()->route('admin.course.show', $course->id);
    }

    public function editCourse(Request $request, Course $course)
    {
        $validated = $request->validate([
            'name'        => 'required',
            //            'start_date'  => 'required',
            //            'end_date'    => 'required',
            'description' => 'required',
            'video'       => 'nullable|url',
            'image'       => 'nullable|file|image',
        ]);

        $course->fill($request->all());
        if (isset($request->image)) {
            $name = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $course->image = $name;
        }
        if ($course->save()) {
            if (isset($request->image)) {
                $this->uploadImage($request, $course);
            }
            flash()->addSuccess(__('Actualizado'));
        }

        return redirect()->back();
    }

    public function uploadImage(Request $request, $model)
    {
        $path = '/public/course/' . $model->id . '/';
        $request->image->storeAs($path, $model->image);
    }

    public function show(Course $course)
    {
        $modules = CourseModule::whereCoursesId($course->id)->get();
        $lessonsList = CourseLesson::join('course_modules', 'course_modules.id', 'course_lessons.course_modules_id')
            ->where('course_modules.courses_id', $course->id)
            ->select(DB::raw('course_lessons.*,concat(course_modules.name," - ",course_lessons.name ) as text'))
            ->orderBy('course_modules.name')
            ->orderBy('course_lessons.name')
            ->get()
            ->pluck('text', 'id');
        $userBills = UserBill::whereHas('course_registered', function (Builder $query) use($course) {
            $query->where('courses_id', '=', $course->id);
        });
        $usersIds = $userBills->pluck('users_id');
        $users = User::whereNotIn('id',$usersIds)->where('roles_id',3)->orderBy('name')->pluck('name','id');
        $userBills = $userBills->paginate(10);
        $categories= Category::all()->pluck('name','id');
        $teachers = User::all()->pluck('name', 'id');


        return view('admin.course.show', compact('course', 'modules', 'lessonsList','userBills','users','categories','teachers'));

    }

    public function storeModule(Request $request, CourseModule $module)
    {
        $validated = $request->validate([
            'name'        => 'required',
            'description' => 'required',
        ]);

        $module->fill($request->all());
        if ($module->save()) {
            flash()->addSuccess(__('Guardado'));
        } else {
            flash()->addError('Ha surgido un error al agregar el módulo');
        }

        return redirect()->back();
    }

    public function deleteModule(CourseModule $module)
    {
        $module->delete();
        return redirect()->back();
    }

    public function storeLesson(Request $request, CourseLesson $lesson)
    {
        $validated = $request->validate([
            'name'              => 'required',
            'description'       => 'required',
            'url_video'         => 'required|url',
            'course_modules_id' => 'required',
            'duration'          => 'required|integer',
        ]);

        $lesson->fill($request->all());
        if ($lesson->save()) {
            flash()->addSuccess(__('Guardado'));
        } else {
            flash()->addError('Ha surgido un error al agregar el módulo');
        }

        return redirect()->back();
    }

    public function deleteLesson(CourseLesson $lesson)
    {
        $lesson->delete();
        return redirect()->back();
    }

    public function storeDocument(Request $request)
    {
        $validated = $request->validate([
            'lessons_lists' => 'required',
            'documents'     => ['mimes:pdf,doc,docx,xls,xslx,ppt,pptx']
        ]);
        $lesson = CourseLesson::find($request->lessons_lists);

        $courseDocument = new CourseDocument();
        $courseDocument->name = $request->documents->getClientOriginalName();
        $courseDocument->type = $request->documents->getClientOriginalExtension();
        $path = 'course/' . $lesson->module->course->id . '/' . $lesson->course_modules_id . '/' . $lesson->id . '/';
        $request->documents->storeAs($path, $courseDocument->name);
        $courseDocument->path = $path . $courseDocument->name;
        $courseDocument->course_lessons_id = $lesson->id;
        $courseDocument->created_user = Auth::id();
        if ($courseDocument->save()) {
            flash()->addSuccess($courseDocument->name . ' Agregado');
        }

        return redirect()->back();
    }

    public function addUserToCourse(Request $request, Course $course)
    {

        $request->validate([
            'user_id' => ['required', Rule::exists('users','id')]
        ]);

        DB::beginTransaction();
        try {

            $user = User::find($request->user_id);

            $bill = new UserBill();
            $bill->uuid = Str::uuid();
            $bill->users_id = $user->id;
            $bill->name = $user->name;
            $bill->email = $user->email;
            $bill->courses = $course->toArray();
            $bill->lastname = 'NA';
            $bill->city = 'NA';
            $bill->amount = 0;
            $bill->countries_id = 49;
            $bill->cellphone = 0;
            $bill->payment_method = 'free';
            $bill->status = 'A';
            $bill->save();

            $courseReg = new CourseRegister();
            $courseReg->courses_id = $course->id;
            $courseReg->users_id = $bill->users_id;
            $courseReg->user_bill_id = $bill->id;
            $courseReg->created_user = Auth::id();
            $courseReg->save();

            DB::commit();
            flash()->addSuccess(__('Registro Guardado'));

        }catch (\Exception $exception){
            DB::rollBack();
            flash()->addError('Ha surgido un error');
        }

        return redirect()->back();

    }


    public function downloadDocument(CourseDocument $document)
    {
        return Storage::download($document->path);
    }

    public function delete(Course $course)
    {
        $course->delete();
        flash()->addSuccess('Eliminado');
        return redirect()->back();
    }
}
