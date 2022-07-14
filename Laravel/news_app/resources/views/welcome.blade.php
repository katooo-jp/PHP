@extends('layouts.app')

@section('content')
<div class="container">
    {{-- リード文 --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-5">世界一愛されているニュースサイト</div>

                <div class="card-body">
                    <p class="lh-lg">毎日たくさんのニュースにはうんざり！<br>
                    <span class="text-primary fw-bolder fs-4 mr-2">News App</span>ならばトレンドになっているニュースだけを厳選してお届けします！！<br>
                    便利なお気に入り登録機能は気になるニュースをStock!!<br>
                    さあ、<a href="{{ route('register') }}">無料で会員登録</a>をして世界一愛されているニュースサイトをクールに使いこなそう！！！</p>
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
@endsection
