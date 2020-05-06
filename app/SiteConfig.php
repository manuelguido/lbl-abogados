<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    //Data
    protected $table = 'site_configs';
    protected $primaryKey = 'id';
    public $timestamps = false;

    const IMAGES_PATH = 'public/site/';
    const IMAGES_DISPLAY_PATH = '/public/storage/site/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'home_img', 'contact_img', 'about_us_img', 'news_img', 'faqs_img',
    ];

}
