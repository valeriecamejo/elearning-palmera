<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserProfileRequest extends FormRequest
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
      'username'    => 'required|max:255|unique:users,username,'.Auth::user()->id,
      'phone'       => 'required|numeric|min:000999999',
      'password'    => 'min:6|confirmed',
    ];
  }
  public function messages() {
    return [
      'phone.min'            => 'El número de teléfono debe contener 7 dígitos.',
      'phone.numeric'        => 'El número de teléfono solo puede contener números.',
    ];
  }
}
