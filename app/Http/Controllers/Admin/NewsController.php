<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewList;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewList::simplePaginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create', );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
        ]);

        $path = $request->file('image')->store('uploads', 'public');
        $path_big = $request->file('big_image')->store('uploads', 'public');
        NewList::create([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $path,
            'big_image' => $path_big
        ]);

        $request->session()->flash('success', 'Категория добавлена');

        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $new = NewList::find($id);

        return view('admin.news.edit', compact('new'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
        ]);

        $new = NewList::find($id);
        $path = $request->file('image')->store('uploads', 'public');
        $path_big = $request->file('big_image')->store('uploads', 'public');
        $new->update([
            'title' => $request->title,
            'text' => $request->text,
            'image' => $path,
            'big_image' => $path_big
        ]);

        return redirect()->route('news.index')->with('success', 'Новость изменена');
    }

    public function destroy($id)
    {
        $new = NewList::find($id);
        $new->delete();

        return redirect()->route('news.index')->with('success', 'Новость удалена');
    }
}
