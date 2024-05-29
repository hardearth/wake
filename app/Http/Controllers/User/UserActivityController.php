<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityRegister;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        $activitiesRegister = ActivityRegister::where('user_id', Auth::id())->get();
        return view('user.activity.index', compact('activities', 'activitiesRegister'));
    }
}
