<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Models\Equipment_borrow;
use Illuminate\Http\Request;

class Equipment_borrowController extends Controller
{
    /**
     * yjx
     * 查询器材借出记录
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request){
        $form_id = $request['form_id'];
        $res = Equipment_borrow::show($form_id);
        return $res ?
            json_success("操作成功", $res, 200) :
            json_fail("操作失败", $res, 100);
    }
}
