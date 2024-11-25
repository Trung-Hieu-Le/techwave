@extends('admin.layout.layout_admin')

@section('main')

    <div class="col-lg-12">
        <!-- Card -->
        <div class="card card-lg mb-3 mb-lg-5">
            <form action="{{route('luuBV')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Thêm bài viết</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Form Group -->

                    <div class="d-flex justify-content-between">
                        <div class="form-group">
                            <label class="input-label" for="avatarUploader">Ảnh Bài Viết</label>
                            <div class="d-flex align-items-center position-relative">
                                <!-- Avatar -->
                                <label class="avatar avatar-xl avatar-circle avatar-uploader mr-5" for="avatarUploader">
                                    <img id="output" class="avatar-img shadow-soft" style="padding: 10px"
                                         src="{{asset('image/no_img.jfif')}}" alt="Image Description">

                                    <span class="avatar-uploader-trigger">
                                    <i class="tio-edit avatar-uploader-icon shadow-soft"></i>
                                    </span>
                                </label>
                                <input type="file" class="js-file-attach avatar-uploader-input form-control"
                                       id="avatarUploader"
                                       name="image_upload" required
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


                    <!-- Tab Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-one-eg1" role="tabpanel"
                             aria-labelledby="nav-one-eg1-tab">
                            <div class="row">
                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="tieu_de" class="input-label">Tiêu đề bài
                                            viết
                                            <b>(<=60)</b>
                                            <span>Có:</span>
                                            <b><span id="count"></span></b>
                                        </label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-briefcase-outlined"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="tieu_de"
                                                   id="tieu_de" placeholder="Tiêu đề"
                                                   aria-label="Enter project name here"
                                                   onchange="onChangeInput(this,'tieu_de')"
                                                   pattern=".{1,60}"
                                                   title="Tiêu đề có độ dài không quá 60 ký tự" required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Slug <i
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
                                            <input type="text" class="form-control" name="post_name"
                                                   id="slug" placeholder="VD: file-cad"
                                                   aria-label="Enter project name here"
                                                   title="Không được để trống" required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Tác giả<i
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
                                                        <option value="{{$user->ID}}"
                                                                selected>{{$user->display_name}}</option>
                                                    @else
                                                        <option value="{{$user->ID}}">{{$user->display_name}}</option>
                                                    @endif

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>

                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Mô tả
                                            <b>(<140)</b>
                                            <span>Có:</span>
                                            <b><span id="count1"></span></b>
                                        </label>

                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-briefcase-outlined"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="mo_ta"
                                                   id="mo_ta" placeholder="Tóm tắt nội dung"
                                                   aria-label="Enter project name here" pattern=".{1,140}"
                                                   title="Mô tả có độ dài không quá 140 ký tự" required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-6">
                                    <!-- Form Group -->
                                    <div class="form-group">
                                        <label for="projectNameProjectSettingsLabel" class="input-label">Phân loại tag<i
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
                                            <select name="huong_dan" id="projectNameProjectSettingsLabel" required
                                                    class="form-control">
                                                <option value="">-- Chọn một lựa chọn --</option>
                                                @foreach($post_categories as $category)
                                                    <option
                                                        value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->
                                </div>
                                
                            </div>
                        </div>
                    </div>


                    <!-- Quill -->
                    <label class="input-label">Nội dung bài viết </label>

                    <div class="quill-custom ql-toolbar-bottom">
                        <input name="noi_dung" id="mytextarea" placeholder="Nhập nội dung bài viết">

                    </div>
                </div>
                <!-- End Quill -->

                <!-- End Body -->

                <!-- Footer -->
                <div class="card-footer d-flex justify-content-end align-items-center">
                    {{--                        <button type="button" class="btn btn-white mr-2">Cancel</button>--}}
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
            <!-- End Footer -->
        </div>
        <!-- End Card -->


    </div>




@endsection
