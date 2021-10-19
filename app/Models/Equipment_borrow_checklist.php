<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment_borrow_checklist extends Model
{
    protected $table='equipment_borrow_checklist';
    protected $primaryKey='checklist_id';
    public  $timestamps=true;
    protected $guarded = [];


    /**
     * 设备借用表录入借用清单
     * @author oys
     * @param $form_id
     * @param $equipment_id
     * @param $equipment_number
     * @return false
     */
    public static function Addequipment_borrow_checklist($form_id,$equipment_id,$equipment_number)
    {
        try {
            //设备表成功
            $res=self::create(
                [
                    'form_id'=>$form_id,
                    'equipment_id'=>$equipment_id,
                    'equipment_number'=>$equipment_number,
                ]
            );
            return $res;
        }catch (\Exception $e){
            logError('设备清单录入成功',[$e->getMessage()]);
            return false;
        }
    }

    /**
     * 通过表名 查看设备调用清单
     * @author oys
     * @param $form_id
     * @return false
     */
    public static function SelectEtquipmenlist($form_id)
    {
        try {
            $res=self::where('form_id',$form_id)->get();
            return $res;
        }catch (\Exception $e){
            logError('查询所有设备成功',[$e->getMessage()]);
            return false;
        }
    }


}
