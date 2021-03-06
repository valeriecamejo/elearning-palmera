<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncentivePlanUpdateRequest extends FormRequest
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
      'name'          => 'required|max:255|unique:incentive_plans,name,'.$this->id . 'id',
			'incentive'     => 'required',
			'score'         => 'required',
    ];
		}
		public function messages() {
			return [
				'name.required'           => 'Debe asignar un nombre.',
				'name.unique'             => 'Ya existe un plan de incentivos con este nombre',
				'incentive.required'      => 'Debe asignar el tipo de plan de incentivo (Ventas o Entrenamiento)',
				'score.required'          => 'Debe indicar el puntaje para el plan de incentivos',
			];
		}
}
