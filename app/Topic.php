<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Topic extends Model
{
    //Data
    protected $table = 'topics';
    protected $primaryKey = 'topic_id';
    public $timestamps = false;

    public static function allOrdered(){
        return DB::table('topics')
            ->orderBy('topic_name', 'ASC')
            ->get();
    }
}
