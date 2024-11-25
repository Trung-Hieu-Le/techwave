@extends('client.layout.xdsoft.app')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection
@section('content')
    <div class="content container mb-4 nav-top">

        {{--    <a href="{{Request::root().'/'}}" class="ms-4 mt-3 title">--}}
        {{--        <img src="https://thoitrangwiki.com/wp-content/uploads/2016/03/nha-dep-4-1.png">--}}
        {{--    </a>--}}

        <div class="row mt-4">
            @yield('content-left')
            @yield('content-right')
        </div>
    </div>

@endsection
