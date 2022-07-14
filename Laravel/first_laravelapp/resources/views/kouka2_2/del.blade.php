@extends('layouts.kouka2_1')

@section('title', 'Kouka')

@section('menu_title')
検索エンジン削除画面
@endsection

@section('content')
   <form action="/kouka2_2/remove" method="post">
   <table>
      @csrf
      <input type="hidden" name="id" value="{{$item->id}}">
      <tr><th>Name: </th><td>{{$item->message}}</td></tr>
      <tr><th>URL: </th><td>{{$item->url}}</td></tr>
      <tr><th></th><td><input type="submit" value="削除"></td></tr>
   </table>
   </form>
@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection
