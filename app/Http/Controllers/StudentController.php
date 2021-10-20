<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * yjx
     * 增加
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request){
        $student_id = $request['student_id'];
        $student_password = $request['student_password'];
        $student_name = $request['student_name'];
        $student_phone = $request['student_phone'];
        $student_email = $request['student_email'];

        $res1 = Student::establish(
            $student_id,
            $student_password,
            $student_name,
            $student_phone,
            $student_email

        );

        return $res1?
            json_success("操作成功",null,200):
            json_fail("操作失败",null,100);

}

    /**
     * yjx
     * 修改
     * @param Request $request
     * @return JsonResponse
     */
    public function modify(Request $request){
       // $stuid1 = $request['stuid1'];
        $student_id = $request['student_id'];
        $student_password = $request['student_password'];
        $student_name = $request['student_name'];
        $student_phone = $request['student_phone'];
        $student_email = $request['student_email'];

        $res1 = Student::modify(
            //$stuid1,
            $student_id,
            $student_password,
            $student_name,
            $student_phone,
            $student_email
        );
        return $res1?
            json_success("操作成功",$res1,200):
            json_fail("操作失败",$res1,100);
    }

    /**
     * yjx
     * 删除
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(Request $request)
    {

        $student_id = $request['student_id'];
        $res = Student::delect($student_id);

        return $res ?
            json_success("操作成功", $res, 200) :
            json_fail("操作失败", $res, 100);

    }

    /**
     * yjx
     * 查询
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request){
        $student_id = $request['student_id'];
        $res = Student::show($student_id);

        return $res ?
            json_success("操作成功", $res, 200) :
            json_fail("操作失败", $res, 100);



    }






}
