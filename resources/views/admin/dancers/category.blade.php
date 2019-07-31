@extends('layouts.admin')
@section('title', 'DancersCircle')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>Welcom to "DancersCircle!!"</h1>
                <h2>ダンスをする目的を選択してください</h2>
                <form action="{{ action('Admin\DancersController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                        <a href="#" class="btn-circle-flat">プロダンサーになる</a>
                        <a href="#" class="btn-circle-flat">発表会に出演する</a>
                        <a href="#" class="btn-circle-flat">趣味として</a>
                        <a href="#" class="btn-circle-flat">エクササイズとして</a>

                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection