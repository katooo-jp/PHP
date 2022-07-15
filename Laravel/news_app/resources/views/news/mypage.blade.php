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
                        マイページです。</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
