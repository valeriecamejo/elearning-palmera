<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleUpdateRequest extends FormRequest
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
            'name'       => 'required|max:255|unique:modules,name,'.$this->id . 'id',
            'path'       => 'required',
            'is_config'  => 'required',
        ];
    }
    public function messages() {
        return [
            'name.required'       => 'Debe asignar un nombre.',
            'name.unique'         => 'Ya existe un modulo con este nombre',
            'path.required'       => 'La ruta es requerida',
            'is_config.required'  => 'La ruta es requerida',
        ];
    }
}
