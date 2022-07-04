@extends('layouts.kouka1_1')

@section('title', 'Kouka')

@section('menu_title')
ユーザ情報確認画面
@endsection

@section('content')
   <ol>
    <p>入力の確認をお願い致します。</p>
    {{--データを取り出す--}}
    <p>名　前:{{$data['name']}}</p>
    <p>住　所:{{$data['age']}}</p>
    <p>メール:{{$data['mail']}}</p>
    <p>学校名:{{$data['school']}}</p>
    <p>入力にお間違えはないでしょうか。</p>

@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection

