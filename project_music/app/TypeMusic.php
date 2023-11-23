<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeMusic extends Model
{
    protected $table="tbl_type_music";

    public function arist() {
        return $this->hasMany(Arists::class, 'style');
    }
}
