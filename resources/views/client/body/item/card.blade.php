{{-- <style>
    .card-infor-hover:hover{
    /* transform: scale(1.05); */
    transition: 0.5s;
    box-shadow: 10px 10px 10px 2px rgba(0,0,0,.12) , -10px -5px 10px 2px rgba(0,0,0,.12);
    border-color: white;
    cursor: pointer;
}
</style> --}}

{{-- <div class="card-infor card-infor-hover" style="margin-top:15px;width: 27%;padding:0;margin-bottom: 30px;height:436px;border-radius:8px;">
    <a href="{{ route('xdsoft.chitiet',['id' => $id ,'type' => $type])}}" style="color: black;text-decoration:none">
        <div class="card-header" style="width:100%;height: 64%">
            <img style="padding: 0" src="{{ $image ?? '' }}" width="100%" height="270px"class="card-img-top" alt="...">
        </div>
        <div class="card-body" style="margin-left: 3%;margin-right: 3%">
            <h5 class="card-title text-title" style="text-align: center">{!! $name ?? '' !!}</h5>
            <p class="card-text card-des text-des lmt-7r overflow-hidden" @if (isset($discription) && $discription != "") style="height: 80px" @else style="height: 33px" @endif >
                {{ $discription ?? '' }}
            </p>
        </div>
        <div class="card-footer" style="margin-top:0px;text-align:center">
            <a style="color:#4265a6;font-family:'Segoe UI';text-decoration:none;align:center" href="#"><h5>{{ $student_fees ?? ''}}</h5> </a>
        </div>
    </a>
</div> --}}

<div class="col-12 col-xl-4 col-md-6 mb-5 p-3 pt-0">
    <a href="{{ route('xdsoft.chitiet',['id' => $id ,'type' => $type])}}" class="text-decoration-none">
      <div class="card card-hover w-100 p-0 container border-0 text-start">
        <img src="{{ $image ?? '' }}"
          class="rounded mx-auto d-block card-img-top img-fluid w-100" alt="...">
        <div class="card-body mb-3">
          <h5 class="card-title overflow-hidden text-black">{!! $name ?? '' !!}</h5>
          <p class="card-text fw-semibold fs-5">{{ $student_fees ?? ''}}</p>
        </div>
      </div>
    </a>
  </div>