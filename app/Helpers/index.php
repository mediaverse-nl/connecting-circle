<?php

if (! function_exists('uploadImage')) {
    function uploadImage(\Illuminate\Http\Request $request, $input, $storePath = 'image', $mimes = 'jpeg,png') {
        if ($request->hasFile($input)) {
            if ($request->file($input)->isValid()) {
                $request->validate([
                    $input => 'mimes:'.$mimes.'|max:3000',
                ]);
                return $request->file($input)->store($storePath);
            }
        }
        return null;
    }
}

if (! function_exists('getSetting')) {
    function getSetting($field) {
        $settings = new \App\Settings();

        $setting = $settings->where('setting', '=', $field);

        if ($setting->first() !== null){
            return $setting->first()->field_value;
        }

        return null;
    }
}

if (! function_exists('randomAlpabetString')) {
    function randomAlpabetString($maxLength = 6) {
        $permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($permitted_chars), 0, $maxLength);
    }
}
