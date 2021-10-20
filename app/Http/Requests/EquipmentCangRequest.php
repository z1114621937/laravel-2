<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentCangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'equipment_id' =>'required',
            'equipment_name'=> 'required',
            'model'=>'required',
            'number'=>'required',
            'annex'=> 'required',
            'status'=> 'required',
            'info' =>'required',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator); // TODO: Change the autogenerated stub
    }


}