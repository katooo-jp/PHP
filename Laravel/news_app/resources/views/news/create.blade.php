@extends('layouts.app')

@section('dropdown')
    <a class="dropdown-item" href="{{route('home')}}">Home</a>
    <a class="dropdown-item" href="{{route('news.index')}}">My page</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お気に入り登録画面</div>
                <div class="card-body pt-0 pb-2 mb-3">
                    <img class="img-fluid p-3" style="max-width: 100%; min-width: 100%; height:auto;" src="{{$param['image']}}">
                    <table>
                        <tr>
                            <th>ニュース作成日時：</th>
                            <td>{{$param['create_at']}}</td>
                        </tr>
                        <tr>
                            <th>タイトル：</th>
                            <td>{{$param['title']}}</td>
                        </tr>
                        <tr>
                            <th>作成者：</th>
                            <td>{{$param['author']}}</td>
                        </tr>
                        <tr>
                            <th>URL：</th>
                            <td><a href="{{$param['url']}}">{{$param['url']}}</a></td>
                        </tr>
                    </table>
                    <div class="mt-5 text-right">
                        <form action="{{route('news.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$param['id']}}">
                            <input type="hidden" name="image" value="{{$param['image']}}">
                            <input type="hidden" name="create_at" value="{{$param['create_at']}}">
                            <input type="hidden" name="title" value="{{$param['title']}}">
                            <input type="hidden" name="author" value="{{$param['author']}}">
                            <input type="hidden" name="url" value="{{$param['url']}}">
                            <a class="btn btn-danger" href="{{route('home')}}" role="button" >キャンセル</a>
                            <button class="btn btn-primary mx-4" type="submit">お気に入り登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
