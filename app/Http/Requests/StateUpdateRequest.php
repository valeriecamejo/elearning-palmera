<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateUpdateRequest extends FormRequest
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
            'name' => 'required|max:255|unique:states,name,'.$this->state_id . 'id',
        ];
    }
    public function messages() {
        return [
        'name.required'     => 'Debe asignar un nombre.',
        'name.unique'       => 'Ya existe un estado/provincia con este nombre',
        ];
    }
}
