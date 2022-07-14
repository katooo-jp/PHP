<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class Jissyu6_1Controller extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        $param = ['items'=> $items, 'input'=> $request->input];
        return view('jissyu/jissyu6_1.index', $param);
    }
    public function find(Request $request)
    {
        $item = Person::where('id', $request->input)->first();
        return view('jissyu/jissyu6_1/show', ['item' => $item]);
    }
}
