<style>
    a:hover{
        color: black!important;
    }
    .footer-link:hover {
        color: aquamarine!important;
    }
</style>
<header class="container-fluid sticky-top fw-2 rounded p-0 g-0 bg-white" style="box-shadow: 0 10px 10px 0 rgba(200,200,200,0.3);">
    <div class="px-3">
        <div class="row justify-content-center align-items-start g-2">
        <div class="col-4 col-sm-4 col-lg-2 text-center text-sm-start my-1">
            <a class="m-0 ms-xxl-4 p-0 ps-xl-2 ps-lg-0 opacity-100 pb-1" href="{{ route('xdsoft.mainpage')}}">
                <img src="{{ asset('image/techwave-logo.png')}}" class="img-fluid logo" alt="..." style="height:50px; width:50px;">
            </a>
        </div>
        <div class="col-8 col-sm-8 col-lg-10">
            <nav class="navbar navbar-expand-lg justify-content-center">
                <div class="container-fluid justify-content-end">
                <button class="navbar-toggler h-100 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-dark" aria-hidden="true" style="font-size: 30px;"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end text-end" id="navbarSupportedContent">
                    <ul class="navbar-nav fill h-100" style="font-size: 15px;">
                        <li class="nav-item ms-1 me-5">
                            <a class="nav-link fw-semibold " href="{{ route('xdsoft.khoahoc')}}" style="color:#040404 ;z-index: 2;">KHÓA HỌC</a>
                        </li>
                        <li class="nav-item ms-1 me-5">
                            <a class="nav-link fw-semibold " href="{{ route('xdsoft.tracnghiem')}}" style="color:#040404 ;z-index: 2;">KIỂM TRA</a>
                        </li>
                        <li class="nav-item ms-1 me-5">
                            <a class="nav-link fw-semibold " href="{{ route('xdsoft.baiviet')}}" style="color:#040404 ;z-index: 2;">BÀI VIẾT</a>
                        </li>

                        @if (session('account_name'))
                        <li class="nav-item dropdown ms-1 me-5">
                                <a style="color:#040404 ;z-index: 2;" href="#" class="nav-link fw-semibold" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                TÀI KHOẢN
                            </a>
                            <ul class="dropdown-menu p-0 text-end text-lg-start border-0">
                                <li class="dropdown-navbar">
                                    <a class="dropdown-item fs-5" href="{{ route('xdsoft.account.profile')}}">
                                        Hồ sơ
                                    </a>
                                </li>
                                <li class="dropdown-navbar">
                                    <a class="dropdown-item fs-5" href="{{ route('xdsoft.account.logout')}}">
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item dropdown ms-1 me-5"> 
                            <a style="color:#040404 ;z-index: 2;" href="#" class="nav-link fw-semibold" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                TÀI KHOẢN
                            </a>
                            <ul class="dropdown-menu p-0 text-end text-lg-start border-0">
                                <li class="dropdown-navbar">
                                    <a class="dropdown-item fs-5" href="{{ route('xdsoft.account.login')}}">
                                        Đăng nhập
                                    </a>
                                </li>
                                <li class="dropdown-navbar">
                                    <a class="dropdown-item fs-5" href="{{ route('xdsoft.account.register')}}">
                                        Đăng kí
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="nav-item ms-1 me-4">
                            <a class="nav-link" style="color: #040404" href="{{ route('xdsoft.cart') }}">
                                <i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 22px;"></i>
                                @if(isset($cartCount) && $cartCount > 0)
                                    <span style="width:18px;height:18px; font-size:12px; background-color: red; 
                                    border-radius: 100%; display: inline-block; text-align:center; color:white">
                                        {{ $cartCount }}
                                    </span>
                                @endif     
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
        </div>
        </div>
    </div>
</header>

