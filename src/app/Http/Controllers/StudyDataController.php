<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class StudyDataController extends Controller
{
    public function index()
    {
        $user_id = 1;

        // 今日の勉強時間
        $today_study_hours = Post::where('user_id', $user_id)
            ->whereDate('day', date('Y-m-d'))
            ->sum('hour');
        return view('webapp',compact('today_study_hours'));
    }
}
