<?php

namespace App\Traits;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;

trait EncryptFilter
{
    public function encryptFilter($query, $redirectUrl)
    {
        $query = collect($query)->toArray();

        $queryWithOutFilter = Arr::except($query, ['filter']);

        if (!request()->has('filter') && !empty($queryWithOutFilter)){
            $encrypted = Crypt::encryptString(json_encode($query));
            return redirect($redirectUrl.'?filter='.$encrypted)->send();
        }

        if (request()->has('filter')){
            try {
                $decrypted = Crypt::decryptString(request()->get('filter'));
            } catch (DecryptException $e) {
                return redirect($redirectUrl)->send();
            }
            $filter = json_decode($decrypted, true);
            if (empty(array_filter($filter))) {
                return redirect($redirectUrl)->send();
            }
        }else{
            $filter = [];
        }

        return $filter;
    }
}
