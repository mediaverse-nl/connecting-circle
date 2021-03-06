<?php

namespace App;

use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model implements Commentable
{
    use HasComments;

    protected $fillable = [
        'upload_cv',
        'upload_motivatiebrief',
        'profiel_foto',
    ];

    public function languages()
    {
        return $this->hasMany(Language::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function educations()
    {
        return $this->hasMany(Educations::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function references()
    {
        return $this->hasMany(References::class);
    }

    public function interests()
    {
        return $this->hasMany(Interests::class);
    }

    public function getRijbewijsNotitiesAttribute()
    {
//        dd($this->data);
        if (!empty($this->data)){
            $data = json_decode($this->data, true);
//            dd();
//            $flipData = array_flip($data);
            if (array_key_exists('rijbewijs_notities', $data)){
                return $data['rijbewijs_notities'];
            }
        }
        return null;
    }

    public function getSalarisindicatieAttribute()
    {
        if (!empty($this->data)){
            $data = json_decode($this->data, true);
            if (array_key_exists('salarisindicatie', $data)){
                return $data['salarisindicatie'];
            }
        }
        return null;
     }
}
