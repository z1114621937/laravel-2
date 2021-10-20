<?php

namespace App\Http\Controllers\Laboratory;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratroyController extends Controller
{
    /***
     * yjx
     * 查看实验室
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request){
        $laboratory_id = $request['laboratory_id'];
        /*$laboratory_name = $request['laboratory_name'];
        $place = $request['place'];
        $type = $request['type'];*/

        $res = Laboratory::show($laboratory_id);
        return $res ?
            json_success("操作成功", $res, 200) :
            json_fail("操作失败", $res, 100);

    }
}
