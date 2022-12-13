<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentRecord extends Model
{
    use HasFactory;

    public function previous_jobs(){
        return $this->hasMany(PreviousWorkPlace::class,"employment_records_id","id");
    }
}
