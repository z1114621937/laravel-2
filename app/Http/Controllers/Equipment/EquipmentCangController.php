<?php

namespace App\Http\Controllers\Equipment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EquipmentCang;
class EquipmentCangController extends Controller
{
    /**
     * yjx
     * 增加实验器材
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request){
        $equipment_id = $request['equipment_id'];
        $equipment_name = $request['equipment_name'];
        $model = $request['model'];
        $number = $request['number'];
        $annex = $request['annex'];
        $status = $request['status'];
        $info = $request['info'];

        $res = EquipmentCang::add(
            $equipment_id,
            $equipment_name,
            $model,
            $number,
            $annex,
            $status,
            $info
        );
        return $res?
            json_success("操作成功",$res,200):
            json_fail("操作失败",$res,100);

    }

    /***
     * yjx
     * 器材修改
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function modify(Request $request){
        $equipment_id = $request['equipment_id'];
        $equipment_name = $request['equipment_name'];
        $model = $request['model'];
        $number = $request['number'];
        $annex = $request['annex'];
        $status = $request['status'];
        $info = $request['info'];

        $res = EquipmentCang::modify(
            $equipment_id,
            $equipment_name,
            $model,
            $number,
            $annex,
            $status,
            $info
        );
        return $res?
            json_success("操作成功",$res,200):
            json_fail("操作失败",$res,100);

    }

    /***
     * yjx
     * 删除器材
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delate(Request $request)
    {
        $equipement_id = $request['equipement_id'];
        $res = EquipmentCang::delate($equipement_id);
        return $res ?
            json_success("操作成功", $res, 200) :
            json_fail("操作失败", $res, 100);

    }

    /***
     * yjx
     *查询器材
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $equipement_id = $request['equipement_id'];
        $res = EquipmentCang::show($equipement_id);
        return $res ?
            json_success("操作成功", $res, 200) :
            json_fail("操作失败", $res, 100);

    }






}
