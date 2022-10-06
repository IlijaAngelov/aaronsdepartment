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
            'Employee' => 'required|max:255',
            'Employer' =>'required|max:255',
            'Hours' =>'required|min:1',
            'Rate_per_Hour' =>'required',
            'Taxable' =>'required',
            'Status' =>'required',
            'Shift_Type' =>'required',
            'Paid_At' =>'required'
        ];

        return $rules;
    }
}
