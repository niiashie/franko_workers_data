<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\LeaveInfo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
// Route::get('/dashboard', function () {
    
//     return view('dashboard');
// });
Route::get('/base', function () {
    return view('base');
});
Route::get('/addStaff', function () {
    return view('add_staff');
});
Route::get('/test',function (){
    $leave = LeaveInfo::all();
    foreach($leave as $info){
        // $startDate = strtotime(date('Y-m-d', strtotime('2021-11-15') ) );
        // $currentDate = strtotime(date('Y-m-d'));
       
        // if($startDate < $currentDate) {
        //     echo 'date is in the past';
        // }
        // $date=date_create($info->date);
        // date_add($date,date_interval_create_from_date_string($info->days." days"));
        // //echo date_format($date,"Y-m-d");
        // $close_date = date_format($date,"Y-m-d");
        // echo $close_date;

        $date=date_create($info->date);
        date_add($date,date_interval_create_from_date_string($info->days." days"));
        $leave_date = date_format($date,"Y-m-d");
        
        $startDate = strtotime(date('Y-m-d', strtotime($leave_date) ) );
        $currentDate = strtotime(date('Y-m-d'));
       
        if($startDate < $currentDate) {
            echo 'date is in the past';
        }
        else{
            echo 'date is in the future'; 
        }
    }
});


Route::get('/addStaffData',[Controller::class,'addStaffData'])->name('addStaffData');
Route::get('/getStaffData',[Controller::class,'registeredStaff']);
Route::get('/pension',[Controller::class,'pensionStaff']);
Route::get('/deleteChild',[Controller::class,'deleteChild']);
Route::get('/deleteBeneficiary',[Controller::class,'deleteBeneficiary']);
Route::get('/addBeneficiary',[Controller::class,'addBeneficiary']);
Route::get('/updateBioData',[Controller::class,'updateBiodata']);
Route::get('/addChild',[Controller::class,'addChild']);
Route::get('/staffLeave',[Controller::class,'getLeave']);
Route::get('/updateLeave',[Controller::class,'updateLeaveDays']);
Route::get('/applyLeave',[Controller::class,'addLeave']);
Route::get('/updateBeneficiary',[Controller::class,'updateBeneficiary']);
Route::get('/addTraining',[Controller::class,'addNewTraining']);
Route::post('/loginData',[Controller::class,'loginData'])->name('loginData');
Route::post('/register',[Controller::class,'register'])->name('register');
Route::get('/processLeave',[Controller::class,'applyForLeave']);
Route::get('/dashboard',[Controller::class,'getDashboardValues']);




