<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    public $timestamps = true;

    protected $fillable = [
        'setting',
        'field_value',
        'field_type',
        'facebook_link',
        'twitter_link',
        'google_plus_link',
        'instagram_link',
        'linkedin_link',
        'logo',
        'algemene_voorwaarden',
        'cookie_beleid',
        'privacy_statement',
        'postcode',
        'adres',
        'fax_nummer',
        'telefoon_nummer',
        'kvk_nummer',
        'btw_nummer',
        'bic_nummer',
        'rekening_nummer',
        'bank_naam',
        'maps_api_key',
        'google_analytics_api_key',
        'hotjar_api_key',
        'facebook_admin_id',
        'contact_email',
        'info_email',
    ];

    protected $dates = ['created_at', 'updated_at'];

}
