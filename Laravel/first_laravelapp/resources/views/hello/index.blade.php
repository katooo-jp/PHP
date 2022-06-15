@extends('base')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できる</p>
@endsection

@section('footer')
    copyright 2022 kato.
@endsection
