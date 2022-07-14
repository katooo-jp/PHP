<?php

namespace App\Http\Controllers;

use App\Restdata;
use Illuminate\Http\Request;

class Kouka2_1Controller extends Controller
{
    public function index()
    {
        $items = Restdata::all();
        $param = ['input' => '','items' => $items];
        return view('kouka2_1.index', $param);
    }
    public function find(Request $request)
    {
        //where()メソッドを利用すること。
        $item = Restdata::where('message', $request->input)->first();
        return view('kouka2_1/show', ['item' => $item]);
    }
}
