<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseFeedback;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Jackiedo\Cart\Facades\Cart;
use phpDocumentor\Reflection\Types\Collection;

class PublicController extends Controller
{
    public \Jackiedo\Cart\Cart $cart;

    public function __construct()
    {
        $this->cart = Cart::name('wake_cart');
    }

    public function index($url_referred = null)
    {
        $courses = Course::limit(5)->get();
        $categories = Category::all();
        $memberships = Membership::limit(3)->get();
        $activities = Activity::orderByDesc('date')->limit(6)->get();

        if ($url_referred)
            session(['url_referred' => $url_referred]);

        return view('public.index', compact('courses', 'categories', 'memberships','activities'));
    }

    public function courses()
    {
        $courses = Course::withAvg('course_feedback','rate')->paginate();
        $categories = Category::all();
        $teacher_ids = Course::pluck('teacher_id','teacher_id')->toArray();
        $teachers = User::whereIn('id', $teacher_ids)->where('roles_id', 4)->get();
        return view('public.courses', compact('courses','categories','teachers'));
    }

    public function course($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if ($course) {
            $teacher = $course->teacher->teacher;
            $comments = $course->comments;
            $statistic = $course->showStatisticsRate();
            $averageRating = number_format(CourseFeedback::where('course_id', $course->id)->avg('rate'), 1);

            return view('public.course', compact('course', 'teacher', 'comments', 'statistic', 'averageRating'));
        }
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $categories = Category::get();
        $teacher_ids = Course::pluck('teacher_id','teacher_id')->toArray();
        $teachers = User::whereIn('id', $teacher_ids)->where('roles_id', 4)->get();

        $courses = Course::withAvg('course_feedback', 'rate')
            ->when($request->category, function ($query) use ($request) {
                foreach ($request->category as $category) {
                    $query->orWhereJsonContains('categories', $category);
                }
                return $query;
            })
            ->when($request->teacher, function ($query) use ($request) {
                return $query->whereIn('teacher_id', $request->teacher);
            })
            ->when($request->price, function ($query) use ($request) {
                if ($request->price == 'free')
                    return $query->whereNotNull('free');
                elseif ($request->price == 'paid')
                    return $query->whereNull('free');
                else
                    return $query;
            })
            ->when($request->rating, function ($query) use ($request) {
                return $query->having('course_feedback_avg_rate',$request->rating);
            })
            ->paginate();

        return view('public.courses', compact('courses','categories','teachers'));

    }

    public function blog()
    {
        return view('public.blog');
    }

    public function teachers()
    {
        return view('public.teachers');
    }

    public function privacy()
    {
        return view('public.privacy');
    }

    public function warranty()
    {
        return view('public.warranty');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function helpCenter()
    {
        return view('public.help-center');
    }

    public function changeLanguage($lang)
    {
        Session::put('locale', $lang);

        return redirect()->back();
    }

    public function events()
    {
        $activities = Activity::orderByDesc('created_at')->paginate(9);
        return view('public.events', compact('activities'));
    }

    public function event(Activity $activity)
    {
        return view('public.event', compact('activity'));
    }

    public function wake()
    {
        return view('public.wake');
    }
}
