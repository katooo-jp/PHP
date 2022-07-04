@extends('layouts.kouka1_1')

@section('title', 'Kouka')

@section('menu_title')
ユーザ情報入力画面
@endsection

@section('content')
   <p>必要事項を記入してください。</p>
   @if (count($errors) > 0)
   <p>入力に問題があります。再入力して下さい。</p>
   @endif
   <table>
   <form action="/kouka1_2" method="post">
       @csrf
       <tr><th>名　　　前: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
       <tr><th></th><td>※必須項目。10文字以内。</td></tr>
       @if ($errors->has('name'))
       <tr><th></th><td><font color="red">{{$errors->first('name')}}</font></td></tr>
       @endif
       <tr><th>年　　　齢: </th><td><input type="text" name="age" value="{{old('age')}}"></td></tr>
       <tr><th></th><td>※必須項目。0～150の入力。</td></tr>
       @if ($errors->has('age'))
       <tr><th></th><td><font color="red">{{$errors->first('age')}}</font></td></tr>
       @endif
       <tr><th>メ　ー　ル: </th><td><input type="text" name="mail" value="{{old('mail')}}"></td></tr>
       <tr><th></th><td>※必須項目。</td></tr>
       @if ($errors->has('mail'))
       <tr><th></th><td><font color="red">{{$errors->first('mail')}}</font></td></tr>
       @endif
       <tr><th>学　校　名: </th><td><input type="text" name="school" value="{{old('school')}}" size="40"></td></tr>
       <tr><th></th><td>※必須項目。20文字以内の入力。</td></tr>
       @if ($errors->has('school'))
       <tr><th></th><td><font color="red">{{$errors->first('school')}}</font></td></tr>
       @endif
       <tr><th></th><td><input type="submit" value="send"></td></tr>
   </table>
   </form>
@endsection

@section('footer')
copyright 2020 東京情報クリエイター工学院専門学校.
@endsection
