@extends('layouts.admin')
@section('title', 'Dancers Tweet一覧')

@section('content')
      <h1>Dancers Tweet一覧</h1>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ str_limit($post->name, 150) }}
                                </div>
                                <div class="janru">
                                    {{ str_limit($post->janru, 150) }}
                                </div>
                                <div class="tweet mt-3">
                                    {{ str_limit($post->tweet, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>



    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\DancersController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\DancersController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">ダンサーネーム</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-dancers col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">ダンサーネーム</th>
                                <th width="20%">ジャンル</th>
                                <th width="40%">つぶやき</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $dancers)
                                <tr>
                                    <th>{{ $dancers->id }}</th>
                                    <td>{{ str_limit($dancers->name, 100) }}</td>
                                    <td>{{ str_limit($dancers->janru, 100) }}</td>
                                    <td>{{ str_limit($dancers->tweet, 300) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\DancersController@edit', ['id' => $dancers->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\DancersController@delete', ['id' => $dancers->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


