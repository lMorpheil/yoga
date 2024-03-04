<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use Illuminate\Http\Request;

class ActionsController extends Controller
{
    public function index()
    {
        $actions = Action::simplePaginate(10);
        return view('admin.actions.index', compact('actions'));
    }

    public function create()
    {
        return view('admin.actions.create', );
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'image' => 'required',
        ]);

        $path = $request->file('image')->store('uploads', 'public');

        Action::create([
            'text' => $request->text,
            'image' => $path,
        ]);

        $request->session()->flash('success', 'Акция создана');

        return redirect()->route('actions.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $actions = Action::find($id);

        return view('admin.actions.edit', compact('actions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required',
            'image' => 'required',
        ]);

        $action = Action::find($id);
        $path = $request->file('image')->store('uploads', 'public');

        $action->update([
            'text' => $request->text,
            'image' => $path,
        ]);

        return redirect()->route('actions.index')->with('success', 'Акция изменена');
    }

    public function destroy($id)
    {
        $actions = Action::find($id);
        $actions->delete();

        return redirect()->route('actions.index')->with('success', 'Акция удалена');
    }
}
