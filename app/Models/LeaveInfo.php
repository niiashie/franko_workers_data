<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveInfo extends Model
{
    use HasFactory;

    public function biodata(){
        return $this->belongsTo(BioData::class,"id");
    }
}
