<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'text';

    public $timestamps = false;

    protected $fillable = ['key_name', 'text_type', 'mentions', 'text'];

    protected $casts = [
        'mentions' => 'array',
    ];

    public function mentions()
    {
        $keys = '';
        $mentions = json_decode($this->mentions, true);

        if(isset($mentions)){
            $keys .= '[';
            foreach ($mentions['mentions'] as $key => $v){
                $keys .= '"'.$key.'",';
            }
            $keys .= ']';
        }

        return $keys;
    }
}
