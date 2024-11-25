<style>
    #myModal0 .modal-header button {
        background-color: white;
        border: none;
        margin-top: -10px;
        margin-bottom: -10px;
    }

    #myModal0 .modal-header button span {
        font-size: 25px;
    }

    #myModal0 .modal-body .modal-title-blue,
    #myModal0 .modal-body .modal-title-blue:hover {
        color: #00659f !important;
    }

    #myModal0 .modal-body {
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
        line-height: 24px;
    }

    @media (max-width: 580px) {
        #myModal0 .modal-body div.modal-advice-img {
            display: none;
        }
    }

    #myModal0 .modal-body textarea {
        height: 50px;
    }

    #myModal0 .modal-body select option {
        color: black;
    }

    #myModal0 .modal-body .form-control {
        background-color: white !important;
        color: gray !important;
    }

    #myModal0 .modal-body .form-group label {
        font-weight: bolder;
    }

    #myModal0 .modal-body .im {
        color: red;
    }
</style>

<script>
    $(document).ready(function() {
        $('.showModalButton').click(function(event) {
            event.preventDefault();
            $('#myModal0').modal('show');
        });
        $('.modal-close').click(function () {
            $('#myModal0').modal('hide');
        });
    });
</script>

<div class="modal fade" id="myModal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:640px; border-radius:10px;">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bolder" id="exampleModalLabel">Tech Wave</h5>
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <form action="{{route('xdsoft.create.baogia')}}" id="form2" style=" border-radius: 6px; margin: 0px;"
                    method="post" accept-charset="utf-8">
                    @csrf
                    <div class="row w-100 m-auto modal-advice-img">
                        <div style="height: 230px; padding:0;">
                            <img style=" width:100%;height:100%;object-fit:cover;" src="/image/TrangChu/hotline-banner.jfif" alt="">
                        </div>
                    </div>
                    {{-- <div style="display:none;"><input type="hidden" name="_method" value="POST"></div><input
                        type="hidden" name="data[Project][unit_payment]" value="VNĐ" id="ProjectUnitPayment"><input
                        type="hidden" name="data[Project][exit_popup]" value="1" id="ProjectExitPopup"> --}}
                    <div class="p-4">
                    <div class="row">
                        <div class="col-xs-12 m-b-15 mt-3 mb-3">
                            <h3 style="font-weight: bold; text-align: center; color: red;" class=" m-b-15">TƯ VẤN MIỄN
                                PHÍ</h3>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="ProjectDescription" class="col-xs-12 col-sm-5 col-md-3 col-lg-4">Thông tin cần tư vấn<span class="im">*</span></label>
                        <div class="col-xs-12 col-sm-7 col-md-9 col-lg-8 fix-height required" aria-required="true">
                            <textarea name="data_description" placeholder="Mô tả chi tiết những gì bạn cần tư vấn."
                                required class="form-control" cols="30" rows="6" id="ProjectDescription"
                                aria-required="true"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="ProjectProvinceId" class="col-xs-12 col-sm-5 col-md-3 col-lg-4">Địa điểm tư vấn</label>
                        <div class="col-xs-12 col-sm-7 col-md-5 col-lg-5 required" aria-required="true">
                            <select name="data_province" class="form-control"
                                div="col-xs-12 col-sm-7 col-md-9 col-lg-8 required" id="ProjectProvinceId">
                                <option value="">Hỗ trợ 24/7, ngay tại nhà</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                <option value="An Giang">An Giang</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Đắk Nông">Đắk Nông</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="Hậu Giang">Hậu Giang</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Khánh Hòa">Khánh Hòa</option>
                                <option value="Kiên Giang">Kiên Giang</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Làm online">Làm online</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Long An">Long An</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Ninh Bình">Ninh Bình</option>
                                <option value="Ninh Thuận">Ninh Thuận</option>
                                <option value="Nước ngoài">Nước ngoài</option>
                                <option value="Phú Quốc">Phú Quốc</option>
                                <option value="Phú Thọ">Phú Thọ</option>
                                <option value="Phú Yên">Phú Yên</option>
                                <option value="Quảng Bình">Quảng Bình</option>
                                <option value="Quảng Nam">Quảng Nam</option>
                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                <option value="Quảng Ninh">Quảng Ninh</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Sóc Trăng">Sóc Trăng</option>
                                <option value="Sơn La">Sơn La</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Thái Bình">Thái Bình</option>
                                <option value="Thái Nguyên">Thái Nguyên</option>
                                <option value="Thanh Hóa">Thanh Hóa</option>
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                <option value="Tiền Giang">Tiền Giang</option>
                                <option value="tỉnh Tottori">tỉnh Tottori</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Yên Bái">Yên Bái</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="ProjectName" class="col-xs-12 col-sm-5 col-md-3 col-lg-4">Họ và tên<span
                                class="im">*</span></label>
                        <div class="col-xs-12 col-sm-7 col-md-5 col-lg-5 required" aria-required="true">
                            <input name="data_name" placeholder="Họ và tên của bạn" class="form-control" id="name"
                                type="text" required />
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="Member_newbiePhone" class="col-xs-12 col-sm-5 col-md-3 col-lg-4">Số điện thoại<span
                                class="im">*</span></label>
                        <div class="col-xs-12 col-sm-7 col-md-5 col-lg-5 required" aria-required="true"><input
                                name="data_phone" maxlength="12" required placeholder="Số điện thoại đi động của bạn"
                                class="form-control" id="phone2"
                                oninput="if (!window.__cfRLUnblockHandlers) return false; this.value=this.value.replace(/[^0-9]/g,&quot;&quot;)"
                                type="text" pattern="[0-9]+" title="Chỉ nhập chữ số" /></div>
                    </div>


                    <div class="form-group m-t-15 mb-3">
                        <div class="text-center submit">
                            <button type="submit" class="btn btn-primary btn_registion btn-primary"
                                id="post_baogia2"><span style="font-size: 16px;">Gửi Thông Tin</span></button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>