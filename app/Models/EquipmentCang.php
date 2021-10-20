<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentCang extends Model

{
    protected $table = "equipment";
    public $timestamps = true;
    protected $primaryKey = "equipment_id";
    protected $guarded = [];


    /***
     * yjx
     * 增加实验器材
     * @param $equipment_id
     * @param $equipment_name
     * @param $model
     * @param $number
     * @param $annex
     * @param $status
     * @param $info
     * @return false
     */
    public static function add(
        $equipment_id,
        $equipment_name,
        $model,
        $number,
        $annex,
        $status,
        $info
    ){
        try {
            $res = self::create(
                [
                    $equipment_id=>'equipment_id',
                    $equipment_name=>'equipment_name',
                    $model=>'model',
                    $number=>'number',
                    $annex=>'annex',
                    $status=>'status',
                    $info=>'info'
                ]
            );
            return $res?
                $res:
                false;
        }catch (\Exception $e ){
            logError('添加错误', [$e->getMessage()]);
            return false;
        }
    }

    /**
     * yjx
     *修改器材
     * @param $equipment_id
     * @param $equipment_name
     * @param $model
     * @param $number
     * @param $annex
     * @param $status
     * @param $info
     * @return false
     */
    public static function modify($equipment_id,
                                  $equipment_name,
                                  $model,
                                  $number,
                                  $annex,
                                  $status,
                                  $info){
        try {
            $res = self::where('equipment_id',$equipment_id)->update(
                [
                    //$equipment_id=>'equipment_id',
                    $equipment_name=>'equipment_name',
                    $model=>'model',
                    $number=>'number',
                    $annex=>'annex',
                    $status=>'status',
                    $info=>'info'
                ]
            );
            return $res?
                $res:
                false;
        }catch (\Exception $e ){
            logError('改变错误', [$e->getMessage()]);
            return false;
        }
    }

    /**
     * yjx
     * 删除器材
     * @param $equipment_id
     * @return false
     */
    public static function delate($equipment_id){
        try {
            $res = Student::where('equipment_id','=',$equipment_id)->delate();
            return $res ?
                $res :
                false;

        }catch (\Exception $e){
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }

    /***
     * yjx
     * 查询器材
     * @param $equipment_id
     * @return false
     */
    public static function show($equipment_id){
        try {
            $res = Student::where('equipment_id','=',$equipment_id)->get();
            return $res ?
                $res :
                false;

        }catch (\Exception $e){
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }

}
