<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller {
    public function index() {
        $favorites = News::where('user_id', Auth::user()->id)->get()->toArray();
        return view('news/mypage', ['favorites'=>$favorites]);
    }

    public function create(Request $request) {
        $param = $request->all();
        return view('news/create', ['param'=>$param]);
    }

    public function store(Request $request) {
        $param = [
            'user_id' => $request->id,
            'image' => $request->image,
            'author' => $request->author,
            'title' => $request->title,
            'news_create_at' => $request->create_at,
            'url' => $request->url,
        ];
        // DB登録
        $DB = new News();
        $DB->fill($param)->save();

        // 二重リクエスト対策
        $request->session()->regenerateToken();

        return redirect()->route('news.index');
    }

    public function destroy($id) {
        News::destroy($id);
        return redirect()->route('news.index');
    }
}
