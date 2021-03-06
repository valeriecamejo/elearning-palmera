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
            'date'          => 'required',
            'product_id'    => 'required|numeric',
            'quantity'      => 'required|numeric',
            'store_id'         => 'required',
            'file'          => 'required',
            'reference'     => 'required'
          ];
    }
}
