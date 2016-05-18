<?php

namespace App\Http\Requests;

/**
 * @property mixed name
 */
class AgentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//      return \Auth::check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|min:4|max:20',
          'industry' => 'required|min:4|max:20',
          'founder' => 'required|min:4|max:20',
        ];
    }
}
