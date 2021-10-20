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


//测试
Route::post('ss','StudentController@add');//学生添加（完成）
Route::post('sss','StudentController@modify');//学生修改（完成）
Route::post('sss1','StudentController@delete');//学生删除
Route::post('sss2','StudentController@show');//学生查询（完成）

Route::post('aaa','Equipment\Equipment_borrow_checklistController@show');
