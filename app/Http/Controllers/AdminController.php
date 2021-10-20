<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /***
     * yjx
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request){
        $id = $request['id'];
        $password = $request['password'];
        $name = $request['name'];
        $phone = $request['phone'];
        $email = $request['email'];
        $type = $request['type'];

        $res1 = Admin::establish(
            $id,
            $password,
            $name,
            $phone,
            $email,
            $type
        );
        return $res1?
            json_success("操作成功",null,200):
            json_fail("操作失败",null,100);

    }

    /***
     * yjx
     * 修改
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function modify(Request $request){
        $id = $request['id'];
        $password = $request['password'];
        $name = $request['name'];
        $phone = $request['phone'];
        $email = $request['email'];
        $type = $request['type'];


        $res1 = Admin::modify(
            $id,
            $password,
            $name,
            $phone,
            $email,
            $type
        );
        return $res1?
            json_success("操作成功",$res1,200):
            json_fail("操作失败",$res1,100);
    }


    /***
     * yjx
     * 管理员删除
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request){
        $id = $request['id'];
        $res1 = Admin::delete1($id);

        return $res1?
            json_success("操作成功",$res1,200):
            json_fail("操作失败",$res1,100);

    }

    /***
     * yjx
     * 管理员查询
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request){
        $id = $request['id'];
        $res1 = Admin::show($id);

        return $res1?
            json_success("操作成功",$res1,200):
            json_fail("操作失败",$res1,100);
    }
}

