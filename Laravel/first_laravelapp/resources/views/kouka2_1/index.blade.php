@extends('layouts/kouka2_1')

@section('title', 'Kouka')

@section('menu_title')
検索エンジン一覧画面
@endsection

@section('content')
    <form action="/kouka2_1/find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="検索">
    </form>
   <table>
   <tr><th>Name</th><th>URL</th></tr>
   @foreach ($items as $item)
       <tr>
           <td>{{$item->message}}</td>
           <td>{{$item->url}}</td>
       </tr>
   @endforeach
   </table>
@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection
