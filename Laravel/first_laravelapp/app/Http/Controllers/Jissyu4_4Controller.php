<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Jissyu4_4Request;

class Jissyu4_4Controller extends Controller
{
    public function index(Request $request)
    {
		// 　　クッキーの確認
        if($request->hasCookie('name')){
				//$dataへクッキーのデータを保存
            $data = array(
                'name' => $request->cookie('name'),
                'adress' => $request->cookie('adress'),
                'login_id' => $request->cookie('login_id'),
            );
        }else{
            $data =[
                'name' => '',
                'adress' => '',
                'login_id' => '',
            ];
        }
        return view('jissyu/jissyu4_4/input', ['data' => $data]);
    }

    public function post(Jissyu4_4Request $request)
    {
        //全データの取得
        $data = $request->all();
        $response = response()->view('jissyu/jissyu4_4.output',['data' => $data]);
        $response->cookie('name',$data['name'],100);
        $response->cookie('adress',$data['adress'],100);
        $response->cookie('login_id',$data['login_id'],100);

        return $response;

    }
}
