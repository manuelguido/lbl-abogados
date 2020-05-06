<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class FAQ extends Model
{
    //Data
    protected $table = 'faqs';
    protected $primaryKey = 'faq_id';
    public $timestamps = false;

    public static function allWithTopics(){
        return DB::table('faqs')
            ->leftjoin('topics', 'faqs.topic_id', '=', 'topics.topic_id')
            ->get();
    }

    public static function allWithTopicsOrdered(){
        return DB::table('faqs')
            ->leftjoin('topics', 'faqs.topic_id', '=', 'topics.topic_id')
            ->orderBy('topic_name', 'ASC')
            ->get();
    }

    public static function getWithTopic($id){
        return DB::table('faqs')
            ->leftjoin('topics', 'faqs.topic_id', '=', 'topics.topic_id')
            ->get();
    }
    
}
