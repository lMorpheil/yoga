<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Employees;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $actions = Action::all();
        $employees = Employees::all();
        return view('public.index.index', compact('actions', 'employees'));
    }
}
