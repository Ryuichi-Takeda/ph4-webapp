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

        // 今月の勉強時間
        $month_study_hours = Post::where('user_id', $user_id)
            ->whereYear('day', date('Y'))
            ->whereMonth('day', date('m'))
            ->sum('hour');

        // 総学習時間
        $total_study_hours = Post::where('user_id', $user_id)->sum('hour');

        return view('webapp', compact('today_study_hours', 'month_study_hours', 'total_study_hours'));
    }
}
