@extends('client.layout.xdsoft.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/card.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<style>
    /* Container for the form */
    .profile-form-container {
        width: 400px;
        margin: 0 auto;
        border: 2px solid black;
        padding: 20px;
        border-radius: 10px;
    }

    /* Avatar image */
    .avatar-uploader img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid black;
    }

    /* Avatar container and input styling */
    .avatar-uploader-input {
        display: block;
        margin-top: 10px;
        width: 200px;
        margin-left: auto;
        margin-right: auto;
    }

    /* General form styling */
    .form-control {
        background-color: white !important;
        color: black !important;
        border: 1px solid black;
        margin-bottom: 15px;
    }
    .form-control:hover {
        background-color: white !important;
        color: black !important;
    }

    /* Centered elements */
    .text-center {
        text-align: center;
    }

    /* Button styling */
    .btn {
        margin-top: 10px;
    }

    /* Title styling */
    .text-title {
        font-size: 24px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div style="height: 24px"></div>
<main class="h-100 mt-5">
    <section class="container-fluid h-100 mt-5 p-5">
        <div class="row">
            <!-- User Info Display -->
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="profile-form-container">
                    <h4 class="text-title"><b>THÔNG TIN CÁ NHÂN</b></h4>
                    
                    <!-- Avatar -->
                    <div class="form-group">
                        <label class="input-label">Ảnh đại diện</label>
                        <div class="text-center">
                            <img class="avatar-img shadow-soft"
                                src="{{ $user->avatar ? asset($user->avatar) : asset('image/no_img.jfif')}}"
                                alt="Avatar" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 1px solid black;">
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <label class="input-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" value="{{ $user->username }}" disabled>
                    </div>

                    <!-- Display Name -->
                    <div class="form-group">
                        <label class="input-label">Tên hiển thị</label>
                        <input type="text" class="form-control" value="{{ $user->display_name }}" disabled>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="input-label">Email</label>
                        <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label class="input-label">Số điện thoại</label>
                        <input type="text" class="form-control" value="{{ $user->phone }}" disabled>
                    </div>

                    <!-- Edit Profile Button -->
                    <div class="text-center mt-4">
                        <a href="{{ route('xdsoft.account.editProfile') }}" class="btn btn-primary">Sửa thông tin</a>
                        <a href="{{ route('xdsoft.account.changePassword') }}" class="btn btn-danger">Đổi mật khẩu</a>

                    </div>
                </div>
            </div>
            <!-- End User Info Display -->

            <!-- Purchased Courses List -->
            <div class="col-lg-8 col-md-12 mb-4">
                <div class="course-list-container">
                    <h4 class="text-title"><b>KHÓA HỌC ĐÃ MUA</b></h4>
                    <div class="course-list">
                        @forelse ($purchasedCourses as $course)
                            <div class="course-item border p-3 mb-3 rounded row">
                                <div class="col-3 px-0">
                                    <img src="{{$course->img}}" alt="{{$course->name}}"
                                    class="img-responsive img_1 lazy" style="height: 150px; width:180px; object-fit:cover;">
                                </div>
                                <div class="col-9 px-0">
                                    <p class="fs-3"><strong>{{ $course->name }}</strong></p>
                                    <p class="fs-5 text-dark">{{$course->description}}</p>
                                    <p class="fs-5 text-secondary">Ngày mua: {{ $course->purchase_date }}</p>
                                </div>
                            </div>
                        @empty
                            <p>Bạn chưa mua khóa học nào.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
