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
      'name'        => 'required|max:255',
      'last_name'   => 'required|max:255',
      'username'    => 'required|max:255|unique:users,username',
      'email'       => 'required|email|max:255|unique:users,email',
      'dni'         => 'required|numeric|min:999999|unique:users,dni',
      'role_id'     => 'required|numeric',
      'brand_id'    => 'required|numeric',
      'country_id'  => 'required|numeric',
      'phone'       => 'required|numeric|min:000999999',
      'password'    => 'required|min:6|confirmed',
    ];
  }
  public function messages() {
    return [
      'dni.min'              => 'La cédula no debe ser menor de 6 dígitos.',
      'dni.numeric'          => 'La cédula solo puede contener números.',
      'phone.min'            => 'El número de teléfono debe contener 7 dígitos.',
      'phone.numeric'        => 'El número de teléfono solo puede contener números.',
    ];
  }
}
