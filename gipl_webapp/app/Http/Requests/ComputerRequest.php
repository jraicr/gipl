<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerRequest extends FormRequest
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
        $computer = $this->route()->parameter('computer');

        $rules = [
            'num' => [
                        'required',
                        'unique:App\Models\Computer',
                        'regex:/^INFORMATICA\-[0-9]{3}$/'
                     ]
        ];

         if ($computer) {

            $rules['num'] = ['required',
                            'regex:/^INFORMATICA\-[0-9]{3}$/',
                            'unique:computers,num,'. $computer->id
                            ];
         }

        return $rules;
    }
}
