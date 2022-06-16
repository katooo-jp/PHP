@extends('base')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できる</p>
    <p>Controller value<br>'message' = {{$message}}</p>
    <p>ViewComposer value<br>'view_message' = {{$view_message}}</p>

    @component('components.message')
        @slot('msg_title')
        CAUTION!
        @endslot

        @slot('msg_content')
        これはcomponentsメッセージの表示
        @endslot
    @endcomponent

    @include('components.message', ['msg_title'=>'include_title', 'msg_content'=>'inculueでのメッセージ',])
@endsection

@section('footer')
    copyright 2022 kato.
@endsection
