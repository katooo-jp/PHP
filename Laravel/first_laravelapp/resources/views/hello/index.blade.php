    {{---------------- Bladeディレクティブのテスト ----------------}}
@extends('base')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できる</p>

    {{----------- controllerテスト ------------------
    <p>Controller value<br>'message' = {{$message}}</p>
    ------------------------------------------------}}

    {{------------ composerテスト -------------------
    <p>ViewComposer value<br>'view_message' = {{$view_message}}</p>
    ------------------------------------------------}}

    {{------------- ミドルウェアテスト ---------------
    <table>
        @foreach($data as $item)
        <tr>
            <th>{{$item['name']}}</th>
            <td>{{$item['mail']}}</td>
        </tr>
        @endforeach
    </table>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>
    ----------------------------------------------}}


    {{-- @component('components.message')
        @slot('msg_title')
        CAUTION!
        @endslot

        @slot('msg_content')
        これはcomponentsメッセージの表示
        @endslot
    @endcomponent

    @include('components.message', ['msg_title'=>'include_title', 'msg_content'=>'inculueでのメッセージ',]) --}}



    {{------------------- バリデーションのテスト ---------------------
    <p>{{$msg}}</p>
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/hello" method="post">
    @csrf
    <table>
        <tr>
            <th>name:</th>
            <td><input type="text" name="name" value={{old('name')}}></td>
        </tr>
        <tr>
            <th>mail:</th>
            <td><input type="text" name="mail" value={{old('mail')}}></td>
        </tr>
        <tr>
            <th>age:</th>
            <td><input type="text" name="age" value={{old('age')}}></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit"></td>
        </tr>
    </table>
    </form>
    ----------------------------------------------}}


    {{--------------------- DB -----------------------
    --------------------------------------------------}}
    <table>
        <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->mail}}</td>
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    copyright 2022 kato.
@endsection
{{-- -------------------------------------------------------- --}}
