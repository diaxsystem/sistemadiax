<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'titulo'=>[ 'required','max:255'],
            'descripcion'=>[ 'required','max:1000'],
            'precio'=>[ 'required','min:1'],
            'stock'=>[ 'required','min:0'],
            'status'=>[ 'required','in:disponible,no-disponible'],
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
