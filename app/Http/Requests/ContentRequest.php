<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize() {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules() {
    return [
      'name'   => 'required|max:255|unique:contents,name',
    ];
    }
  public function messages() {
    return [
      'name.required'     => 'Debe asignar un nombre.',
      'name.unique'       => 'Ya existe un titulo con este nombre.',
    ];
  }
}
