<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return redirect()->route('schedule.show', 'monday');
    }

    public function create(Request $request)
    {
        $days = [
            'monday' => 'понедельник',
            'tuesday' => 'вторник',
            'wednesday' => 'среда',
            'thursday' => 'четверг',
            'friday' => 'пятница',
            'saturday' => 'суббота',
            'sunday' => 'воскресенье',
        ];

        $slug = $request->input('slug');
        $day = $request->input('day');
        return view('admin.schedule.create', compact('slug', 'day'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hour' => 'required',
            'minute' => 'required',
            'section' => 'required',
            'price' => 'required',
            'day' => 'required',
            'slug' => 'required',
        ]);

        Schedule::create([
            'hour' => $request->hour,
            'minute' => $request->minute,
            'section' => $request->section,
            'price' => $request->price,
            'day' => $request->day,
            'slug' => $request->slug,
        ]);

        $request->session()->flash('success', 'Добавлен пункт в расписание');

        return redirect()->route('schedule.index');
    }

    public function show($slug)
    {
        $title = [
            'monday' => 'понедельник',
            'tuesday' => 'вторник',
            'wednesday' => 'среда',
            'thursday' => 'четверг',
            'friday' => 'пятница',
            'saturday' => 'суббота',
            'sunday' => 'воскресенье',
        ];

        $schedule = Schedule::where('slug', $slug)->get() ?? [];

        $day = $title[$slug];

        return view('admin.schedule.show', compact('schedule', 'day', 'slug'));
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hour' => 'required',
            'minute' => 'required',
            'section' => 'required',
            'price' => 'required',
            'day' => 'required',
            'slug' => 'required',
        ]);

        $schedule = Schedule::find($id);
        $schedule->update([
            'hour' => $request->hour,
            'minute' => $request->minute,
            'section' => $request->section,
            'price' => $request->price,
            'day' => $request->day,
            'slug' => $request->slug,
        ]);

        return redirect()->route('schedule.index')->with('success', 'Расписание изменено');
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Удален пункт расписания');
    }
}
