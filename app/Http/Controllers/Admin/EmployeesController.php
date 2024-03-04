<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $employees = Employees::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.create', );
    }

    public function store(Request $request)
    {
        $request->validate([
            'previews' => 'required',
            'img_modal' => 'required',
            'name' => 'required',
            'profession' => 'required',
            'age_years' => 'required',
        ]);

        $path_previews = $request->file('previews')->store('uploads', 'public');
        $path_img_modal = $request->file('img_modal')->store('uploads', 'public');
        Employees::create([
            'previews' => $path_previews,
            'img_modal' => $path_img_modal,
            'name' => $request->name,
            'profession' => $request->profession,
            'age_years' => $request->age_years,
        ]);

        $request->session()->flash('success', 'Сотрудник добавлен');

        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $employee = Employees::find($id);

        return view('admin.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'previews' => $request->previews,
            'img_modal' => $request->img_modal,
            'name' => $request->name,
            'profession' => $request->profession,
            'age_years' => $request->age_years,
        ]);

        $employee = Employees::find($id);
        $path_previews = $request->file('previews')->store('uploads', 'public');
        $path_img_modal = $request->file('img_modal')->store('uploads', 'public');
        $employee->update([
            'previews' => $path_previews,
            'img_modal' => $path_img_modal,
            'name' => $request->name,
            'profession' => $request->profession,
            'age_years' => $request->age_years,
        ]);

        return redirect()->route('employees.index')->with('success', 'Новость изменена');
    }

    public function destroy($id)
    {
        $employee = Employees::find($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Новость удалена');
    }

}
