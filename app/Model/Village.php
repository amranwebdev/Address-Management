<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public function division(){
        return $this->belongsTo(Division::class, 'division_id','id');
    }

    public function district(){
        return $this->belongsTo(district::class, 'district_id','id');
    }

    public function upazila(){
        return $this->belongsTo(upazila::class, 'upazila_id','id');
    }

    public function union(){
        return $this->belongsTo(union::class, 'union_id','id');
    }
}
