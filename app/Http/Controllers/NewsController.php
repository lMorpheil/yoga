<?php

namespace App\Http\Controllers;

use App\Models\NewList;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewList::all();

        return view('public.news.index', compact('news'));
    }
}
