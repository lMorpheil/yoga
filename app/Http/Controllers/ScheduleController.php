<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $monday = Schedule::where('slug', 'monday')->get();
        $tuesday = Schedule::where('slug', 'tuesday')->get();
        $wednesday = Schedule::where('slug', 'wednesday')->get();
        $thursday = Schedule::where('slug', 'thursday')->get();
        $friday = Schedule::where('slug', 'friday')->get();
        $saturday = Schedule::where('slug', 'saturday')->get();
        $sunday = Schedule::where('slug', 'sunday')->get();
        $counts = [
            count($monday),
            count($tuesday),
            count($wednesday),
            count($thursday),
            count($friday),
            count($saturday),
            count($sunday),
        ];

        $maxCount = max($counts) < 7 ? 7 : max($counts);

        return view(
            'public.schedule.schedule',
            compact(
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday',
                'sunday',
                'maxCount',
            ));
    }
}
