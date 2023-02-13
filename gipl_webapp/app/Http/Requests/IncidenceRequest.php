<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $authorized = false;

        // if ($this->user_id == auth()->user()->id) {
        //     $authorized = true;
        // }

        // return $authorized;

        //return false;

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // $incidence = $this->route()->parameter('incidence');

        return [
            'state_id' => 'required',
            'classroom_id' => 'required',
            'computer_id' => 'required',
            'peripheral_id' => 'required',
            'description' => 'required'
        ];

    }
}
