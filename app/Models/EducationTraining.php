<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationTraining extends Model
{
    use HasFactory;

    public function academic_qualifications(){
      return $this->hasMany(AcademicQualification::class, "education_trainings_id","id");
    }

    public function trainings(){
      //ProfessionalTrainning
      return $this->hasMany(ProfessionalTrainning::class, "education_trainings_id","id");
    }
}
