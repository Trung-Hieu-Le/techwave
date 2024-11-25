@extends('client.body.xdsoft.tintuc.layout_tin_tuc')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <style>
        .text-decrip-4 {
            line-height: 1.6rem;
            overflow: hidden;
            margin-top: 10px;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

        .text-decrip-4 {
            display: -webkit-box;
        }

        .text-decoration-underline {
            margin-bottom: 30px;
        }

        .slide-item img {
            height: 404px;
            object-fit: cover;
        }

        @media screen and (max-width: 1400px) {
            .slide-item img {
                height: 350px;
                object-fit: cover;
            }
        }

        @media screen and (max-width: 1200px) {
            .slide-item img {
                height: 295px;
                object-fit: cover;
            }
        }

        @media screen and (max-width: 992px) {
            .slide-item img {
                height: 333px;
                object-fit: cover;
            }
        }

        @media screen and (max-width: 768px) {
            .slide-item img {
                height: 502px;
                object-fit: cover;
            }
        }

        @media screen and (max-width: 391px) {
            .slide-item img {
                height: 360px;
                object-fit: cover;
            }
        }

    </style>
@endsection
@section('content-left')
    <div class="content-left col-xxl-9 col-xl-9 col-lg-2 col-lg-9 col-md-9 col-sm-12 col-xs-12  ">
        <header class="entry-header">
            <h1 class="entry-title">{{$post->post_title}}</h1>
            <div class="post-meta my-2">
                <span class="meta-date date updated"><i class="fa fa-calendar"></i>{{$post->created_at}}</span>
            </div>
        </header>
        <div class="entry-content">
            {!! html_entity_decode($post->post_content) !!}
        </div>

    </div>

@endsection
@section('content-right')
    <div class="content-right  col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
        <div class="hsidebar">
            <div class="title-theme fs-3 mb-3 pb-3"
                 style="border-bottom: 1px solid rgba(138, 137, 137, 0.212);">
                <strong>Thiết kế nổi bật</strong>
            </div>

            <div class="inner">
                @for($i=0;$i<count($list_chu_de_noi_bat); $i++)
                    @if($i==4)
                        @php
                          break;
                        @endphp
                    @endif
                    @if(!empty($list_chu_de_noi_bat))
                        <div class="pull-left">
                            <div style="width: 100%;">
                                <a href="{{route('du_an',['term'=>$list_chu_de_noi_bat[$i]->slug,'slug'=>$list_chu_de_noi_bat[$i]->post_name])}}"
                                   title="{{$list_chu_de_noi_bat[$i]->post_title}}" target="_self"
                                   class=""><img src="{{$list_chu_de_noi_bat[$i]->post_image}}"
                                                 alt="{{$list_chu_de_noi_bat[$i]->post_title}}" width="332"
                                                 height="265" class=" m-r-15"/></a>
                            </div>
                            <a href="{{route('du_an',['term'=>$list_chu_de_noi_bat[$i]->slug,'slug'=>$list_chu_de_noi_bat[$i]->post_name])}}"
                               title="{{$list_chu_de_noi_bat[$i]->post_title}}" target="_self"
                               class="name font-bold"
                               style="font-size: 16px ">{{$list_chu_de_noi_bat[$i]->post_title}}</a>
                            <span class="text-decrip-2 fs-5">
                        {{$list_chu_de_noi_bat[$i]->description}}</span>
                            <hr>
                        </div>
                    @endif
                @endfor
            </div>
        </div>
    </div>
@endsection
