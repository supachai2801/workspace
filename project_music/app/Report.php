<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table= "tbl_reports";
    protected $with = ['member'];
    public function arist(){
        return $this->belongsTo(Arists::class, 'arists_id');
    }
    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
}
