<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Attributes
     */
    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'phone', 'message', 'is_read',
    ];

    public $timestamps = true;

    public static function unreadMessages()
    {
        return Message::where('is_read', false)->count();
    }

    public function knowledgeGrade()
    {
        return $this->hasOne('App\KnowledgeGrade', 'knowledge_grade_id', 'knowledge_grade_id')->first();
    }

    public function investAmount()
    {
        return $this->hasMany('App\InvestAmount', 'invest_amount_id', 'invest_amount_id')->first();
    }

    public function time()
    {
        return gmdate("i:s", $this->time);
    }

    public function tableClassColor()
    {
        if($this->is_read)
            return 'bg-white3';
        else
            return 'bg-white1';

    }
}
