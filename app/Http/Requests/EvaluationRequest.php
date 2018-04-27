<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest {
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
      'name'          => 'required|max:255|unique:evaluations,name',
      'description'   => 'required|max:255',
      'product_id'    => 'required|numeric',
      'score'         => 'required|numeric',
      'photo'         => 'max:255',
    ];
  }
}
