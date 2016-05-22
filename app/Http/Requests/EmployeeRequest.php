<?php

namespace App\Http\Requests;

class EmployeeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array(
          'name' => 'required|min:3|max:30',
          'email' => 'required|email',
          'title' => 'required|max:20',
        );
    }
}
