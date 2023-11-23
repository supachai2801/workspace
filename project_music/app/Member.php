<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Member extends Authenticatable
{
    use Notifiable;
    
    protected $table= "tbl_members";
    protected $guarded = [];
    protected $with = ['arist'];

    public function arist(){
        return $this->hasMany(Arists::class, 'member_id', 'id');
    }
    public function province(){
        return $this->belongsTo(Province::class)->withPivot(['name_th']);
    }

    public function getGetImageAttribute() {
        try {
            $image = Storage::get('/image_members/'.$this->image_p);
            $type = pathinfo($this->image_p, PATHINFO_EXTENSION);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);
            return $base64;
        } catch (\Throwable $th) {
            return '';
        }
        
    }
}
