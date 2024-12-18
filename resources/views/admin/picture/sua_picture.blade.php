@extends('admin.layout.layout_admin')

@section('main')

    <div class="col-lg-12">
        <!-- Card -->
        <div class="card card-lg mb-3 mb-lg-5">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ session('fail') }}
                </div>
            @endif
            <form action="{{route('edit_picture')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Sửa ảnh</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Form Group -->

                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <label class="input-label" for="avatarUploader">Ảnh <span class="text-danger">(*)</span></label>
                            <div class="d-flex align-items-center position-relative">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-uploader mr-5" for="avatarUploader" style="width:100%; height:100%; object-fit:contain;">
                                    <img id="output" class="avatar-img shadow-soft" style="padding: 10px"
                                         src="{{$picture_detail->picture_image}}" alt="Image Description">

                                    <span class="avatar-uploader-trigger">
                                    <i class="tio-edit avatar-uploader-icon shadow-soft">+</i>
                                    </span>
                                </label>
                                <input type="file" class="js-file-attach avatar-uploader-input form-control"
                                       id="avatarUploader"
                                       name="image_upload"
                                       accept="image/*"
                                       onchange="loadFile(this)">
                                <!-- End Avatar -->

                                <button type="button" id="deleteImage" onclick="deleteImg(this)"
                                        class="js-file-attach-reset-img btn btn-white">Delete
                                </button>
                            </div>
                        </div>
                        <!-- End Form Group -->
                        
                    </div>
                     <!-- Form Group -->
                     <div class="form-group">
                        <input type="number" class="form-control" name="id"
                               value="{{$picture_detail->id}}"
                               id="projectNameProjectSettingsLabel" placeholder="ID"
                               aria-label="Enter project name here" hidden="">
                    </div>
                    <!-- End Form Group -->

<!-- Tab Content -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="nav-one-eg1" role="tabpanel"
         aria-labelledby="nav-one-eg1-tab">
       

        <div class="row">
            <div class="col-6">
                <!-- Form Group -->
                <div class="form-group">
                    <label for="projectNameProjectSettingsLabel" class="input-label">Tên hình ảnh <span class="text-danger">(*)</span><i
                        class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                        data-placement="top"
                        title=""
                        data-original-title="Displayed on public forums, such as Front."></i></label>

                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tio-briefcase-outlined"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="ten_anh"
                               value="{{$picture_detail->picture_name}}"
                               id="ten_anh" placeholder="Nhập tên hình ảnh (không có phần mở rộng)"
                               aria-label="Enter project name here" pattern=".{1,140}"
                               title="Nhập tên hình ảnh (không có phần mở rộng)" required>
                    </div>
                </div>
                <!-- End Form Group -->
            </div>
            <div class="col-6">
                <!-- Form Group -->
                <div class="form-group">
                    <label for="projectNameProjectSettingsLabel" class="input-label">Phân loại <span class="text-danger">(*)</span><i
                            class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Displayed on public forums, such as Front."></i></label>

                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tio-briefcase-outlined"></i>
                            </div>
                        </div>
                        <select name="phan_loai" id="phan_loai" class="form-control">
                            <option value="Khóa học sắp ra mắt" 
                                {{($picture_detail->picture_type == "Khóa học sắp ra mắt") ? 'selected' : ''}}>Khóa học sắp ra mắt</option>
                            <option value="Khóa học miễn phí" 
                                {{($picture_detail->picture_type == "Khóa học miễn phí") ? 'selected' : ''}}>Khóa học miễn phí</option>
                            <option value="Ưu đãi giảm giá" 
                                {{($picture_detail->picture_type == "Ưu đãi giảm giá") ? 'selected' : ''}}>Ưu đãi giảm giá</option>
                            <option value="Khóa học được yêu thích" 
                                {{($picture_detail->picture_type == "Khóa học được yêu thích") ? 'selected' : ''}}>Khóa học được yêu thích</option>
                            <option value="Khóa học được đề xuất" 
                                {{($picture_detail->picture_type == "Khóa học được đề xuất") ? 'selected' : ''}}>Khóa học được đề xuất</option>
                            <option value="Khóa học cấp chứng chỉ" 
                                {{($picture_detail->picture_type == "Khóa học cấp chứng chỉ") ? 'selected' : ''}}>Khóa học cấp chứng chỉ</option>
                            <option value="Giới thiệu về website" 
                                {{($picture_detail->picture_type == "Giới thiệu về website") ? 'selected' : ''}}>Giới thiệu về website</option>
                        </select>
                        
                    </div>
                </div>
                <!-- End Form Group -->
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <!-- Form Group -->
                <div class="form-group">
                    <label for="projectNameProjectSettingsLabel" class="input-label">Tác giả <span class="text-danger">(*)</span><i
                            class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                            data-placement="top"
                            title=""
                            data-original-title="Displayed on public forums, such as Front."></i></label>

                    <div class="input-group input-group-merge">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tio-briefcase-outlined"></i>
                            </div>
                        </div>
                        <select name="tac_gia" id="tac_gia"
                                class="form-control">
                            @foreach($users as $user)
                                @if(session()->get('tk_user')[0] == $user->username)
                                    <option value="{{$user->id}}"
                                            selected>{{$user->display_name}}</option>
                                @else
                                    <option value="{{$user->id}}">{{$user->display_name}}</option>
                                @endif

                            @endforeach

                        </select>
                    </div>
                </div>
                <!-- End Form Group -->
            </div>
        </div>

    </div>

</div>
                   
                </div>
                <!-- End Quill -->

                <!-- End Body -->

                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end align-items-center">
                    {{--                        <button type="button" class="btn btn-white mr-2">Cancel</button>--}}
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
            <!-- End Footer -->
        </div>
        <!-- End Card -->


    </div>

@endsection
