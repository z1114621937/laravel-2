<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment_borrow_checklist extends Model
{
    protected $table = "equipment_borrow_checklist";
    public $timestamps = true;
    protected $primaryKey = "checlist_id";
    protected $guarded = [];

    /**
     * yjx
     * 查询设备归还记录
     * @param $checlist_id
     * @return false
     */
    public static function show($checklist_id){
        try {
            $res = self::where('checklist_id','=',$checklist_id)->get();
            return $res?
                $res:
                false;

        }catch (\Exception $e ){
            logError('查询错误', [$e->getMessage()]);
            return false;
        }
    }

    public static function shenpi(){}


}
