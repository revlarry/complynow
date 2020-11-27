<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnrolmentRequest extends FormRequest
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
            'fname' => 'required|max:100',
            'mname' => 'max:100',
            'lname' => 'required|max:100',
            'company' => 'required|max:100',
            'training' => 'required',
            'startdate' => 'required',
            'enddate' => 'required'
        ];
    }
}
