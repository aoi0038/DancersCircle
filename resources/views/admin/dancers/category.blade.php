@extends('layouts.admin')
@section('title', 'DancersCircle')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <h1 class="mb-4">Welcom to "DancersCircle!!"</h1>
                <p>ダンスをする目的を選択してください</p>
                <div class="row">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                        <div class="col-md-3">
                         <a href={{ route('admin.dancers') }} class="btn-circle-flat">プロダンサーになる</a>
                        </div>
                        <div class="col-md-3">
                         <a href={{ url("/admin/dancers") }} class="btn-circle-flat">発表会に出演する</a>
                        </div>
                        <div class="col-md-3">
                         <a href={{ route('admin.dancers') }} class="btn-circle-flat">趣味として</a>
                        </div>
                        <div class="col-md-3">
                         <a href={{ route('admin.dancers') }} class="btn-circle-flat">エクササイズとして</a>
                        </div>
                    {{ csrf_field() }}
                </div>
            </div>
        </div>
    </div>
@endsection