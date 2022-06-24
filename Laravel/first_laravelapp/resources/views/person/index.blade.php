@extends('base')

@section('title', 'person.index')

@section('menubar')
    @parent
    <a href="/person">HOME</a></li>
    <li><a href="/person/find/">ID検索</a></li>
@endsection

@section('content')
    {{-- <table>
        <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
        @foreach ($items as $item)
            <tr>
                <td> {{$item->name}} </td>
                <td> {{$item->mail}} </td>
                <td> {{$item->age}} </td>
            </tr>
        @endforeach
    </table> --}}

    <table>
        <tr><th>Data</th></tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer', '2022 study laravel')
