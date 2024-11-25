@extends('client.body.xdsoft.tintuc.layout_tin_tuc')

@section('content-left')
    <div class="content-left col-xxl-9 col-xl-9 col-lg-2 col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
        @if(!empty($xay_dung))
            <div class="category-item">
                <div class="title-arti text-uppercase fw-bold fs-3 " style="border-bottom: 1px solid red;">
                    <a href="#" class="text-dark">{{$xay_dung[0]->name}}</a>
                </div>
                <section class="block-arti mt-4 row">
                    <div class="arti-left col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-0">
                        <a href="{{route('tintuc.post',['slug'=>$xay_dung[0]->post_name])}}"><img
                                src="{{$xay_dung[0]->post_image}}"
                                alt="{{$xay_dung[0]->post_title}}"
                                style="object-fit: cover;"
                            /></a>

                        <h2 class="mb-2 mt-2">
                            <strong><a class="text-dark fs-4"
                                       href="{{route('tintuc.post',['slug'=>$xay_dung[0]->post_name])}}">{{$xay_dung[0]->post_title}}</a></strong>
                        </h2>
                        <span class="text-decrip-4 fs-8">
              {{$xay_dung[0]->description}}
                </span>
                    </div>

                    <div class="arti-right col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 ps-5">
                        @foreach ($xay_dung as $key=> $item)
                            @if ($key > 0)
                            <ul class="list-topic">
                                <li class="itemtopic pb-3 pt-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"><img
                                                    class="text-dark"
                                                    style="width: 100px;height: 70px; object-fit: cover;"
                                                    src="{{$item->post_image}}"
                                                    alt="{{$item->post_title}}"
                                                /></a>
                                        </div>
                                        <div class="col-9 pb-2">
                                            <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"
                                               class="fs-5 text-dark"
                                            >{{$item->post_title}}</a
                                            >
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>
        @endif
        @if(!empty($cong_nghe))
            <div class="category-item">
                <div class="title-arti text-uppercase fw-bold fs-3 " style="border-bottom: 1px solid red;">
                    <a href="#" class="text-dark">{{$cong_nghe[0]->name}}</a>
                </div>
                <section class="block-arti mt-4 row">
                    <div class="arti-left col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-0">
                        <a href="{{route('tintuc.post',['slug'=>$cong_nghe[0]->post_name])}}"><img
                                src="{{$cong_nghe[0]->post_image}}"
                                alt="{{$cong_nghe[0]->post_title}}"
                                style="object-fit: cover;"
                            /></a>

                        <h2 class="mb-2 mt-2">
                            <strong><a class="text-dark fs-4"
                                       href="{{route('tintuc.post',['slug'=>$cong_nghe[0]->post_name])}}">{{$cong_nghe[0]->post_title}}</a></strong>
                        </h2>
                        <span class="text-decrip-4 fs-8">
              {{$cong_nghe[0]->description}}
                </span>
                    </div>

                    <div class="arti-right col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 ps-5">
                        @foreach ($cong_nghe as $key=> $item)
                            @if ($key > 0)
                            <ul class="list-topic">
                                <li class="itemtopic pb-3 pt-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"><img
                                                    class="text-dark"
                                                    style="width: 100px;height: 70px; object-fit: cover;"
                                                    src="{{$item->post_image}}"
                                                    alt="{{$item->post_title}}"
                                                /></a>
                                        </div>
                                        <div class="col-9 pb-2">
                                            <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"
                                               class="fs-5 text-dark"
                                            >{{$item->post_title}}</a
                                            >
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>
        @endif
        @if(!empty($hoc_thuat))
            <div class="category-item">
                <div class="title-arti text-uppercase fw-bold fs-3 " style="border-bottom: 1px solid red;">
                    <a href="#" class="text-dark">{{$hoc_thuat[0]->name}}</a>
                </div>
                <section class="block-arti mt-4 row">
                    <div class="arti-left col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 p-0">
                        <a href="{{route('tintuc.post',['slug'=>$hoc_thuat[0]->post_name])}}"><img
                                src="{{$hoc_thuat[0]->post_image}}"
                                alt="{{$hoc_thuat[0]->post_title}}"
                                style="object-fit: cover;"
                            /></a>

                        <h2 class="mb-2 mt-2">
                            <strong><a class="text-dark fs-4"
                                       href="{{route('tintuc.post',['slug'=>$hoc_thuat[0]->post_name])}}">{{$hoc_thuat[0]->post_title}}</a></strong>
                        </h2>
                        <span class="text-decrip-4 fs-8">
              {{$hoc_thuat[0]->description}}
                </span>
                    </div>

                    <div class="arti-right col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 ps-5">
                        @foreach ($hoc_thuat as $key=> $item)
                            @if ($key > 0)
                            <ul class="list-topic">
                                <li class="itemtopic pb-3 pt-3">
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"><img
                                                    class="text-dark"
                                                    style="width: 100px;height: 70px; object-fit: cover;"
                                                    src="{{$item->post_image}}"
                                                    alt="{{$item->post_title}}"
                                                /></a>
                                        </div>
                                        <div class="col-9 pb-2">
                                            <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"
                                               class="fs-5 text-dark"
                                            >{{$item->post_title}}</a
                                            >
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>
        @endif

    </div>
@endsection
@section('content-right')
    <div class="content-right  col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
        <div class="hsidebar">
            <div class="title-theme fs-3 mb-3 pb-3"
                 style="border-bottom: 1px solid rgba(138, 137, 137, 0.212);">
                <strong>Chủ đề nổi bật</strong>
            </div>

            <div class="inner">
                @if(!empty($list_chu_de_noi_bat))
                   @foreach($list_chu_de_noi_bat as $item)
                        <div class="pull-left">
                            <div style="width: 100%;">
                                <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"
                                   title="{{$item->post_title}}" target="_self"
                                   class=""><img src="{{$item->post_image}}"
                                            alt="{{$item->post_title}}"
                                            height="265" width="332" class=" m-r-15"/></a>
                            </div>
                            <a href="{{route('tintuc.post',['slug'=>$item->post_name])}}"
                               title="{{$item->post_title}}" target="_self"
                               class="name font-bold"
                               style="font-size: 16px ">{{$item->post_title}}</a>
                            <span class="text-decrip-2 fs-5">
                        {{$item->description}}</span>
                            <hr>
                        </div>
                        @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
