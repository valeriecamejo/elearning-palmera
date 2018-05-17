<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'description'   => 'required|max:255',
            'user_id'       => 'required|numeric',
            'product_id'    => 'required|numeric',
            'quantity'      => 'required|numeric',
            'store'         => 'required|numeric',
            'file'          => 'required',
            'reference'     => 'required'
          ];
    }
}
