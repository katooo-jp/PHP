@extends('layouts.kouka2_1')

@section('title', 'Kouka')

@section('menu_title')
検索エンジン新規登録画面
@endsection

@section('content')
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
   <form action="/kouka2_2/create" method="post">
   <table>
      @csrf
      <tr><th>Name: </th><td><input type="text" name="message" value="{{old('message')}}"></td></tr>
    <tr><th>URL: </th><td><input type="text" name="url" value="{{old('url')}}"></td></tr>
    <tr><th></th><td><input type="submit" value="新規登録"></td></tr>
   </table>
   </form>
@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection
