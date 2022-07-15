<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\News;

class NewsController extends Controller {
    public function index() {
        return view('news/mypage');
    }

    public function create(Request $request) {
        return view('news/create');
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
