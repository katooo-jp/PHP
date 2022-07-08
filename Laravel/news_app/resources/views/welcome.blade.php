@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">世界一愛されているニュースサイト</div>

                <div class="card-body">
                    <p class="lh-lg">毎日たくさんのニュースにはうんざり！<br>
                    <span class="text-primary fw-bolder fs-4 mr-2">News App</span>ならばトレンドになっているニュースだけを厳選してお届けします！！<br>
                    便利なお気に入り登録機能は気になるニュースをStock!!<br>
                    さあ、<a href="{{ route('register') }}">無料で会員登録</a>をして世界一愛されているニュースサイトをクールに使いこなそう！！！</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
