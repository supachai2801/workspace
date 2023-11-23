<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table= "tbl_reviews";
    protected $with = ['member'];
    protected $guarded = [];
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
}
