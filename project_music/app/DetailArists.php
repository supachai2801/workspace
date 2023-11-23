<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailArists extends Model
{
    protected $table= "tbl_detail_arists";

    public function arist(){
        return $this->belongsTo(Arists::class, 'arists_id');
    }

    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }

}
