<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseLive;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseLiveController extends Controller
{

    public function index()
    {
        $liveLessons = CourseLive::orderBy('created_at')->paginate(20);
        return view('admin.course_live.index', compact('liveLessons'));
    }

    public function create()
    {
        $teachers = User::whereRolesId(4)->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.course_live.create', compact('teachers','categories'));

    }
    public function edit(CourseLive $liveLesson)
    {
        $teachers = User::whereRolesId(4)->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.course_live.edit', compact('teachers','liveLesson','categories'));

    }

    public function update(Request $request, CourseLive $liveLesson): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'teacher_id' => [
                'required',
                Rule::exists('users', 'id')->where(function (Builder $query) {
                    return $query->where('roles_id', 4);
                })
            ],
            'lesson_date_at' => 'required|date|after:'.date('Y-m-d'),
            'url_video' => 'url',
            'url_meeting' => 'required|url',
            'categories' => 'required',
            'description' => 'required',
        ]);

        \DB::beginTransaction();
        try {

            $liveLesson->fill($request->all());
            $liveLesson->save();

            \DB::commit();

            flash()->addSuccess(__('Guardado'));


        } catch (\Exception $exception) {
            \DB::rollBack();
            flash()->addError(__('Ha surgido un error al editar la Clase'));
        }
        return redirect()->back();
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'teacher_id' => [
                'required',
                Rule::exists('users', 'id')->where(function (Builder $query) {
                    return $query->where('roles_id', 4);
                })
            ],
            'lesson_date_at' => 'required|date|after:'.date('Y-m-d'),
            'url_video' => 'url',
            'url_meeting' => 'required|url',
            'categories' => 'required',
            'description' => 'required',
        ]);

        \DB::beginTransaction();
        try {

            $newLesson = new CourseLive();
            $newLesson->fill($request->all());
            $newLesson->save();

            \DB::commit();

            flash()->addSuccess(__('Guardado'));
            return redirect()->route('admin.course.live.index');

        } catch (\Exception $exception) {
            \DB::rollBack();
            flash()->addError(__('Ha surgido un error al guardar la Clase'));
            return redirect()->back();
        }
    }

    public function delete(CourseLive $liveLesson): \Illuminate\Http\RedirectResponse
    {

        \DB::beginTransaction();

        try {

            $liveLesson->delete();

            \DB::commit();

            flash()->addSuccess(__('Eliminado'));

        } catch (\Exception $exception) {

            \DB::rollBack();

            flash()->addError(__('Ha surgido un error al eliminar la Clase'));

        }

        return redirect()->back();

    }

}
