<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingsRequest extends FormRequest
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
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'google_plus_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'logo' => 'nullable|mimes:jpeg,png|max:3000',
            'algemene_voorwaarden' => 'nullable|mimes:pdf|max:3000',
            'cookie_beleid' => 'nullable|mimes:pdf|max:3000',
            'privacy_statement' => 'nullable|mimes:pdf|max:3000',
            'postcode' => 'nullable',
            'adres' => 'nullable',
            'fax_nummer' => 'nullable',
            'telefoon_nummer' => 'nullable',
            'kvk_nummer' => 'nullable',
            'btw_nummer' => 'nullable',
            'bic_nummer' => 'nullable',
            'rekeningnummer' => 'nullable',
            'bank_naam' => 'nullable',
            'maps_api_key' => 'nullable',
            'google_analytics_api_key' => 'nullable',
            'hotjar_api_key' => 'nullable',
            'facebook_admin_id' => 'nullable',
            'contact_email' => 'nullable|email',
            'info_email' => 'nullable|email',
        ];
    }
}
