<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //Reglas requeridas de las reglas
            'name'=>[ 'required','max:255'],
            'email'=>[ 'required','max:1000']
            
        ];
    }

    public function withValidator($validator){
        $validator->after(function($validator){
            if($this->status == 'disponible' && $this->stock == 0){
                $validator->errors()->add('stock', 'Si esta disponible debe tener un stock');
            }
        });      
    }
}
