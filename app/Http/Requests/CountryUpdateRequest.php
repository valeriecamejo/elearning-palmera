<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryUpdateRequest extends FormRequest
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
          'name' => 'required|max:255|unique:countries,name,'.$this->id . 'id',
          'nickname'  => 'required|max:255|unique:countries,nickname,'.$this->id . 'id',
        ];
    }
    public function messages() {
        return [
            'name.required'     => 'Debe asignar un nombre.',
            'name.unique'       => 'Ya existe un pais con este nombre',
            'nickname.required' => 'Debe asignar un nickname.',
            'nickname.unique'   => 'Ya existe un pais con este nickname',
        ];
      }
}
