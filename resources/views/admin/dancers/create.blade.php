@extends('layouts.admin')
@section('title', 'DancersCircle')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>DancersCircle新規作成画面</h2>
                <form action="{{ action('Admin\DancersController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">ダンサーネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="janru">ジャンル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="janru" value="{{ old('janru') }}">
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-md-2" for="tweet">つぶやき</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="tweet" rows="20">{{ old('tweet') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection