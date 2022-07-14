@extends('layouts.kouka2_1')

@section('title', 'Kouka')

@section('menu_title')
検索エンジン一覧画面
@endsection

@section('content')
    <form action="/kouka2_2/find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="検索">
    </form>
   <a href="/kouka2_2/add">新規登録</a>
   <table>
   <tr><th>Name</th><th>URL</th><th>Select</th><th>Update</th><th>Delete</th></tr>
   @foreach ($items as $item)
       <tr>
           <td>{{$item->message}}</td>
           <td>{{$item->url}}</td>
           <td><a href="/kouka2_2/show?id={{$item->id}}">詳細</a></td>
           <td><a href="/kouka2_2/edit?id={{$item->id}}">更新</a></td>
           <td><a href="/kouka2_2/del?id={{$item->id}}">削除</a></td>
       </tr>
   @endforeach
   </table>
@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection
