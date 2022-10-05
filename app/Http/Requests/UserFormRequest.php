<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'employee' => 'required|max:255',
            'employer' =>'required|max:255',
            'hours' =>'required|min:1',
            'rate_per_hour' =>'required',
            'taxable' =>'required',
            'status' =>'required',
            'shift_type' =>'required',
            'paid_at' =>'required'
        ];
    }
}
