<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    public function division(){
        return $this->belongsTo(Division::class, 'division_id','id');
    }

    public function district(){
        return $this->belongsTo(district::class, 'district_id','id');
    }
}
