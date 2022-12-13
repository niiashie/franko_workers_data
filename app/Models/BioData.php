<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioData extends Model
{
    use HasFactory;

    public function children(){
        return $this->hasMany(Child::class, "family_data_id","id");
    }

    public function education_training(){
        return $this->hasOne(EducationTraining::class,"bio_data_id","id");
    }

    public function referees(){
        return $this->hasMany(Referees::class,"bio_data_id","id");
    }

    public function beneficiary(){
        return $this->hasMany(Beneficiary::class,"bio_data_id","id");
    }

    public function employee_data(){
        return $this->hasOne(EmploymentRecord::class,"bio_data_id","id");
    }

    public function emergency(){
        return $this->hasOne(Emergency::class,"bio_data_id","id"); 
    }

    public function leave(){
        return $this->hasOne(Leave::class,"bio_data_id","id"); 
    }
}
