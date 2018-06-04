<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DownloadUpdateRequest extends FormRequest
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
      'name' => 'required|max:255|unique:downloads,name,' . $this->download_id . 'id',
    ];
  }
  public function messages() {
    return [
      'name.unique' => 'Ya existe un archivo con este nombre.',
    ];
  }
}
