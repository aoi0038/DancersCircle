@extends('layouts.admin')
@section('title', 'DancersCircle')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ダンスをする目的を選択してください</h2>
                <form action="{{ action('Admin\DancersController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                        <div id="menu">
                        <ul>
                        <li><a href="#">プロダンサーになる</a></li>
                        <li><a href="#">発表会に出演する</a></li>
                        <li><a href="#">趣味として</a></li>
                        <li><a href="#">エクササイズとして</a></li>
                        </ul> 
                        </div>

                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection