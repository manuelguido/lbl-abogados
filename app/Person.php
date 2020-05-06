<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //Data
    protected $table = 'people';
    protected $primaryKey = 'id';
    public $timestamps = false;

    const IMAGES_PATH = '/public/people';
    const IMAGES_DISPLAY_PATH = '/public/storage/people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'title', 'collegue', 'admissions', 'img',
    ];

}
