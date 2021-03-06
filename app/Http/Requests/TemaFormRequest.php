<?php

namespace TeachAR\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemaFormRequest extends FormRequest
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
            'idmodulo'=>'required',
            'nombre'=>'required|max:45',
            'descripcion'=>'required|max:6000',
            'imagen'=>'mimes:jpeg,bmp,png,jpg'
        ];
    }
}
