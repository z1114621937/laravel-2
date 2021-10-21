<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * 登录注册模块
 */
Route::prefix('user')->group(function () {
    Route::post('login', 'Login\LoginController@login'); //super登陆
    Route::post('adminlogin', 'Login\LoginController@adminlogin'); //admin登录
    Route::post('studentlogin', 'Login\LoginController@studentlogin'); //admin登录
    Route::post('logout', 'Login\LoginController@logout'); //管理员退出登陆
    Route::post('registered', 'Login\LoginController@registered'); //管理员注册
    Route::post('registereds', 'Login\LoginController@registereds'); //admin管理员注册
    Route::post('registeredss', 'Login\LoginController@registeredss'); //admin管理员注册
    Route::any('mail/send','MailController@send');
});//--pxy


/**
 * 学生负责人模块
 */
Route::middleware('student.check')->prefix('test')->group(function (){
   Route::post('pxy','Login\LoginController@test');
});

/**
 * 普通管理员
 */
Route::middleware('ordinadmin.check')->prefix('test11')->group(function (){
    Route::post('admin','Login\LoginController@admin');
});

/**
 * 超级管理员
 */
Route::middleware('superadmin.check')->prefix('test22')->group(function (){
    Route::post('superadmin','Login\LoginController@superadmin');
    Route::post('superadmin','AdminController@add');

});

Route::prefix('student')->group(function () {
    Route::post('add','StudentController@add');//学生添加（完成）
    Route::post('modify','StudentController@modify');//学生修改（完成）
    Route::post('delete','StudentController@delete');//学生删除(完成)
    Route::post('showstudent','StudentController@showstudent');//学生查询（完成）
});//yjx


Route::prefix('admin')->group(function () {
    Route::post('add','AdminController@add');//管理员添加（完成）
    Route::post('modify','AdminController@modify');//管理员改变（完成）
    Route::post('delete','AdminController@delete');//管理员删除(完成)
    Route::post('show','AdminController@show');//管理员查询(完成)
});//yjx

Route::prefix('equipment')->group(function () {
    Route::post('add','Equipment\EquipmentCangController@add');//器材添加（完成）
    Route::post('modify','Equipment\EquipmentCangController@modify');//器材修改（完成）
    Route::post('delete','Equipment\EquipmentCangController@delete');//器材删除（完成）
    Route::post('show','Equipment\EquipmentCangController@show');//器材查询（完成）
});//yjx

Route::prefix('equipment_borrow')->group(function () {
    Route::post('show','Equipment\Equipment_borrowController@show');//借出器材查询(完成)
});//yjx

Route::prefix('equipment_return')->group(function () {
    Route::post('change','Equipment\EquipmentReturnController@changestatus');//器材归还状态改变查询(完成)
});//yjx

Route::prefix('laboratory')->group(function () {
    Route::post('show','Laboratory\LaboratroyController@show');//实验室查询(完成)
});//yjx


Route::prefix('superadmin')->group(function () {
    Route::post('show','SuperadminController@show');//超管查询(完成)
    Route::get('selectformrun','SuperAdmin\FormController@SelectFormrun'); //查看表单运行情况   (完成)
    Route::post('selectbypeople','SuperAdmin\FormController@SelectBypeople'); //通过申请人来查看 审批中审批表单 (完成)

    Route::get('selectformcomplete','SuperAdmin\FormController@SelectFormcomplete'); // 查看表单完成   (完成)
    Route::post('selectcompletebypeople','SuperAdmin\FormController@SelectCompleteBypeople'); //通过申请人来查看 已审批表单(完成)

    Route::post('stopformrun','SuperAdmin\FormController@StopFormrun'); //终止审批  (完成)
    Route::post('passform','SuperAdmin\FormController@PassForm'); //通过审批/同意       (完成)

    Route::get('selectformnum','SuperAdmin\FormController@SelectFormnum'); //查看审批中和未审批的数量  (完成)
    Route::get('selectrunform','SuperAdmin\FormController@SelectrunForm'); //查看实验运行记录表 (完成)
    Route::post('selectrunformbypeople','SuperAdmin\FormController@SelectrunFormbypeople'); //通过申请人来查看 查看实验运行记录表 (完成)

});//yjx














