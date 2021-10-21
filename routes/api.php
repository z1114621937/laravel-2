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
});


/**
 * 普通管理员的所有功能实现
 */
Route::prefix('Admin2')->namespace('Csl')->group(function (){
    //期末教学检查
    Route::post("jlform","RecordController@Jlform");//记录人和编号存入
    Route::get("qmshow","RecordController@Qmshow");//期末实验教学检查记录
    Route::post("qmchange","RecordController@Qmchange");//期末实验教学检查记录修改
    Route::post("qmdelete","RecordController@Qmdelete");//期末实验教学检查记录删除
    Route::post("qmadd","RecordController@Qmadd");//期末实验教学检查记录添加
    //待审批表单
    Route::post("spform","ShenpiController@Spshow");//待审批表单信息展示
    Route::post("search","ShenpiController@Search");//待审批表以申请人搜索
    Route::post("approve1","ShenpiController@Approve1");//待审批表的审批设备借用表
    Route::post("approve2","ShenpiController@Approve2");//待审批表的审批设备借用清单
    Route::post("approve3","ShenpiController@Approve3");//待审批表的审批设备借用清单，同意或否决的状态存入
    Route::post("approve4","ShenpiController@Approve4");//待审批表的审批设备借用清单，否决原因的存入

    //已提交表单
    Route::post("afterform","SubmittedController@Aftershow");//已提交表单的信息展示
    Route::post("aftersearch","SubmittedController@Aftersearch");//已提交表单以填报人进行搜索
    Route::post("afterlook1","SubmittedController@Afterlook1");//已提交表单设备借用的查看
    Route::post("afterlook2","SubmittedController@Afterlook2");//已提交表单的设备清单查看
    Route::post("afterlook3","SubmittedController@Afterlook3");//已提交表单的审批查看
    Route::post("afterchange","SubmittedController@Afterchange");//已提交表单的审批结果的修改
    Route::post("approve4","ShenpiController@Approve4");//待审批表的审批设备借用清单，否决原因的存入
//    Route::post();//表单的统计
    Route::post("tjform","NumberController@Tjform");
    //个人信息的查看
    Route::post("look","InformationController@look");
    //设备仓库
    Route::get("eshow","WarehouseController@Eshow");//仓库信息展示
    Route::post("esearch","WarehouseController@Esearch");//搜索


});
