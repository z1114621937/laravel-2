<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table='form';
    protected $primaryKey='form_id';
    public  $timestamps= true;
    protected $guarded = [];


    /**
     * 在点击的时候就创建一个表单
     * @author oys
     * @param $applicant_name
     * @param $type_id
     * @param $form_status
     * @return false
     */
    public static function CreateForm($applicant_name,$type_id,$form_status)
    {
        try {
            //申请表创建成功
            $res=self::create(
                [
                    'applicant_name'=>$applicant_name,
                    'type_id'=>$type_id,
                    'form_status'=>$form_status,
                ]
            );
            return $res;
        }catch (\Exception $e){
            logError('主表创建成功',[$e->getMessage()]);
            return false;
        }
    }



    /**
     * 查看这个表单
     * @author oys
     * @return false
     */
    public static function SelectForm()
    {
        try {
            //申请表创建成功
            $res=self::get();
            return $res;
        }catch (\Exception $e){
            logError('已提交表单查看成功',[$e->getMessage()]);
            return false;
        }
    }




}
