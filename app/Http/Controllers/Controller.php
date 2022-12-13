<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\admin;
use App\Models\BioData;
use App\Models\FamilyData;
use App\Models\Child;
use App\Models\EmploymentRecord;
use App\Models\PreviousWorkPlace;
use App\Models\EducationTraining;
use App\Models\ProfessionalTrainning;
use App\Models\AcademicQualification;
use App\Models\Referees;
use App\Models\Emergency;
use App\Models\Beneficiary;
use App\Models\Leave;
use App\Models\LeaveInfo;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function loginData(Request $request){
        $data = $request->validate([
         'pin' => 'required',
         'password' => 'required'
       ]);
       $password = $request->password;
       $hash_password = Hash::make($password);
       $admin = Admin::where('pin',$request->pin)->get()->count();

       if ($admin == 0) {
         return Redirect::back()->withErrors(['message' => 'Invalid Pin ']);
       }
       else {
         if(Hash::check($password,$hash_password)){
            return redirect('/dashboard');
         }
         else{
            return Redirect::back()->withErrors(['message' => 'Invalid Password']);
         }
        // $request->session()->put('key', 'value');
       
       }


    }

    public function register(Request $request){
        $request ->validate([
            'name' => 'required|string',
            'userId' => 'required|max:4',
            'password' => 'required',
            'confirm_password' => 'required',
            'key' => 'required'
        ]);

        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $name = $request->name;
        $userId = $request->userId;

        if($password != $confirm_password){
            return Redirect::back()->withErrors(['msg' => 'Passwords do not match']);
        }
        else if($request->key != "00510"){
            return Redirect::back()->withErrors(['msg' => 'Invalid admin key']);
        }
        else{
             
           $actual_password = Hash::make($password);
           $admin = new Admin;
           $admin->name = $name;
           $admin->pin = $userId;
           $admin->password = $actual_password;
           $admin->save();
           
           return back()->with('success','success');
        }
    }

    public function addStaffData(Request $request){

        $obj = json_decode($request->res);
        $bio_data = $obj->biodata;
        $family_data2 = $obj->familyData;
        $employee_data = $obj->employeeData;
        $educational_data = $obj->educationalTraining;
        $referee_data = $obj->refereeData;
        $beneficiary_data = $obj->beneficiaryData;
        $emergency_name = $obj->emergency_name;
        $emergency_address = $obj->emergency_address;
        $emergency_number = $obj->emergency_number;
        
        //bio data
        $my_data = new BioData;
        $my_data->surname = $bio_data->sur_name;
        $my_data->other_names = $bio_data->other_name;
        $my_data->previous_names = $bio_data->previous_name;
        $my_data->date_of_birth = $bio_data->date_of_birth;
        $my_data->nationality = $bio_data->nationality;
        $my_data->home_town = $bio_data->hometown;
        $my_data->region = $bio_data->region;
        $my_data->gender = $bio_data->gender;
        $my_data->house_number = $bio_data->house_number;
        $my_data->city_town = $bio_data->city_town;
        $my_data->digital_address = $bio_data->digital_address;
        $my_data->street_name = $bio_data->street_name;
        $my_data->nearest_landmark = $bio_data->nearest_landmark;
        $my_data->post_address = $bio_data->postal_address;
        $my_data->email_address = $bio_data->email_address;
        $my_data->telephone = $bio_data->telephone_no;
        $my_data->social_security_number = $bio_data->ssn;
        $my_data->bank = $bio_data->bank;
        $my_data->branch_name = $bio_data->branch_name;
        $my_data->account_name = $bio_data->account_number;
        $my_data->languages_spoken = $bio_data->languages;
        $my_data->physical_disability = $bio_data->physical_disability;
        $my_data->save();
  
        $insert_id = $my_data->id;
        
        $children = $family_data2->children;

        //emergency data
        $emergency_data = new Emergency;
        $emergency_data->bio_data_id = $insert_id;
        $emergency_data->name = $emergency_name;
        $emergency_data->address = $emergency_address;
        $emergency_data->telephone_number = $emergency_number;
        $emergency_data->save();

        //family data
        $family_data = new FamilyData;
        $family_data->bio_data_id = $insert_id;
        $family_data->marital_status = $family_data2->marital_status;
        $family_data->spouse_name = $family_data2->spouse_name;
        $family_data->spouse_occupation = $family_data2->spouse_occupation;
        $family_data->father_name = $family_data2->father_name;
        $family_data->father_is_deceased = $family_data2->father_deceased;
        $family_data->mother_name = $family_data2->mother_name;
        $family_data->mother_is_deceased = $family_data2->mother_deceased;
        $family_data->number_of_children = sizeof($children);
        $family_data->save();
        $family_insert_id = $family_data->id;

        //children data
        foreach($children as $child){
            $child_data = new Child;
            $child_data->family_data_id = $family_insert_id;
            $child_data->name = $child->name;
            $child_data->date_of_birth = $child->date_of_birth;
            $child_data->save();
        }

        //employment data
        $employee_data2 = new EmploymentRecord;
        $employee_data2->bio_data_id = $insert_id;
        $employee_data2->number_of_previous_work_place = sizeof($employee_data->job_lists);
        $employee_data2->present_job_title = $employee_data->present_job_title;
        $employee_data2->date_of_employment = $employee_data->date_of_employment;
        $employee_data2->probation_period = $employee_data->probation_period;
        $employee_data2->immediate_supervisor = $employee_data->supervisor;
        $employee_data2->employment_status = $employee_data->employment_status;
        $employee_data2->career_objects = $employee_data->career_objectives;
        $employee_data2->save();
        $employee_data2_id = $employee_data2->id;

        $previous_jobs = $employee_data->job_lists;
       // echo sizeof($previous_jobs);
        foreach($previous_jobs as $previous_job){
            $job = new PreviousWorkPlace;
            $job->employment_records_id = $employee_data2_id;
            $job->company_instituition = $previous_job->institution;
            $job->job_title =  $previous_job->job;
            $job->date = $previous_job->date;
            $job->save();
        }

        //educational training
        $educational_data2 = new EducationTraining;
        $educational_data2->bio_data_id = $insert_id;
        $educational_data2->number_of_academic_qualifications = sizeof($educational_data->academic);
        $educational_data2->number_of_professional_training = sizeof($educational_data->training);
        $educational_data2->hobbies_special_interes = $educational_data->hobbies;
        $educational_data2->save();
        $educational_data_id = $educational_data2->id;

        //professional training
        $professional_trainings = $educational_data->training;
        foreach($professional_trainings as $professional_training){
            $training = new ProfessionalTrainning;
            $training->education_trainings_id = $educational_data_id;
            $training->instituition = $professional_training->instituition;
            $training->year = $professional_training->year;
            $training->course = $professional_training->course;
            $training->location = $professional_training->year;
            $training->save();
        }

        //academic qualification
        $academic_qualications = $educational_data->academic;
        foreach($academic_qualications as $academic_qualication){
            $academic = new AcademicQualification;
            $academic->education_trainings_id = $educational_data_id;
            $academic->year = $academic_qualication->year;
            $academic->institution = $academic_qualication->institution;
            $academic->qualification = $academic_qualication->qualification;
            $academic->save();
        }
        
        //referee data
        foreach($referee_data as $referee){
            $referee_data = new Referees;
            $referee_data->bio_data_id = $insert_id;
            $referee_data->name = $referee->name;
            $referee_data->occupation = $referee->occupation;
            $referee_data->address = $referee->address;
            $referee_data->save();
        }

        //beneficiary data
        foreach($beneficiary_data as $beneficiary_info){
            $beneficiary = new Beneficiary;
            $beneficiary->bio_data_id = $insert_id;
            $beneficiary->name = $beneficiary_info->name;
            $beneficiary->address_telephone_number = $beneficiary_info->address;
            $beneficiary->relationship = $beneficiary_info->relationship;
            $beneficiary->percentage_of_benefit = $beneficiary_info->percentage;
            $beneficiary->save();
        }

        $leave = new Leave;
        $leave->bio_data_id = $insert_id;
        $leave->number_of_days = 0;
        $leave->days_gone = 0;
        $leave->days_left = 0;
        $leave->save();

        echo "Success";

        
    }

    public function registeredStaff(){
       
        $staff = BioData::with(['children',
         'education_training'=> function($query){
            $query->with(['academic_qualifications','trainings']);
          },
          'referees','beneficiary',
          'employee_data' => function($query){
            $query->with('previous_jobs');
          },'emergency'
        ])->paginate(5);
        
        return view('registered_staff', [
            "staff" => $staff,
            // "categories" => $categories
        ]);
        // return $staff;
    }

    public function pensionStaff(){
       // return view('pension');
       $pension_list = [];
       $fast_approching_pension = [];
       $medium_approaching_pension = [];
       $low_approaching_pension = [];
       $bio_data = BioData::all();
       $today = date("Y-m-d");
       foreach($bio_data as $data){

          $dob = $data->date_of_birth;
          $diff = abs(strtotime($today)-strtotime($dob));
          $years = floor($diff / (365*60*60*24));
          
        
          $obj= new \stdClass();
          $obj->name = "".$data->other_names." ".$data->surname;
          $obj->years = $years;

          if($years > 60){
            array_push($pension_list,$obj);
          }
          else if($years >= 45 && $years < 60){
             array_push($fast_approching_pension,$obj);
          }
          else if($years >=35 && $years < 45){
            array_push($medium_approaching_pension,$obj);
          }
          else if($years < 35){
            array_push($low_approaching_pension,$obj);
          }

          
          

       }

      
      
     
       return view('pension',[
         "pension" => $pension_list,
         "fast" => $fast_approching_pension,
         "medium" => $medium_approaching_pension,
         "low" => $low_approaching_pension
        ]
       );
       
       
       
    }

    public function deleteChild(Request $request){
      $id = $request->id;
      Child::where('id',$id)->delete();
      echo "Successfully deleted child";
    }

    public function addChild(Request $request){
       $family_id = $request->bio_data_id;
       $name = $request->name;
       $dob = $request->dob;

       $child = new Child;
       $child->family_data_id =  $family_id;
       $child->name = $name;
       $child->date_of_birth = $dob;
       $child->save();

       echo "Success";
    }

    public function addNewTraining(Request $request){
      $bio_data_id = $request->bio_data_id;
      $course = $request->course;
      $institute = $request->institute;
      $location = $request->location;
      $year = $request->year;

      $training = new ProfessionalTrainning;
      $training->education_trainings_id = $bio_data_id;
      $training->instituition = $institute;
      $training->year = $year;
      $training->course = $course;
      $training->location = $location;
      $training->save();
      
      echo "Success";

    }

    public function deleteBeneficiary(Request $request){
        $id = $request->id;
        Beneficiary::where('id',$id)->delete();
        echo "Successfully deleted beneficiary";
    }

    public function addBeneficiary(Request $request){
      $bio_data_id = $request->bio_data_id;
      $address = $request->address;
      $name  = $request->name;
      $relationship = $request->relationship;
      $percentage = $request->percentage;

      $beneficiary = new Beneficiary;
      $beneficiary->bio_data_id = $bio_data_id;
      $beneficiary->name = $name;
      $beneficiary->address_telephone_number = $address;
      $beneficiary->relationship = $relationship;
      $beneficiary->percentage_of_benefit = $percentage;
      $beneficiary->save();

      echo "Successfully added beneficiary";
    }

    public function updateBiodata(Request $request){
   
      $bio_data_id = $request->bio_data_id;
      $surname = $request->surname;
      $other_name = $request->other_name;
      $previous_name = $request->previous_name;
      $date_of_birth = $request->date_of_birth;
      $nationality = $request->nationality;
      $home_town = $request->home_town;
      $region = $request->region;
      $gender = $request->gender;
      $house_number = $request->house_number;
      $city_town = $request->city_town;
      $digital_address = $request->digital_address;
      $street_name = $request->street_name;
      $nearest_landmark = $request->nearest_landmark;
      $postal_address = $request->postal_address;
      $email_address = $request->email_address;
      $telephone = $request->telephone;
      $ssn = $request->ssn;
      $bank = $request->bank;
      $bank_branch = $request->bank_branch;
      $account_number = $request->account_number;
      $languages = $request->languages;

        BioData::where('id',$bio_data_id)
        ->update([
            'surname'=> $surname,
            'other_names' => $other_name,
            'previous_names' => $previous_name,
            'date_of_birth' => $date_of_birth,
            'nationality' => $nationality,
            'home_town' => $home_town,
            'region' => $region,
            'gender' => $gender,
            'house_number' => $house_number,
            'city_town' => $city_town,
            'digital_address' => $digital_address,
            'street_name' => $street_name,
            'nearest_landmark' => $nearest_landmark,
            'post_address' => $postal_address,
            'email_address' => $email_address,
            'telephone' => $telephone,
            'social_security_number' => $ssn,
            'bank' => $bank,
            'branch_name' => $bank_branch,
            'account_name' => $account_number,
            'languages_spoken' => $languages
        ]);

        echo "Successfully updated Biodata";


    }

    public function getLeave(){
        $leave = BioData::with('leave')->get();

        return view('staff_leave', [
            "leave" => $leave,
            // "categories" => $categories
        ]);
    }

    function updateLeaveDays(Request $request){
       $leave_id = $request->id;
       $leave_days = $request->days;
       
       $check_leave = Leave::where('id',$leave_id)->first();
       $days_gone = $check_leave->days_gone;
       $days_left = $leave_days - $days_gone;

       Leave::where('id',$leave_id)->update(
        [
            "number_of_days" => $leave_days,
            "days_left" => $days_left

        ]
       );

       echo "Successfully updated leave";
    }

    public function addLeave(){
        $leave_info = LeaveInfo::with('biodata')->get();
        $results = [];
        
        foreach($leave_info as $leave){
          
            $now = time(); // or your date as well
            $leave_date = strtotime($leave->date);
            $datediff = $now - $leave_date;
            
            $days_diff = round($datediff / (60 * 60 * 24));

           

            if($days_diff > -1){
                
                $days_left = $leave->days - $days_diff;

                $obj= new \stdClass();
                $obj->name = $leave->biodata->surname." ".$leave->biodata->other_names;
                $obj->date = $leave->date;
                $obj->days = $leave->days;
                $obj->difference = $days_diff;
                $obj->days_left = $days_left;

                array_push($results,$obj);
            }
        }

        return view('apply_leave',[
            "staff" => BioData::with('leave')->get(),
            "status" => $results
        ]);
    }

    public function applyForLeave(Request $request){
       $id = $request->bio_data_id;
       $description = $request->description;
       $date = $request->date;
       $days = $request->days;

       $leave = Leave::where('bio_data_id',$id)->first();
       $days_gone = $leave->days_gone;
       $days_left = $leave->days_left;

       $new_days_gone = $days_gone + $days;
       $new_days_left = $days_left - $days;

       $leave_info = new LeaveInfo;
       $leave_info->bio_data_id = $id;
       $leave_info->description = $description;
       $leave_info->days = $days;
       $leave_info->date = $date;
       $leave_info->save();

       Leave::where('bio_data_id',$id)->update(
        [
            "days_gone" => $new_days_gone,
            "days_left" => $new_days_left 

        ]
       );

       echo "Leave application successful";
       //$leave_info = new ;;

    }

    public function updateBeneficiary(Request $request){
       $id = $request->id;
       $percentage = $request->percent;
      
       DB::table('beneficiaries')->where('id',$id)->update(
        [
          'percentage_of_benefit' => $percentage
        ]
       );

       echo "Successfully updated beneficiary percentage";
    }

    public function getDashboardValues(){
       $staff = BioData::all();
       $today = date("Y-m-d");
       $pension_count = 0;
       $fast_approaching = 0;
       $medium_approaching = 0;
       $low_approaching = 0;
       $staff_on_leave = 0;

       foreach($staff as $data){

            $dob = $data->date_of_birth;
            $diff = abs(strtotime($today)-strtotime($dob));
            $years = floor($diff / (365*60*60*24));

            if($years > 60){
                $pension_count = $pension_count + 1;
            }
            else if($years >= 45 && $years < 60){
                $fast_approaching = $fast_approaching + 1;
            } 
            else if($years >=35 && $years < 45){
                $medium_approaching = $medium_approaching + 1;
            }
            else if($years < 35){
                $low_approaching = $low_approaching + 1;
            }
       
        }

        $leave = LeaveInfo::all();
        foreach($leave as $info){
           
            $date=date_create($info->date);
            date_add($date,date_interval_create_from_date_string($info->days." days"));
            $leave_date = date_format($date,"Y-m-d");
            
            $startDate = strtotime(date('Y-m-d', strtotime($leave_date) ) );
            $currentDate = strtotime(date('Y-m-d'));
           
            if($startDate <=  $currentDate) {
               // echo 'date is in the past';
               $staff_on_leave = $staff_on_leave + 1;
            }
        }

        return view('dashboard', [
            "staff_count" => $staff->count(),
            "pension_count" => $pension_count,
            "fast_approaching" =>  $fast_approaching,
            "medium_approaching" => $medium_approaching,
            "low_approaching" => $low_approaching,
            "leave" => $staff_on_leave
        ]);

    }


}
