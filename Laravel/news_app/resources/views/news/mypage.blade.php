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
                <div class="card-header fw-bolder">お気に入りニュース一覧</div>

                <div class="card-body">
                    @foreach ($favorites as $data)
                    <div class="card-body pt-0 pb-2 mb-3">
                        <img class="img-fluid p-3" style="max-width: 100%; min-width: 100%; height:auto;" src="{{$data['image']}}">

                        <table>
                            <tr>
                                <th class="pr-2"></th>
                                <td><h3 class="h5 card-title"><a href="{{$data['url']}}">{{$data['title']}}</a></h3></td>
                            </tr>
                        </table>

                        <p class="m-0">作成者:{{$data['author']}}</p>
                        <p>{{$data['news_create_at']}}</p>
                        <div class="mb-5 text-right">
                            <!-- Modal trigger -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data['id']}}">
                                お気に入り削除
                            </button>
                        </div>
                    </div>

                    <!-- deleteModal -->
                    <div class="modal fade" id="deleteModal{{$data['id']}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$data['id']}}" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel{{$data['id']}}">お気に入りから削除しますか？</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid p-3" style="max-width: 100%; min-width: 100%; height:auto;" src="{{$data['image']}}">
                                <p><span class="fw-bold">タイトル：</span><br>{{$data['title']}}</p>
                                <p><span class="fw-bold">作成者：</span><br>{{$data['author']}}</p>
                                <p><span class="fw-bold">ニュース作成日：</span><br>{{$data['news_create_at']}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                                <form action="{{route('news.destroy', $data['id'])}}" method="post">
                                    @csrf
                                    @method('delete')
                                <button type="submit" class="btn btn-danger">削除</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
