@extends('layouts.admin')
@section('title', 'DancersCircle編集画面')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>DancersCircle編集画面</h2>
                <form action="{{ action('Admin\DancersController@update') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="name" value="{{ $dancers_form->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="janru">ジャンル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="janru" value="{{ $dancers_form->janru }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="tweet">つぶやき</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="tweet" rows="20">{{ $dancers_form->tweet }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $dancers_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $dancers_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection