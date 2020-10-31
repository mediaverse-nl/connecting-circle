<?php

namespace App\Http\Requests;

use App\Jobs;
use Illuminate\Foundation\Http\FormRequest;

class CandidateStoreRequest extends FormRequest
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
        $this->redirect = url()->previous().'#appform';

        $jobs = Jobs::pluck('id')->toArray();
        $jobs = implode(',', $jobs);

        $validation = [
            'voorletters' => 'required',
            'voornaam' => 'required',
            'voorvoegsel' => 'nullable',
            'achternaam' => 'required',
            'adres' => 'required',
            'postcode' => 'required',
            'plaats' => 'required',
            'telefoon_prive' => 'required',
            'telefoon_mobiel' => 'nullable',
            'email' => 'required|email',
            'social_netwerkprofiel' => 'url',
            'geboortedatum' => 'required|date_format:d-m-Y',
            'upload_motivatiebrief' => 'nullable|mimes:pdf|max:3000',
            'upload_cv' => 'required|mimes:pdf|max:3000',
            'voorwaarden' => 'accepted',
            'referentienummer' => 'nullable|in:'.$jobs,
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
            'geboortedatum.date_format' => 'Geboortedatum moet een geldig formaat bevatten ( 01-02-1990 / DD-MM-YYYY)'
        ];
    }
}
