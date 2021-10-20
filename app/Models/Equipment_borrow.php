<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment_borrow extends Model
{
    protected $table = "equipment_borrow";
    public $timestamps = true;
    protected $primaryKey = "form_id";
    protected $guarded = [];

    /***
     * yjx
     * 查询借出记录
     * @param $form_id
     * @return false
     */
    public static function show($form_id){
        try {
            $res = Equipment_borrow::where('form_id','=',$form_id)->get();
            return $res?
                $res:
                false;

        }catch (\Exception $e ){
            logError('添加错误', [$e->getMessage()]);
            return false;
        }
    }



}
