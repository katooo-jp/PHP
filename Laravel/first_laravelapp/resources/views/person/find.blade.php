@extends('base')

@section('title', 'person.find')

@section('menubar')
    @parent
    <a href="/person">HOME</a></li>
    <li><a href="/person/find/">ID検索</a></li>
@endsection

@section('content')
    <form action="/person/find" method="post">
        @csrf
        <input type="text" name="input" value="{{$input}}">
        <input type="submit" value="find">
    </form>
    @if(isset($item))
    <table>
        <tr><th>Data</th></tr>
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
    </table>
    @endif
@endsection

@section('footer', '2022 study laravel')
