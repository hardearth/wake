<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseLive;
use App\Models\CourseLiveRegister;
use Carbon\Carbon;

class CourseLiveRegisterController extends Controller
{
    public function index()
    {
        $courses = \Auth::user()->courses();
        $categories = [];
        $array = [];

        foreach ($courses as $course) {
            foreach ($course->categories as $value)
                $categories[$value] = $value;
        }

        foreach ($categories as $category)
            $array[] = CourseLive::orderBy('lesson_date_at')->whereJsonContains('categories', [$category])->pluck('id','id')->toArray();

        $courseLive = CourseLive::whereIn('id', \Arr::collapse($array))
            ->where('lesson_date_at', '>', date('Y-m-d 00:00:00'))
            ->orderBy('lesson_date_at')
            ->paginate(6);

        return view('user.course_live.index',compact('courseLive'));
    }

    public function register($slug): \Illuminate\Http\RedirectResponse
    {
        \DB::beginTransaction();
        try {

            $courseLive = CourseLive::where('slug', $slug)->first();
            $now = Carbon::now();

            if ($now > $courseLive->lesson_date_at) {
                flash()->addInfo(__('La fecha de la sesión ha expirado'));
                return redirect()->back();
            }


            if ($courseLive) {

                $registered = new CourseLiveRegister();
                $registered->course_live_id = $courseLive->id;
                $registered->users_id = \Auth::id();
                $registered->save();

                \DB::commit();

                flash()->addSuccess(__('Registrado'), __('Clase en vivo'));

            }
        } catch (\Exception $exception) {

            \DB::rollBack();

            flash()->addError(__('Error'));

        }
        return redirect()->back();

    }
}
