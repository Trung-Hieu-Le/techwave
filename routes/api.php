<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/rd/xml/a/import','XdSoft\tintuc\PostController@import_js' )->name('import_js');
Route::get('/rd/xml/a/create','XdSoft\tintuc\PostController@createTH' )->name('create');

Route::prefix('/v1/public')->group(function () {
    Route::prefix('/advisory-infor')->group(function () {
        Route::get('/find-by-id/{id}', 'App\Http\Controllers\ApiController\AdvisoryInforController@findById');
        Route::get('/find-all', 'App\Http\Controllers\ApiController\AdvisoryInforController@findAll');
        Route::get('/find-by-phone', 'App\Http\Controllers\ApiController\AdvisoryInforController@findByPhone');
        Route::get('/find-by-name', 'App\Http\Controllers\ApiController\AdvisoryInforController@findByName');
        Route::post('/save/{idCompany}/{idCourse}', 'App\Http\Controllers\ApiController\AdvisoryInforController@save');
        Route::post('/deleted/{idCompany}/{idCourse}', 'App\Http\Controllers\ApiController\AdvisoryInforController@delete');
    });
    Route::prefix('/course')->group(function () {
        Route::get('/find-by-id/{id}', 'App\Http\Controllers\ApiController\CourseController@findById');
        Route::get('/find-all', 'App\Http\Controllers\ApiController\CourseController@findAll');
        Route::get('/find-limit/{limit}', 'App\Http\Controllers\ApiController\CourseController@findLimit');
        Route::get('/find-by-name-object/{name}', 'App\Http\Controllers\ApiController\CourseController@findByNameObject');
        Route::get('/find-like-name/{name}', 'App\Http\Controllers\ApiController\CourseController@findLikeName');
        Route::get('/find-by-classify/{classify}', 'App\Http\Controllers\ApiController\CourseController@findByClassify');
        Route::get('/find-by-promotion', 'App\Http\Controllers\ApiController\CourseController@findByPromotion');
        Route::get('/find-by-name/{name}', 'App\Http\Controllers\ApiController\CourseController@findByName');
        Route::get('/find-by-name-image-subcontent-createdate/{limit}', 'App\Http\Controllers\ApiController\CourseController@findByLimit');
        Route::get('/find-by-idtheme/{idTheme}', 'App\Http\Controllers\ApiController\CourseController@findByIdTheme');
        Route::post('/save/{idSmallCategory}/{idUser}/{idTheme}/{idTeacher}', 'App\Http\Controllers\ApiController\CourseController@save');
        Route::post('/deleted/{idCourse}', 'App\Http\Controllers\ApiController\CourseController@delete');
    });
    Route::prefix('/course-has-student')->group(function () {
        Route::get('/find-all', 'App\Http\Controllers\ApiController\CourseHasStudentController@findAll');
        Route::get('/find-by-id-course/{idCourse}', 'App\Http\Controllers\ApiController\CourseHasStudentController@findByIdCourse');
        Route::get('/find-by-id-student/{idStudent}', 'App\Http\Controllers\ApiController\CourseHasStudentController@findByIdStudent');
        Route::post('/save/{idStudent}/{idCourse}', 'App\Http\Controllers\ApiController\CourseHasStudentController@save');
        Route::post('/update/{idStudent}/{idCourseOld}/{idCourseNew}', 'App\Http\Controllers\ApiController\CourseHasStudentController@update');
        Route::post('/deleted/{idStudent}/{idCourse}', 'App\Http\Controllers\ApiController\CourseHasStudentController@delete');

    });
    Route::prefix('/course-has-type-education')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\CourseHasTypeEducationController@findAll');
        Route::get('find-by-idcourse/{idCourse}', 'App\Http\Controllers\ApiController\CourseHasTypeEducationController@findByIdCourse');
        Route::get('find-by-type-education/{idTypeEducation}', 'App\Http\Controllers\ApiController\CourseHasTypeEducationController@findByTypeEducation');
        Route::get('find-by-type-education/{idCourse}/{idTypeEducation}', 'App\Http\Controllers\ApiController\CourseHasTypeEducationController@findByIdCourseAndTypeEducation');
        Route::post('save/{idTypeEducation}/{idCourse}', 'App\Http\Controllers\ApiController\CourseHasTypeEducationController@save');
        Route::post('deleted/{idCourse}/{idTypeEducation}', 'App\Http\Controllers\ApiController\CourseHasTypeEducationController@deleted');
    });
    Route::prefix('/folder-image')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\FolderImageController@findAll');
        Route::get('find-by-value/{value}', 'App\Http\Controllers\ApiController\FolderImageController@findByValue');
        Route::post('save', 'App\Http\Controllers\ApiController\FolderImageController@save');
        Route::post('deleted/{value}', 'App\Http\Controllers\ApiController\FolderImageController@deleted');
    });
    Route::prefix('/group-student')->group(function () {
        Route::get('find-all-true', 'App\Http\Controllers\ApiController\GroupStudentController@findAll');
        Route::get('find-all-false', 'App\Http\Controllers\ApiController\GroupStudentController@findAllFalse');
        Route::get('find-by-id/{id}', 'App\Http\Controllers\ApiController\GroupStudentController@findById');
        Route::get('find-by-name/{name}', 'App\Http\Controllers\ApiController\GroupStudentController@finByName');
    });
    Route::prefix('/image')->group(function () {
        Route::get('find-by-name', 'App\Http\Controllers\ApiController\ImageController@findByName');
        Route::get('find-by-id', 'App\Http\Controllers\ApiController\ImageController@findById');
        Route::get('find-all', 'App\Http\Controllers\ApiController\ImageController@findAll');
        Route::get('find-by-value-folder/{value}', 'App\Http\Controllers\ApiController\ImageController@findByFolderImage_ValueAndStatusTrue');
        Route::post('save/{value}', 'App\Http\Controllers\ApiController\ImageController@save');
        Route::post('deleted/{id}', 'App\Http\Controllers\ApiController\ImageController@delete');
    });
    Route::prefix('/phan-mem')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\PhanMemController@findAll');
        Route::get('find-by-id/{id}', 'App\Http\Controllers\ApiController\PhanMemController@findById');
        Route::get('find-by-like-ten/{ten}', 'App\Http\Controllers\ApiController\PhanMemController@findByLikeName');
        Route::post('save-new/{idUser}', 'App\Http\Controllers\ApiController\PhanMemController@save');
        Route::post('update/{idUser}', 'App\Http\Controllers\ApiController\PhanMemController@update');
        Route::post('deleted/{idPhanMem}', 'App\Http\Controllers\ApiController\PhanMemController@delete');
    });
    Route::prefix('/phieu-mua-pm')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\PhieuMuaPmController@findAll');
        Route::get('find-by-id/{id}', 'App\Http\Controllers\ApiController\PhieuMuaPmController@findById');
        Route::get('find-by-like-sdt/{sdt}', 'App\Http\Controllers\ApiController\PhieuMuaPmController@findByLikeSdt');
        Route::post('save-new', 'App\Http\Controllers\ApiController\PhieuMuaPmController@save');
        Route::post('deleted/{idPhieuMua}', 'App\Http\Controllers\ApiController\PhieuMuaPmController@delete');

    });
    Route::prefix('/pm-has-phieu-mua')->group(function () {
        Route::get('find-by-phieu-mua-id/{idPhieuMua}', 'App\Http\Controllers\ApiController\PmHasPhieuMuaController@findByIdPhieuMua');
        Route::post('save/{idPhieuMua}/{idPhanMem}', 'App\Http\Controllers\ApiController\PmHasPhieuMuaController@save');
        Route::post('delete/{pmId}/{phieuMuaId}', 'App\Http\Controllers\ApiController\PmHasPhieuMuaController@delete');
    });

    Route::prefix('/students')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\StudentController@findAll');
        Route::get('find-by-id', 'App\Http\Controllers\ApiController\StudentController@findById');
        Route::get('find-by-code-private/{code}', 'App\Http\Controllers\ApiController\StudentController@findByCodePrivate');
        Route::get('find-by-like-name/{name}', 'App\Http\Controllers\ApiController\StudentController@findByFullNameLikeAndDeletedTrue');
        Route::get('find-by-course-id-num/{courseId}', 'App\Http\Controllers\ApiController\StudentController@findByCourseIdNumAndDeletedTrue');
        Route::get('find-by-sign-date/{date}', 'App\Http\Controllers\ApiController\StudentController@findBySigninDateLikeAndDeletedTrue');
        Route::get('find-by-group-student-id-num/{idGroupStudent}', 'App\Http\Controllers\ApiController\StudentController@findByGroupStudentIdNumAndDeletedTrue');
        Route::get('find-by-grst-id-and-courseid-num/{idGroupStudent}/{idCourse}', 'App\Http\Controllers\ApiController\StudentController@findByIdGroupStudentAndIdCourseAndDeletedTrue');
        Route::get('find-by-phone-number/{phone}', 'App\Http\Controllers\ApiController\StudentController@findByPhoneNumberAndDeletedTrue');
        Route::get('find-by-codegt/{code}', 'App\Http\Controllers\ApiController\StudentController@findByCodeGtAndDeletedTrueGetAllProperties');
        Route::get('find-by-group-student/{idGroupStudent}', 'App\Http\Controllers\ApiController\StudentController@findByIdGroupStudent_IdAndDeletedTrue');
        Route::get('find-by-id-get-all-properties/{id}', 'App\Http\Controllers\ApiController\StudentController@findByIdGetAllProperties_Custom');
        Route::get('find-by-codegt-get-2infor/{codeGT}', 'App\Http\Controllers\ApiController\StudentController@findByCodeGtGetIdAndName_Custom');
        Route::get('find-by-codeprivate-get-3infor/{codePrivate}', 'App\Http\Controllers\ApiController\StudentController@findByCodePrivateAndDeletedTrue_GetIdAndFullNameAndCodeGt_Custom');
        Route::post('deleted/{id}', 'App\Http\Controllers\ApiController\StudentController@delete');
        Route::post('save/{id-address}/{id-course}/{id-groupStudent}/{idUser}', 'App\Http\Controllers\ApiController\StudentController@saveNewStudent');
        Route::post('update-student-iduser/{idStudent}/{idUser}', 'App\Http\Controllers\ApiController\StudentController@updateIdUser');
        Route::post('update-infor-student/{idUser}/{idGroupStudent}/{idAddress}', 'App\Http\Controllers\ApiController\StudentController@updateInforStudent');
        Route::post('update-student-idgroup-student/{idStudent}/{idUGroupStudent}', 'App\Http\Controllers\ApiController\StudentController@updateIdGroupStudent');

    });
    Route::prefix('/tag')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\TagController@findAll');
        Route::get('find-by-name', 'App\Http\Controllers\ApiController\TagController@findByName');
        Route::get('find-by-id', 'App\Http\Controllers\ApiController\TagController@findByIdTag');
        Route::post('save', 'App\Http\Controllers\ApiController\TagController@save');
        Route::post('delete', 'App\Http\Controllers\ApiController\TagController@delete');

    });
    Route::prefix('/teacher')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\TeacherController@findAll');
        Route::get('find-by-id/{id}', 'App\Http\Controllers\ApiController\TeacherController@findById');
        Route::get('find-by-like-name/{name}', 'App\Http\Controllers\ApiController\TeacherController@findLikeName');
        Route::post('save', 'App\Http\Controllers\ApiController\TeacherController@save');
        Route::post('deleted/{id}', 'App\Http\Controllers\ApiController\TeacherController@delete');
    });
    Route::prefix('/theme')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\ThemController@findAll');
        Route::get('find-by-name/{name}', 'App\Http\Controllers\ApiController\ThemController@findLikeName');
        Route::get('find-by-id/{id}', 'App\Http\Controllers\ApiController\ThemController@findById');
        Route::post('save', 'App\Http\Controllers\ApiController\ThemController@save');
        Route::post('deleted', 'App\Http\Controllers\ApiController\ThemController@delete');
    });
    Route::prefix('/topic')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\TopicController@findAll');
        Route::get('find-by-idtopic/{id}', 'App\Http\Controllers\ApiController\TopicController@findById');
        Route::get('find-by-limit/{limit}', 'App\Http\Controllers\ApiController\TopicController@findLimt');
        Route::get('find-by-title/{title}', 'App\Http\Controllers\ApiController\TopicController@findLikeTitle');
        Route::get('find-by-iduser/{id}', 'App\Http\Controllers\ApiController\TopicController@findByIdUser');
        Route::get('find-by-name-imagesrc-introduct-creatdate', 'App\Http\Controllers\ApiController\TopicController@findByNameImageSubContentCreateDate');
        Route::get('find-by-name-imagesrc-introduct-creatdate/{limit}', 'App\Http\Controllers\ApiController\TopicController@findByNameImageSubContentCreateDateLimit');
        Route::get('find-by-idcourse/{idCourse}', 'App\Http\Controllers\ApiController\TopicController@findByCourseIdOfTopic');
        Route::post('save/{iduser}/{idcourse}', 'App\Http\Controllers\ApiController\TopicController@save');
        Route::post('delete/{id}', 'App\Http\Controllers\ApiController\TopicController@delete');

    });
    Route::prefix('/topic-has-tag')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\TopicHasTagController@findAll');
        Route::get('find-by-idtopic', 'App\Http\Controllers\ApiController\TopicHasTagController@findByIdTopic');
        Route::get('find-by-idtag', 'App\Http\Controllers\ApiController\TopicHasTagController@findByIdTag');
        Route::post('save/{idTopic}/{idTag}', 'App\Http\Controllers\ApiController\TopicHasTagController@save');
    });
    Route::prefix('/type-education')->group(function () {
        Route::get('find-all', 'App\Http\Controllers\ApiController\TypeEducationController@findByDeletedTrue');
        Route::get('find-by-id', 'App\Http\Controllers\ApiController\TypeEducationController@findByIdAndDeletedTrue');

    });
    Route::prefix('/user')->group(function () {
        Route::get('find-by-id/{id}', 'App\Http\Controllers\ApiController\UserController@findById');
        Route::get('find-all', 'App\Http\Controllers\ApiController\UserController@findAll');
        Route::post('login', 'App\Http\Controllers\ApiController\UserController@login');
        Route::post('sign', 'App\Http\Controllers\ApiController\UserController@save');
    });
});
