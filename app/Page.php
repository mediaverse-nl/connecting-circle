<?php

namespace App;

use App\Traits\SeoTags;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use SeoTags;

    protected $table = 'page';

    public $timestamps = true;

    protected $fillable = [
        'slug',
        'titel',
        'meta_titel',
        'meta_beschrijving',
        'meta_titel_twitter',
        'meta_beschrijving_twitter',
        'meta_image_twitter',
        'meta_titel_open_graph',
        'meta_beschrijving_open_graph',
        'meta_image_open_graph',
        'options',
        'nofollow',
        'noindex',
        'in_sitemap',
        'in_menu',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function slugTitle()
    {
        return Str::slug($this->slug, '-');
    }
}
