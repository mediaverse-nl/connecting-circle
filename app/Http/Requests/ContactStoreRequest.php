<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
        $validation = [
//            'g-recaptcha-response' => 'required|captcha',
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required|email',
            'telefoonnummer' => 'nullable',
            'bericht' => 'required',
        ];

        if (!empty(getSetting('NOCAPTCHA_SECRET'))){
            $validation = Arr::add(
                $validation,
                'g-recaptcha-response',
                'required|captcha'
            );
        }

        return $validation;
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'recaptcha is verplicht.'
        ];
    }
}
