<?php

namespace App\Http\Requests;

class AgentRequest extends Request
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
          'name' => 'required|min:4|max:20',
          'industry' => 'required|min:4|max:20',
          'founder' => 'required|min:4|max:20',
        );
    }
}
