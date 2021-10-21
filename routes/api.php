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
 * 学生负责人模块
 * oys
 */
Route::prefix('student')->group(function () {

    //表单
    Route::post('createform', 'Student\FormController@CreateForm'); //学生负责人,创建表单，点击每个实验都会创建一个表单   1
    Route::Get('selectform', 'Student\FormController@SelectForm'); //学生负责人,查看已提交表单，包括状态已经处理结果    1

    //设备借用表
    Route::post('equipmentborrow', 'Student\EquipmentController@EquipmentBorrow'); //学生负责人 设备借用  1
    Route::post('addequipment', 'Student\EquipmentController@AddEquipment'); //添加设备   1
    Route::post('deleteequipment', 'Student\EquipmentController@DeleteEquipment'); //删除设备 1
    Route::post('updateequipment', 'Student\EquipmentController@UpdateEquipment'); //修改设备 1
    Route::post('addequipmentcheck', 'Student\EquipmentController@AddEquipment_borrow_checklist'); //设备清单的添加  1
    Route::Post('selectequipmentborrow', 'Student\EquipmentController@SelectEquipment_borrow'); //查看设备借用表信息  1
    Route::Post('selectequipmentlist', 'Student\EquipmentController@SelectEquipmenlist'); //根据总表的id查看该表的借用设备清单表(已提交表单里面,设备借用表的查看) 1
    Route::post('equipmentborrowupdate', 'Student\EquipmentController@EquipmentBorrowUpdate'); //设备借用表 信息的修改 1

    //实验室借用表
    Route::post('labborrow', 'Student\LabloanController@LabBorrow'); //学生负责人 实验室借用 1
    Route::Post('selectlabloan', 'Student\LabloanController@SelectLabloan');  //查看实验室申请表 1
    Route::Post('updatelabloan', 'Student\LabloanController@UpdateLabloan');  //修改实验室申请表 1

    //实验室运行记录表
    Route::post('addlabrun', 'Student\LabrunController@AddLabrun'); //学生负责人 添加        1
    Route::post('deletelabrun', 'Student\LabrunController@DeleteLabrun'); //学生负责人 删除   1
    Route::post('updatelabrun', 'Student\LabrunController@UpdateLabrun'); //学生负责人 修改    1
    Route::Post('selectlabrun', 'Student\LabrunController@SelectLabrun');  //查看实验室申请表   1

    //开放实验室借用表
    Route::post('openlabborrow', 'Student\OpenlabController@OpenlabBorrow'); //学生负责人 开放实验室借用 1
    Route::post('openlabaddstu', 'Student\OpenlabController@OpenlabAddstu'); //添加学生        1
    Route::post('openlabdeletestu', 'Student\OpenlabController@OpenlabDeletestu'); //删除学生   1
    Route::post('openlabupdatestu', 'Student\OpenlabController@OpenlabUpdatestu'); //修改学生   1
    Route::post('openlabselect', 'Student\OpenlabController@OpenlabSelect'); //学生负责人 开放实验室查看  1
    Route::post('openlabselectstu', 'Student\OpenlabController@OpenlabSelectstu'); //学生查看成功   1


    //设备归还信息查看
    Route::get('selectreturnequipment', 'Student\EquipmentController@SelectReturnEquipment'); //设备归还的信息查看
    Route::post('returnequipment', 'Student\EquipmentController@ReturnEquipment'); //归还设备


    Route::post('select', 'Student\StudentController@SelectStudent'); //学生负责人个人信息查看  1
});


