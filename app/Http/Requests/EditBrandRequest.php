<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBrandRequest extends FormRequest
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
            'name'         => 'required|max:255,'.$this->id,
            'navbar_color' => 'required|max:255',
            'logo'         => 'max:255',
            'header'       => 'max:255'
          ];
    }
}
