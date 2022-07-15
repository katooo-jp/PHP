@extends('layouts.app')

@section('dropdown')
    <a class="dropdown-item" href="/home/news">mypage</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::check())
                        <p>ようこそ、{{Auth::user()->name}}さん<br>
                            <span class="text-primary fw-bolder fs-4 mr-2">News App</span>のユーザになったその日からあなたは最高にクールだ！！</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ニュース一覧 --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-5">注目のニュースTop３</div>

                <div class="card-body">
                    @for ($i = 0; $i < 3; $i++)
                    <div class="card-body pt-0 pb-2 mb-3">
                        <img class="img-fluid p-3" style="max-width: 100%; min-width: 100%; height:auto;" src="{{$news[$i]['image']}}">

                        <table>
                            <tr>
                                <th class="pr-2"><div class="fs-3 text-white fw-bolder rounded-3 p-2 text-center" style="width:2em; background-color: {{$colors[$i]}}">{{$i+1}}</div></th>
                                <td><h3 class="h5 card-title"><a href="{{$news[$i]['url']}}">{{$news[$i]['title']}}</a></h3></td>
                            </tr>
                        </table>

                        <p class="m-0">作成者:{{$news[$i]['author']}}</p>
                        <p>{{$news[$i]['create_at']}}</p>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
