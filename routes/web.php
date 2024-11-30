<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(App\Http\Controllers\Client\MainController::class)->group(function () {
    Route::get('/', 'homepage')->name('xdsoft.mainpage');
    Route::get('/tintuc', 'tintuc')->name('xdsoft.tintuc');
    Route::get('/khoahoc', 'khoahoc')->name('xdsoft.khoahoc');
    Route::get('/baiviet', 'dohoa')->name('xdsoft.baiviet');
    Route::get('/chitiet/{type?}/{id?}', 'chitiet')->name('xdsoft.chitiet');
    Route::get('/chitiet/tintuc/posts/{news}', 'detail_topic')->name('xdsoft.detail.topic');
    Route::get('/chitiet/tintuc/sub/{news}', 'detail_topic_v2')->name('xdsoft.detail.topic.small');
    Route::get('/chitiet/tintuc/chude/{news}', 'detail_chude')->name('xdsoft.detail.chude');
    Route::get('/giohang', 'cart')->name('xdsoft.cart');
    Route::post('/insert/baogia', 'insert_bao_gia')->name('xdsoft.create.baogia');
    Route::get('/tracnghiem', 'tracnghiem')->name('xdsoft.tracnghiem');

});

Route::controller(App\Http\Controllers\Client\account\AccountController::class)->group(function () {
    Route::get('/login', 'indexLogin')->name('xdsoft.account.login');
    Route::get('/register', 'indexRegister')->name('xdsoft.account.register');
    Route::get('/forget-password', 'indexForgetPassword')->name('xdsoft.account.forgetPassword');  
    Route::get('/edit-password', 'indexEditPassword')->name('xdsoft.account.editPassword');        
    Route::post('/action-login', 'actionLogin')->name('xdsoft.account.actionLogin'); 
    Route::post('/action-register', 'actionRegister')->name('xdsoft.account.actionRegister');  
    Route::post('/action-forget-password', 'actionForgetPassword')->name('xdsoft.account.actionForgetPassword');        
    Route::post('/action-edit-password', 'actionEditPassword')->name('xdsoft.account.actionEditPassword');        
    Route::get('/profile', 'indexProfile')->name('xdsoft.account.profile');
    Route::get('/edit-profile', 'editProfile')->name('xdsoft.account.editProfile');
    Route::post('/update-profile', 'updateProfile')->name('xdsoft.account.updateProfile'); 
    Route::get('/change-password', 'changePassword')->name('xdsoft.account.changePassword'); 
    Route::post('/action-change-password', 'actionChangePassword')->name('xdsoft.account.actionChangePassword');     
    Route::get('/logout', 'indexLogout')->name('xdsoft.account.logout'); 
    Route::post('/courses/favorite', 'toggleFavoriteCourse')->name('xdsoft.account.favoriteCourse');
});

Route::prefix('/admin')->group(function () {
    Route::get('/trang-chu', 'Admin\KhoaHocController@indexKhoaHoc')->name('trang_chu');
    Route::get('/', 'Admin\KhoaHocController@indexKhoaHoc')->name('trang_chu');
    Route::get('/logout', 'Admin\UserController@indexLogout')->name('admin.logout'); 


    Route::get('/them-bai-viet', 'Admin\BaiVietController@themBaiViet')->name('themBV');
    Route::post('/them-bai-viet', 'Admin\BaiVietController@luuBaiViet')->name('luuBV');
    Route::get('/index-bai-viet', 'Admin\BaiVietController@danhSachBaiViet')->name('indexBV');
    Route::get('/sua-bai-viet/{id}', 'Admin\BaiVietController@suaBaiViet')->name('suaBV');
    Route::post('/sua-bai-viet', 'Admin\BaiVietController@updateBaiViet')->name('updateBV');
    Route::get('xoa-bai-viet/{id}', 'Admin\BaiVietController@xoaBaiViet')->name('xoaBV');
    Route::get('/tim-kiem', 'Admin\BaiVietController@timBaiViet')->name('timkiemBV');

    Route::get('/them-term-huong-dan', 'Admin\TermHuongDanController@themTermHuongDan')->name('them_term_HD');
    Route::post('/insert-term-huong-dan', 'Admin\TermHuongDanController@insertTermHuongDan')->name('insert_term_HD');
    Route::get('/index-terms-huong-dan', 'Admin\TermHuongDanController@indexTermsHuongDan')->name('index_terms_HD');
    Route::get('/edit-term-huong-dan/{id}', 'Admin\TermHuongDanController@pageEditTermHuongDan')->name('page_edit_term_HD');
    Route::post('/edit-term-huong-dan', 'Admin\TermHuongDanController@editTermHuongDan')->name('edit_term_HD');
    Route::get('/delete-term-huong-dan/{id}', 'Admin\TermHuongDanController@deleteTermHuongDan')->name('delete_term_HD');
    Route::get('/find-term-bai-viet', 'Admin\TermHuongDanController@findTermHuongDan')->name('find_term_HD');

    Route::get('/them-term-khoa-hoc', 'Admin\TermKhoaHocController@themTermKhoaHoc')->name('them_term_KH');
    Route::post('/insert-term-khoa-hoc', 'Admin\TermKhoaHocController@insertTermKhoaHoc')->name('insert_term_KH');
    Route::get('/index-terms-khoa-hoc', 'Admin\TermKhoaHocController@indexTermsKhoaHoc')->name('index_terms_KH');
    Route::get('/edit-term-khoa-hoc/{id}', 'Admin\TermKhoaHocController@pageEditTermKhoaHoc')->name('page_edit_term_KH');
    Route::post('/edit-term-khoa-hoc', 'Admin\TermKhoaHocController@editTermKhoaHoc')->name('edit_term_KH');
    Route::get('/delete-term-khoa-hoc/{id}', 'Admin\TermKhoaHocController@deleteTermKhoaHoc')->name('delete_term_KH');
    Route::get('/find-term-khoa-hoc', 'Admin\TermKhoaHocController@findTermKhoaHoc')->name('find_term_KH');

    Route::get('/login', 'Admin\UserController@view_login')->name('view_login');
    Route::post('/action-login', 'Admin\UserController@action_login')->name('action_login');
    Route::get('/them-user', 'Admin\UserController@page_user')->name('page_user');
    Route::post('/insert-user', 'Admin\UserController@insert_user')->name('insert_user');
    Route::get('/index-user', 'Admin\UserController@index_user')->name('index_user');
    Route::get('/edit-user/{id}', 'Admin\UserController@page_edit_user')->name('page_edit_user');
    Route::post('/edit-user', 'Admin\UserController@edit_user')->name('edit_user');
    Route::get('/delete-user/{id}', 'Admin\UserController@delete_user')->name('delete_user');
    Route::get('/find-user', 'Admin\UserController@find_user')->name('find_user');

    Route::get('/them-khoa-hoc', 'Admin\KhoaHocController@themKhoaHoc')->name('them_khoa_hoc');
    Route::post('/insert-khoa-hoc', 'Admin\KhoaHocController@insertKhoaHoc')->name('insert_khoa_hoc');
    Route::get('/index-khoa-hoc', 'Admin\KhoaHocController@indexKhoaHoc')->name('index_khoa_hoc');
    Route::get('/edit-khoa-hoc/{id}', 'Admin\KhoaHocController@pageEditKhoaHoc')->name('page_edit_khoa_hoc');
    Route::post('/edit-khoa-hoc', 'Admin\KhoaHocController@editKhoaHoc')->name('edit_khoa_hoc');
    Route::get('/delete-khoa-hoc/{id}', 'Admin\KhoaHocController@deleteKhoaHoc')->name('delete_khoa_hoc');
    Route::get('/find-khoa-hoc', 'Admin\KhoaHocController@findKhoaHoc')->name('find_khoa_hoc');

    Route::get('/them-lesson', 'Admin\LessonController@themLesson')->name('them_lesson');
    Route::post('/insert-lesson', 'Admin\LessonController@insertLesson')->name('insert_lesson');
    Route::get('/index-lesson', 'Admin\LessonController@indexLesson')->name('index_lesson');
    Route::get('/edit-lesson/{id}', 'Admin\LessonController@pageEditLesson')->name('page_edit_lesson');
    Route::post('/edit-lesson', 'Admin\LessonController@editLesson')->name('edit_lesson');
    Route::get('/delete-lesson/{id}', 'Admin\LessonController@deleteLesson')->name('delete_lesson');
    Route::get('/find-lesson', 'Admin\LessonController@findLesson')->name('find_lesson');

    Route::get('/them-gio-hang', 'Admin\GioHangController@themGioHang')->name('them_gio_hang');
    Route::post('/insert-gio-hang', 'Admin\GioHangController@insertGioHang')->name('insert_gio_hang');
    Route::get('/index-gio-hang', 'Admin\GioHangController@indexGioHang')->name('index_gio_hang');
    Route::get('/edit-gio-hang/{id}', 'Admin\GioHangController@pageEditGioHang')->name('page_edit_gio_hang');
    Route::post('/edit-gio-hang', 'Admin\GioHangController@editGioHang')->name('edit_gio_hang');
    Route::get('/delete-gio-hang/{id}', 'Admin\GioHangController@deleteGioHang')->name('delete_gio_hang');
    Route::get('/find-gio-hang', 'Admin\GioHangController@findGioHang')->name('find_gio_hang');

    Route::get('/them-picture', 'Admin\PictureController@themPicture')->name('them_picture');
    Route::post('/insert-picture', 'Admin\PictureController@insertPicture')->name('insert_picture');
    Route::get('/index-picture', 'Admin\PictureController@indexPicture')->name('index_picture');
    Route::get('/edit-picture/{id}', 'Admin\PictureController@pageEditPicture')->name('page_edit_picture');
    Route::post('/edit-picture', 'Admin\PictureController@editPicture')->name('edit_picture');
    Route::get('/delete-picture/{id}', 'Admin\PictureController@deletePicture')->name('delete_picture');
    Route::get('/find-picture', 'Admin\PictureController@findPicture')->name('find_picture');

    Route::get('/them-bao-gia', 'Admin\BaoGiaController@themBaoGia')->name('them_bao_gia');
    Route::post('/insert-bao-gia', 'Admin\BaoGiaController@insertBaoGia')->name('insert_bao_gia');
    Route::get('/index-bao-gia', 'Admin\BaoGiaController@indexBaoGia')->name('index_bao_gia');
    Route::get('/edit-bao-gia/{id}', 'Admin\BaoGiaController@pageEditBaoGia')->name('page_edit_bao_gia');
    Route::post('/edit-bao-gia', 'Admin\BaoGiaController@editBaoGia')->name('edit_bao_gia');
    Route::get('/delete-bao-gia/{id}', 'Admin\BaoGiaController@deleteBaoGia')->name('delete_bao_gia');
    Route::get('/find-bao-gia', 'Admin\BaoGiaController@findBaoGia')->name('find_bao_gia');

    Route::patch('/toggle-comment-course-show/{id}', 'Admin\KhoaHocController@toggleCommentShow')->name('show_comment_KH');
    Route::delete('/delete-comment-course/{id}', 'Admin\KhoaHocController@deleteComment')->name('delete_comment_KH');
    Route::patch('/toggle-comment-post-show/{id}', 'Admin\BaiVietController@toggleCommentShow')->name('show_comment_BV');
    Route::delete('/delete-comment-post/{id}', 'Admin\BaiVietController@deleteComment')->name('delete_comment_BV');

    Route::get('/them-bai-trac-nghiem', 'Admin\QuizController@themTracNghiem')->name('them_trac_nghiem');
    Route::post('/insert-bai-trac-nghiem', 'Admin\QuizController@insertTracNghiem')->name('insert_trac_nghiem');
    Route::get('/index-bai-trac-nghiem', 'Admin\QuizController@indexTracNghiem')->name('index_trac_nghiem');
    Route::get('/edit-bai-trac-nghiem/{id}', 'Admin\QuizController@pageEditTracNghiem')->name('page_edit_trac_nghiem');
    Route::post('/edit-bai-trac-nghiem', 'Admin\QuizController@editTracNghiem')->name('edit_trac_nghiem');
    Route::get('/delete-bai-trac-nghiem/{id}', 'Admin\QuizController@deleteTracNghiem')->name('delete_trac_nghiem');
    Route::get('/find-bai-trac-nghiem', 'Admin\QuizController@findTracNghiem')->name('find_trac_nghiem');

    Route::get('/them-history-trac-nghiem', 'Admin\QuizAttemptController@themHistoryTracNghiem')->name('them_history_trac_nghiem');
    Route::post('/insert-history-trac-nghiem', 'Admin\QuizAttemptController@insertHistoryTracNghiem')->name('insert_history_trac_nghiem');
    Route::get('/index-history-trac-nghiem', 'Admin\QuizAttemptController@indexHistoryTracNghiem')->name('index_history_trac_nghiem');
    Route::get('/edit-history-trac-nghiem/{id}', 'Admin\QuizAttemptController@pageEditHistoryTracNghiem')->name('page_edit_history_trac_nghiem');
    Route::post('/edit-history-trac-nghiem', 'Admin\QuizAttemptController@editHistoryTracNghiem')->name('edit_history_trac_nghiem');
    Route::get('/delete-history-trac-nghiem/{id}', 'Admin\QuizAttemptController@deleteHistoryTracNghiem')->name('delete_history_trac_nghiem');
    Route::get('/find-history-trac-nghiem', 'Admin\QuizAttemptController@findHistoryTracNghiem')->name('find_history_trac_nghiem');
});

Route::controller(App\Http\Controllers\Client\giohang\GioHangController::class)->group(function () {
    Route::get('/add-to-cart/{id}', 'addToCart')->name('add_to_cart');
    Route::get('/add-to-cart-now/{id}', 'addToCartNow')->name('add_to_cart_now');
    Route::post('/insert-cart', 'insertCart')->name('insert_cart');    
    Route::delete('/delete-cart-item', 'deleteCartItem')->name('delete_cart_item'); 
    Route::get('/delete-all-cart', 'deleteAllCart')->name('delete_all_cart');

    Route::post('/vnpay/payment', 'processVNPay')->name('vnpay.payment');
    Route::get('/vnpay/return', 'vnpayReturn')->name('vnpay.return');

});

Route::controller(App\Http\Controllers\Client\tintuc\PostController::class)->group(function () {
    Route::get('/tintuc/{slug}', 'post_detail')->name('tintuc.post');
    Route::post('/tintuc/addComment', 'addComment')->name('tintuc.addComment');
    Route::post('/tintuc/replyComment', 'replyComment')->name('tintuc.replyComment');
    Route::post('/tintuc/reportComment', 'reportComment')->name('tintuc.reportComment');

});
Route::controller(App\Http\Controllers\Client\khoahoc\PostController::class)->group(function () {
    Route::get('/khoa-hoc/{slug}', 'post_detail')->name('khoahoc.post');
    Route::post('/khoa-hoc/comment', 'addComment')->name('khoahoc.addComment');
    // Route::post('/khoa-hoc/report-comment', 'reportComment')->name('khoahoc.reportComment');
    // Route::post('/khoa-hoc/reply-comment', 'replyComment')->name('khoahoc.replyComment');

});
Route::controller(App\Http\Controllers\Client\tracnghiem\QuizController::class)->group(function () {
    Route::get('/tracnghiem/{id}', 'show')->name('quiz.show');
Route::post('/tracnghiem/{id}/submit', 'submit')->name('quiz.submit');


});

