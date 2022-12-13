
@extends('base')

@section('pageJs')
 
  <script>
      var data = {};
      var active_bio_data = {};
      var active_beneficiary = [];
      var active_children = [];
      var active_education_training = {};
      var active_emergency = {};
      var active_employee_data = {};
      var active_referee = [];
      var active_bio_data_id = "";
      var current_total_beneficiary_percent = 0;

      document.addEventListener("DOMContentLoaded", () => {
      //alert("It works");
      var selection = document.getElementById('registeredStaff');
      selection.classList.remove('bg-gray-100');
      selection.classList.add('bg-red-400');

      document.getElementById('registeredStaffText').classList.remove('text-gray-500');
      document.getElementById('registeredStaffText').classList.add('text-white');

      document.getElementById('registeredStaffLogo').classList.remove('text-gray-500');
      document.getElementById('registeredStaffLogo').classList.add('text-white');

      //var source = document.getElementById('children_number');
       
    });

    function closeStaffDetail(){
      document.getElementById('staff_list_con').classList.remove('hidden');
      document.getElementById('staff_detail_con').classList.add('hidden');
    }

    function updateBiodata(){

      var surname =  document.getElementById('surname').value;
      var other_name =  document.getElementById('other_name').value ;
      var previous_name = document.getElementById('previous_name').value;
      var date_of_birth =  document.getElementById('date_of_birth').value;
      var nationality = document.getElementById('nationality').value;
      var home_town = document.getElementById('home_town').value ;
      var region =  document.getElementById('region').value;
      var gender =  document.getElementById('gender').value;
      var house_number = document.getElementById('house_number').value;
      var city_town = document.getElementById('city_town').value;
      var digital_address = document.getElementById('digital_address').value;
      var street_name =  document.getElementById('street_name').value;
      var nearest_landmark = document.getElementById('nearest_landmark').value;
      var postal_address = document.getElementById('postal_address').value;
      var email_address = document.getElementById('email_address').value;
      var telephone =  document.getElementById('telephone').value;
      var ssn =  document.getElementById('ssn').value;
      var bank =  document.getElementById('bank').value;
      var branch_name =  document.getElementById('bank_branch').value;
      var account_number = document.getElementById('account_number').value;
      var languages = document.getElementById('languages').value;
     
      if(surname.length == 0){
        showError('Error',"Surname required please");
      }
      else if(other_name.length == 0){
        showError('Error',"Other names required please");
      }
      else if(date_of_birth.length == 0){
        showError('Error',"Date of birth required please");
      }
      else if(nationality.length == 0){
        showError('Error',"Nationality required please");
      }
      else if(home_town.length == 0){
        showError('Error',"Home town required please");
      }
      else if(region.length == 0){
        showError('Error',"Region required please");
      }
      else if(gender.length == 0){
        showError('Error','Gender required please');
      }
      else if(ssn.length == 0){
        showError('Error','Social security number required please');
      }
      else if(bank.length == 0){
        showError('Error','Name of savings bank required please');
      }
      else if(branch_name.length == 0){
        showError('Error','Bank branch name required please');
      }
      else if(account_number.length == 0){
        showError('Error','Bank account number required please');
      }
      else if(languages.length == 0){
        showError('Error','Languages spoken required please');
      }
      else{
        Swal.fire({
          title: 'Update Biodata',
          text: "Are you sure you want to update bio data?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                /*
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
                */      
                var inventoryRequest  = $.ajax({
                    url:"/updateBioData",
                    method: "GET",
                    data: {
                        "bio_data_id" : active_bio_data_id,
                        "surname" : surname,
                        "other_name" : other_name,
                        "previous_name" : previous_name,
                        "date_of_birth" : date_of_birth,
                        "nationality" : nationality,
                        "home_town" : home_town,
                        "region" : region,
                        "gender" : gender,
                        "house_number" : house_number,
                        "city_town" : city_town,
                        "digital_address" : digital_address,
                        "street_name" : street_name,
                        "nearest_landmark" : nearest_landmark,
                        "postal_address" : postal_address,
                        "email_address" : email_address,
                        "telephone" : telephone,
                        "ssn" :ssn,
                        "bank" : bank,
                        "bank_branch" : branch_name,
                        "account_number" : account_number,
                        "languages" : languages,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                  
                    if(response == 'Successfully updated Biodata'){
                        Swal.fire({
                            title: 'Successfully updated Biodata',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.value) {
                              location.reload();                
                            }                       
                        });
                    }
                });

                inventoryRequest.fail(function (){
                    // Show error
                    showError("Failure","Please ensure server is active");
                });


            }

          });
      }

    }

    function reset(){
      document.getElementById('bio_data_con').classList.add('hidden');
      document.getElementById('children_con').classList.add('hidden');
      document.getElementById('education_training_con').classList.add('hidden');
      document.getElementById('referee_con').classList.add('hidden');
      document.getElementById('beneficiary_con').classList.add('hidden');
      document.getElementById('job_detail_con').classList.add('hidden');
      document.getElementById('emergency_con').classList.add('hidden');

      document.getElementById('bio_dat_title').classList.add('bg-gray-400');
      document.getElementById('children_title').classList.add('bg-gray-400');
      document.getElementById('education_training_title').classList.add('bg-gray-400');
      document.getElementById('referee_title').classList.add('bg-gray-400');
      document.getElementById('beneficiary_title').classList.add('bg-gray-400');
      document.getElementById('job_detail_title').classList.add('bg-gray-400');
      document.getElementById('emergency_title').classList.add('bg-gray-400');
    }

    function showBioData(){
      reset();
      document.getElementById('bio_dat_title').classList.remove('bg-gray-400');
      document.getElementById('bio_dat_title').classList.add('bg-red-400');
      document.getElementById('bio_data_con').classList.remove('hidden');

      document.getElementById('surname').value = active_bio_data['surname'];
      document.getElementById('other_name').value = active_bio_data['other_names'];
      document.getElementById('previous_name').value = active_bio_data['previous_names'];
      document.getElementById('date_of_birth').value = active_bio_data['date_of_birth'];
      document.getElementById('nationality').value = active_bio_data['nationality'];
      document.getElementById('home_town').value = active_bio_data['home_town'];
      document.getElementById('region').value = active_bio_data['region'];
      document.getElementById('gender').value = active_bio_data['gender'];
      document.getElementById('house_number').value = active_bio_data['house_number'];
      document.getElementById('city_town').value = active_bio_data['city_town'];
      document.getElementById('digital_address').value = active_bio_data['digital_address'];
      document.getElementById('street_name').value = active_bio_data['street_name'];
      document.getElementById('nearest_landmark').value = active_bio_data['nearest_landmark'];
      document.getElementById('postal_address').value = active_bio_data['postal_address'];
      document.getElementById('email_address').value = active_bio_data['email_address'];
      document.getElementById('telephone').value = active_bio_data['telephone'];
      document.getElementById('ssn').value = active_bio_data['ssn'];
      document.getElementById('bank').value = active_bio_data['bank'];
      document.getElementById('bank_branch').value = active_bio_data['branch_name'];
      document.getElementById('account_number').value = active_bio_data['account_number'];
      document.getElementById('languages').value = active_bio_data['languages_spoken'];



    }

    function showChildren(){
      reset();
      document.getElementById('children_title').classList.remove('bg-gray-400');
      document.getElementById('children_title').classList.add('bg-red-400');
      document.getElementById('children_con').classList.remove('hidden');
      
      var jobsCon = document.getElementById('children_list');

      var child = jobsCon.lastElementChild; 
      while (child) {
        jobsCon.removeChild(child);
        child = jobsCon.lastElementChild;
      }

     

      for(var i=0;i<active_children.length;i++){
        var id = active_children[i]['id'];
        var name = active_children[i]['name'];
        var dob = active_children[i]['date_of_birth'];
        
        addChildren(id,name,dob);
      }
    }

    function showEducationTraining(){
      reset();
      document.getElementById('education_training_title').classList.remove('bg-gray-400');
      document.getElementById('education_training_title').classList.add('bg-red-400');
      document.getElementById('education_training_con').classList.remove('hidden');

      var jobsCon = document.getElementById('education_list');

      var child = jobsCon.lastElementChild; 
      while (child) {
        jobsCon.removeChild(child);
        child = jobsCon.lastElementChild;
      }

      var jobsCon2 = document.getElementById('training_list');

      var child2 = jobsCon2.lastElementChild; 
      while (child2) {
        jobsCon2.removeChild(child2);
        child2 = jobsCon2.lastElementChild;
      }

      var education_data = active_education_training['academic_qualifications'];
      var trainig_data = active_education_training['training'];
      for(var i=0;i<education_data.length;i++){
        var inst = education_data[i]['institution'];
        var qualifi = education_data[i]['qualification'];
        var year = education_data[i]['year'];

        addEducation(inst,qualifi,year);
      }

      for(var j=0;j<trainig_data.length;j++){
        var year2 = trainig_data[j]['year'];
        var course = trainig_data[j]['course'];
        var instituition = trainig_data[j]['instituition'];
        var location = trainig_data[j]['location'];
        
        addTraining(instituition,course,year2,location);
      }

      document.getElementById('hobby').innerHTML = active_education_training['hobby'];
    }

    function showReferee(){
      reset();
      document.getElementById('referee_title').classList.remove('bg-gray-400');
      document.getElementById('referee_title').classList.add('bg-red-400');
      document.getElementById('referee_con').classList.remove('hidden');
      
      var jobsCon = document.getElementById('referee_list');

      var child = jobsCon.lastElementChild; 
      while (child) {
        jobsCon.removeChild(child);
        child = jobsCon.lastElementChild;
      }

      //addReferee(address,name,occupation)
      for(var i=0;i<active_referee.length;i++){
        var address = active_referee[i]['address'];
        var name = active_referee[i]['name'];
        var occupation = active_referee[i]['occupation'];

        addReferee(address,name,occupation);
      }
    }

    function showBeneficiary(){
      reset();
      document.getElementById('beneficiary_title').classList.remove('bg-gray-400');
      document.getElementById('beneficiary_title').classList.add('bg-red-400');
      document.getElementById('beneficiary_con').classList.remove('hidden');

      var jobsCon = document.getElementById('beneficiary_list');

      var child = jobsCon.lastElementChild; 
      while (child) {
        jobsCon.removeChild(child);
        child = jobsCon.lastElementChild;
      }

      current_total_beneficiary_percent = 0

      for(var i=0;i<active_beneficiary.length;i++){
        var address = active_beneficiary[i]['address_telephone_number'];
        var name = active_beneficiary[i]['name'];
        var relationship = active_beneficiary[i]['relationship'];
        var percentage = active_beneficiary[i]['percentage_of_benefit'];
        var id = active_beneficiary[i]['id'];
        current_total_beneficiary_percent = current_total_beneficiary_percent + parseInt(active_beneficiary[i]['percentage_of_benefit']);

        addBeneficiary(address,name,percentage,relationship,i,id);
      }

      document.getElementById('current_percentage_value').innerHTML = ""+current_total_beneficiary_percent+" %";
    }

    function showJobDetail(){
      reset();
      document.getElementById('job_detail_title').classList.remove('bg-gray-400');
      document.getElementById('job_detail_title').classList.add('bg-red-400');
      document.getElementById('job_detail_con').classList.remove('hidden');

      //career_objectives
      document.getElementById('career_objectives').innerHTML = active_employee_data['career_objects'];
      document.getElementById('job_title').innerHTML = active_employee_data['present_job_title'];
      document.getElementById('date_of_employment').innerHTML = active_employee_data['date_of_employment'];
      document.getElementById('employment_status').innerHTML =  active_employee_data['employment_status'];
      
      var jobsCon = document.getElementById('previous_job_list');

      var child = jobsCon.lastElementChild; 
      while (child) {
        jobsCon.removeChild(child);
        child = jobsCon.lastElementChild;
      }

      var previous_jobs = active_employee_data['previous_jobs'];

      for(var i=0;i<previous_jobs.length;i++){
        var insti = previous_jobs[i]['company_instituition'];
        var date = previous_jobs[i]['date'];
        var title = previous_jobs[i]['job_title'];
        addPreviousJobs(insti,date,title);
      }
    }

    function showEmergency(){
      reset();
      document.getElementById('emergency_title').classList.remove('bg-gray-400');
      document.getElementById('emergency_title').classList.add('bg-red-400');
      document.getElementById('emergency_con').classList.remove('hidden');

      document.getElementById('emregency_name').innerHTML = ""+active_emergency['name']+" ("+active_emergency['telephone_number']+')';
      document.getElementById('emergency_address').innerHTML = active_emergency['address'];
    }

    function addChildren(id,name,dob){
      

      var card = document.createElement('div');
      card.style.height = "60px";
      card.classList.add('w-full','bg-white','rounded-md','drop-shadow-md','mt-2','flex','flex-row','place-items-center','px-2');
      
      //Avatar
      var avatar_con = document.createElement('div');
      avatar_con.style.height = "40px";
      avatar_con.style.width = "40px";
      avatar_con.classList.add('bg-gray-300','rounded-full','flex');
      avatar_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>';
      
      var child_details_con = document.createElement('div');
      child_details_con.style.height = "50px";
      child_details_con.classList.add('flex-grow','flex','flex-col','ml-4','place-content-center');
      
      //child name
      var c_name = document.createElement('label');
      c_name.classList.add('text-gray-500');
      c_name.innerHTML = name;
      child_details_con.appendChild(c_name);

      //child dob
      var c_dob = document.createElement('label');
      c_dob.classList.add('text-gray-300','text-sm');
      c_dob.innerHTML = "Birth Day:  "+ dob;
      child_details_con.appendChild(c_dob);

      //delete con
      var delete_con = document.createElement('div');
      delete_con.style.height = "50px";
      delete_con.style.width = "50px";
      delete_con.onclick = function(){
        deleteChildClicked(id);
      }
      delete_con.classList.add('flex');
      delete_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-400 mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>'



      card.appendChild(avatar_con);
      card.appendChild(child_details_con);
      card.appendChild(delete_con);

      document.getElementById('children_list').appendChild(card);
    }

    function deleteChildClicked(id){
      Swal.fire({
          title: 'Delete Child',
          text: "Are you sure you want to delete child?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest  = $.ajax({
                    url:"/deleteChild",
                    method: "GET",
                    data: {
                        "id" : id,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                  
                    if(response == 'Successfully deleted child'){
                        Swal.fire({
                            title: 'Successfully deleted child',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.value) {
                              location.reload();                
                            }                       
                        });
                    }
                });

                inventoryRequest.fail(function (){
                    // Show error
                    showError("Failure","Please ensure server is active");
                });


            }

          });
     // alert("Clicked delete: "+id);
    }

    function showAddChild(){
      document.getElementById('children_list').classList.add('hidden');
      document.getElementById('add_child_btn_con').classList.add('hidden');
      document.getElementById('add_child').classList.remove('hidden');

    }

    function closeAddChild(){
      document.getElementById('children_list').classList.remove('hidden');
      document.getElementById('add_child_btn_con').classList.remove('hidden');
      document.getElementById('add_child').classList.add('hidden');
    }
    
    function getStaffDetails(id){
      active_bio_data_id = id;
      var data_payload = data[id];
      active_bio_data = data_payload['biodata'];
      active_beneficiary = data_payload['beneficiary_list'];
      active_children = data_payload['children'];
      active_education_training = data_payload['education_training'];
      active_emergency = data_payload['emergency'];
      active_employee_data = data_payload['employee_data'];
      active_referee = data_payload['referee_list'];
      console.log(data_payload);
      
      document.getElementById('staff_list_con').classList.add('hidden');
      document.getElementById('staff_detail_con').classList.remove('hidden');
      showBioData();
    }

    function addNewChild(){
      var name = document.getElementById('add_child_name').value;
      var dob = document.getElementById('add_child_date_of_birth').value;
      
      if(name.length == 0){
        showError("Error","Child name required please");
      }
      else if(dob.length == 0){
        showError("Error","Child date of birth required please");
      }
      else{
        Swal.fire({
          title: 'Add Child',
          text: "Are you sure you want to add child?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest  = $.ajax({
                    url:"/addChild",
                    method: "GET",
                    data: {
                        "bio_data_id" : active_bio_data_id,
                        "name" : name,
                        "dob" : dob,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                  
                    if(response == 'Success'){
                        Swal.fire({
                            title: 'Successfully added child',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.value) {
                              location.reload();                
                            }                       
                        });
                    }
                });

                inventoryRequest.fail(function (){
                    // Show error
                    showError("Failure","Please ensure server is active");
                });


            }

          });
      }
    }

    function addEducation(institute,qualification,year){
      var card = document.createElement('div');
      card.style.height = "100px";
      card.classList.add('w-full','bg-white','rounded-md','drop-shadow-md','mt-2','flex','flex-row','place-items-center','px-2');
      
       //Avatar
      var avatar_con = document.createElement('div');
      avatar_con.style.height = "50px";
      avatar_con.style.width = "50px";
      avatar_con.classList.add('bg-gray-300','rounded-full','flex');
      avatar_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>'; //'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>';
      
      var child_details_con = document.createElement('div');
      child_details_con.style.height = "70px";
      child_details_con.classList.add('flex-grow','flex','flex-col','ml-4','place-content-center');
      
       
      //qualification
      var e_qualification = document.createElement('label');
      e_qualification.classList.add('text-gray-500','text-lg');
      e_qualification.innerHTML = qualification;
      child_details_con.appendChild(e_qualification);

      //institute
      var e_institute = document.createElement('label');
      e_institute.classList.add('text-gray-400');
      e_institute.innerHTML = institute;
      child_details_con.appendChild(e_institute);

      //Year
      var e_year = document.createElement('label');
      e_year.classList.add('text-gray-400');
      e_year.innerHTML = year;
      child_details_con.appendChild(e_year);

      card.appendChild(avatar_con);
      card.appendChild(child_details_con);

      document.getElementById('education_list').appendChild(card);

    }

    function addTraining(institute,course,year,location){
      var card = document.createElement('div');
      card.style.height = "100px";
      card.classList.add('w-full','bg-white','rounded-md','drop-shadow-md','mt-2','flex','flex-row','place-items-center','px-2');
      
       //Avatar
      var avatar_con = document.createElement('div');
      avatar_con.style.height = "50px";
      avatar_con.style.width = "50px";
      avatar_con.classList.add('bg-gray-300','rounded-full','flex');
      avatar_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>'; //'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>';
      
      var child_details_con = document.createElement('div');
      child_details_con.style.height = "70px";
      child_details_con.classList.add('flex-grow','flex','flex-col','ml-4','place-content-center');
      
       
      //qualification
      var e_qualification = document.createElement('label');
      e_qualification.classList.add('text-gray-500','text-lg');
      e_qualification.innerHTML = course;
      child_details_con.appendChild(e_qualification);

      //institute
      var e_institute = document.createElement('label');
      e_institute.classList.add('text-gray-400');
      e_institute.innerHTML = institute;
      child_details_con.appendChild(e_institute);

      //Year
      var e_year = document.createElement('label');
      e_year.classList.add('text-gray-400');
      e_year.innerHTML = location+" ("+year+")";
      child_details_con.appendChild(e_year);

      card.appendChild(avatar_con);
      card.appendChild(child_details_con);

      document.getElementById('training_list').appendChild(card);
    }

    function showError(title,message){
        Swal.fire({
            icon: 'error',
            title: title,
            text: message,              
        }); 
    }

    function closeAddTraining(){
      document.getElementById('education_display').classList.remove('hidden');
      document.getElementById('add_training').classList.add('hidden');
      document.getElementById('add_education_btn_con').classList.remove('hidden');
    }
    
    function showAddTraining(){
      document.getElementById('education_display').classList.add('hidden');
      document.getElementById('add_training').classList.remove('hidden');
      document.getElementById('add_education_btn_con').classList.add('hidden');
    }

    function addNewProfessionalTraining(){
      var course = document.getElementById('add_training_course').value;
      var institute = document.getElementById('add_training_institution').value;
      var location = document.getElementById('add_training_location').value;
      var year = document.getElementById('add_training_year').value;

      if(course.length == 0){
        showError("Error","Course pursued required");
      }
      else if(institute.length == 0){
        showError("Error","Institution name required");
      }
      else if(location.length == 0){
        showError("Error","Location required");
      }
      else if(year.length == 0){
        showError("Error","Year of training required");
      }
      else{
        Swal.fire({
          title: 'Add Professional Training Course',
          text: "Are you sure you want to add training course ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest2  = $.ajax({
                    url:"/addTraining",
                    method: "GET",
                    data: {
                        "bio_data_id" : active_bio_data_id,
                        "course" : course,
                        "institute" : institute,
                        "location" : location,
                        "year" : year,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest2.done(function (response, textStatus, jqXHR){
                  
                    if(response == 'Success'){
                        Swal.fire({
                            title: 'Successfully added professional training',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.value) {
                              window.location.reload();        
                            }                       
                        });
                    }
                });

                inventoryRequest2.fail(function (){
                    // Show error
                    showError("Failure","Please ensure server is active");
                });


            }

          });
      }
    }

    function addReferee(address,name,occupation){
      var card = document.createElement('div');
      card.style.height = "100px";
      card.classList.add('w-full','bg-white','rounded-md','drop-shadow-md','mt-2','flex','flex-row','place-items-center','px-2');
      
       //Avatar
      var avatar_con = document.createElement('div');
      avatar_con.style.height = "50px";
      avatar_con.style.width = "50px";
      avatar_con.classList.add('bg-gray-300','rounded-full','flex');
      avatar_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>'; //'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>';
      
      var child_details_con = document.createElement('div');
      child_details_con.style.height = "70px";
      child_details_con.classList.add('flex-grow','flex','flex-col','ml-4','place-content-center');
      
       
      //qualification
      var e_qualification = document.createElement('label');
      e_qualification.classList.add('text-gray-500','text-lg');
      e_qualification.innerHTML = name;
      child_details_con.appendChild(e_qualification);

      //institute
      var e_institute = document.createElement('label');
      e_institute.classList.add('text-gray-400');
      e_institute.innerHTML = occupation;
      child_details_con.appendChild(e_institute);

      //Year
      var e_year = document.createElement('label');
      e_year.classList.add('text-gray-400');
      e_year.innerHTML = address;
      child_details_con.appendChild(e_year);

      card.appendChild(avatar_con);
      card.appendChild(child_details_con);

      document.getElementById('referee_list').appendChild(card);
    }

    function addBeneficiary(address,name,percentage,relationship,index,id){
      var card = document.createElement('div');
      card.style.height = "100px";
      card.classList.add('w-full','bg-white','rounded-md','drop-shadow-md','mt-2','flex','flex-row','place-items-center','px-2');
      
       //Avatar
      var avatar_con = document.createElement('div');
      avatar_con.style.height = "50px";
      avatar_con.style.width = "50px";
      avatar_con.classList.add('bg-gray-300','rounded-full','flex');
      avatar_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>'; //'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>';
      
      var child_details_con = document.createElement('div');
      child_details_con.style.height = "70px";
      child_details_con.classList.add('flex-grow','flex','flex-col','ml-4','place-content-center');
      
       
      //qualification
      var e_qualification = document.createElement('label');
      e_qualification.classList.add('text-gray-500','text-lg');
      e_qualification.innerHTML = ""+name+" ("+relationship+")";
      child_details_con.appendChild(e_qualification);

      //institute
      var e_institute = document.createElement('label');
      e_institute.classList.add('text-gray-400');
      e_institute.innerHTML = address;
      child_details_con.appendChild(e_institute);

      //Percentage Con
      var percent_label = document.createElement('label');
      percent_label.classList.add('text-sm','text-gray-400');
      percent_label.innerHTML = "Benefit(%): "

      //Percent Input
      var percent_input = document.createElement('input');
      percent_input.style.height = "40px";
      percent_input.style.width = "70px";
      percent_input.type = "number";
      percent_input.value = percentage;
      percent_input.id = "beneficiary"+index;
      percent_input.addEventListener('input', computeBeneficiaryTotal);
      percent_input.classList.add('focus:outline-none','px-2','border','border-gray-300', 'bg-inherit','ml-2');
      
      //Update beneficiary percent
      var percent_update = document.createElement('button');
      percent_update.style.width = "80px";
      percent_update.style.height = "40px";
      percent_update.innerHTML = "Update"
      percent_update.addEventListener('click',() => {
        updateBeneficiaryPercentage(id,index)
      });
      percent_update.classList.add('rounded-full','bg-red-400','text-white','ml-8');
      

      //delete container
      var delete_con = document.createElement('div');
      delete_con.style.height = "50px";
      delete_con.style.width = "80px";
      delete_con.onclick = function(){
        deleteBeneficiary(id);
        //deleteChildClicked(id);
      }
      delete_con.classList.add('flex','ml-8');
      delete_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-400 mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>'


      card.appendChild(avatar_con);
      card.appendChild(child_details_con);
      card.appendChild(percent_label);
      card.appendChild(percent_input);
      card.appendChild(percent_update);
      card.appendChild(delete_con);

      document.getElementById('beneficiary_list').appendChild(card);
    }

    function updateBeneficiaryPercentage(id,index){
     
     var percent = document.getElementById('beneficiary'+index).value;
     if(percent == 0){
       showError("Error","Beneficiary percent cannot be 0")
     }
     else{
      Swal.fire({
          title: 'Update Beneficiary Percent',
          text: "Are you sure you want to beneficiary?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest  = $.ajax({
                    url:"/updateBeneficiary",
                    method: "GET",
                    data: {
                        "id" : id,
                        "percent" : percent,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                   
                    if(response == 'Successfully updated beneficiary percentage'){
                        Swal.fire({
                            title: 'Successfully updated beneficiary percentage',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.value) {
                              location.reload();                
                            }                       
                        });
                    }
                });

                inventoryRequest.fail(function (){
                    // Show error
                    showError("Failure","Please ensure server is active");
                });


            }

          });
     }

    
    }

    function deleteBeneficiary(id){
      Swal.fire({
          title: 'Delete Beneficiary',
          text: "Are you sure you want to delete beneficiary?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest  = $.ajax({
                    url:"/deleteBeneficiary",
                    method: "GET",
                    data: {
                        "id" : id,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                  
                    if(response == 'Successfully deleted beneficiary'){
                        Swal.fire({
                            title: 'Successfully deleted beneficiary',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.value) {
                              location.reload();                
                            }                       
                        });
                    }
                });

                inventoryRequest.fail(function (){
                    // Show error
                    showError("Failure","Please ensure server is active");
                });


            }

          });
    }

    function computeBeneficiaryTotal(e){
      
      current_total_beneficiary_percent = 0;
      for(var i=0;i<active_beneficiary.length;i++){
        current_total_beneficiary_percent = current_total_beneficiary_percent + parseInt(document.getElementById("beneficiary"+i).value);
        //current_total_beneficiary_percent = current_total_beneficiary_percent + parseInt(active_beneficiary[i]['percentage_of_benefit']);
      }
      if(current_total_beneficiary_percent > 100){
        showError("Error","Total beneficiary percentage higher than 100%");
       // alert(e.target.value);
        e.target.value = 0;
        computeBeneficiaryTotal(e);
      }
      else{
        document.getElementById('current_percentage_value').innerHTML = ""+current_total_beneficiary_percent+" %";
      }
      

    }
    
    function showAddBeneficiary(){
       document.getElementById('add_beneficiary').classList.remove('hidden');
       document.getElementById('add_beneficiary_btn_con').classList.add('hidden');
       document.getElementById('beneficiary_list').classList.add('hidden');
    }

    function closeBeneficiary(){
       document.getElementById('add_beneficiary').classList.add('hidden');
       document.getElementById('add_beneficiary_btn_con').classList.remove('hidden');
       document.getElementById('beneficiary_list').classList.remove('hidden');
    }

    function computeNewBeneficiaryTotal(e){
      var target = document.getElementById('add_beneficiary_percentage').value;
      var total = current_total_beneficiary_percent + parseInt(target);
      if(total >100){
        showError("Error","Total beneficiary percentage higher than 100%");
        document.getElementById('add_beneficiary_percentage').value = 0;
      }
    
    }

    function addNewBeneficiary(){

      var beneficiary_name = document.getElementById('add_beneficiary_name').value;
      var beneficiary_address = document.getElementById('add_beneficiary_telephone').value;
      var beneficiary_relationship = document.getElementById('add_beneficiary_relationship').value;
      var beneficiary_percentage = document.getElementById('add_beneficiary_percentage').value;

      if(beneficiary_name.length == 0){
        showError("Error","Beneficiary name required");
      }
      else if(beneficiary_address.length == 0){
        showError("Error","Beneficiary address required");
      }
      else if(beneficiary_relationship.length == 0){
        showError("Error","Beneficiary relationship required");
      }
      else if(beneficiary_percentage.length == 0){
        showError("Error","Beneficiary percentage required");
      }
      else{
        Swal.fire({
          title: 'Add Beneficiary',
          text: "Are you sure you want to add beneficiary?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest  = $.ajax({
                    url:"/addBeneficiary",
                    method: "GET",
                    data: {
                        "bio_data_id" : active_bio_data_id,
                        "name" : beneficiary_name,
                        "address" : beneficiary_address,
                        "relationship" : beneficiary_relationship,
                        "percentage" : beneficiary_percentage,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                  
                    if(response == 'Successfully added beneficiary'){
                        Swal.fire({
                            title: 'Successfully added beneficiary',
                            text: "",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Okay'
                        }).then((result) => {
                            if (result.value) {
                              location.reload();                
                            }                       
                        });
                    }
                });

                inventoryRequest.fail(function (){
                    // Show error
                    showError("Failure","Please ensure server is active");
                });


            }

          });
      }
    }

    function addPreviousJobs(institution,date,title){
      var card = document.createElement('div');
      card.style.height = "100px";
      card.classList.add('w-full','bg-white','rounded-md','drop-shadow-md','mt-2','flex','flex-row','place-items-center','px-2');
      
       //Avatar
      var avatar_con = document.createElement('div');
      avatar_con.style.height = "50px";
      avatar_con.style.width = "50px";
      avatar_con.classList.add('bg-gray-300','rounded-full','flex');
      avatar_con.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>'; //'<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>';
      
      var child_details_con = document.createElement('div');
      child_details_con.style.height = "70px";
      child_details_con.classList.add('flex-grow','flex','flex-col','ml-4','place-content-center');

      //qualification
      var e_qualification = document.createElement('label');
      e_qualification.classList.add('text-gray-500','text-lg');
      e_qualification.innerHTML = institution;
      child_details_con.appendChild(e_qualification);

      //institute
      var e_institute = document.createElement('label');
      e_institute.classList.add('text-gray-400');
      e_institute.innerHTML = ""+title+" ("+date+")";
      child_details_con.appendChild(e_institute);

      card.appendChild(avatar_con);
      card.appendChild(child_details_con);

      document.getElementById('previous_job_list').appendChild(card);
      
    }


    
  </script>
  <style>
    thead th {
      position: sticky;
      text-align: center;
      padding: 8px;
      height: 50px;
      top: 0;
    }
    td {
        text-align: center;
        padding: 8px;
    }
    tr{
        height: 40px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
  </style>
@endsection

@section('pageContent')
<div class="w-full h-full  relative ">
   <div id="staff_list_con" class="w-full h-full px-2 py-2 left-0 bottom-0 absolute flex flex-col place-items-center">
      <div style="height: 30px;" class="w-full mt-4">
        <label class="text-2xl font-bold ml-4">Registered Staff</label>
      </div>
      <div class="py-2 w-4/5  mt-8">
        <table class="w-full border border-gray-200" id="inventoryTableStructure">
          <thead class="bg-red-400 text-white">
              <tr>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>EMail</th>
                  <th>Position</th>
                  <th>Details</th>
              </tr> 
          </thead> 
          <tbody id="inventoryTableBodyStructure">
              @foreach ($staff as $result)    
                  <tr>
                      <td>{{ $result->surname }}  {{ $result->other_names }}</td>
                      <td>{{ $result->telephone }}</td>
                      <td>{{ $result->email_address }}</td>
                      <td>{{ $result->employee_data->present_job_title }}</td>
                      <td class="flex">
                        <div style="height:40px; width:40px;" class="bg-sky-500 mx-auto my-auto rounded-md flex" onclick="getStaffDetails({{ $result->id }})">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>                        
                        </div> 
                      </td>
                  </tr>
                  <script>
                      //Populate bio data 
                      var bio_data = {};
                      bio_data['id'] = "{{ $result->id }}";
                      bio_data['surname'] = "{{ $result->surname}}";
                      bio_data['other_names'] = "{{ $result->other_names }}";
                      bio_data['previous_names'] = "{{ $result->previous_names }}";
                      bio_data['date_of_birth'] = "{{ $result->date_of_birth }}";
                      bio_data['nationality'] = "{{ $result->nationality }}";
                      bio_data['home_town'] = "{{ $result->home_town }}";
                      bio_data['region'] = "{{ $result->region }}";
                      bio_data['gender'] = "{{ $result->gender }}";
                      bio_data['house_number'] = "{{ $result->house_number }}";
                      bio_data['city_town'] = "{{ $result->city_town }}";
                      bio_data['digital_address'] = "{{ $result->digital_address }}";
                      bio_data['street_name'] = "{{ $result->street_name }}";
                      bio_data['nearest_landmark'] = "{{ $result->nearest_landmark }}";
                      bio_data['post_address'] = "{{ $result->post_address }}";
                      bio_data['email_address'] = "{{ $result->email_address }}";
                      bio_data['telephone'] = "{{ $result->telephone }}";
                      bio_data['ssn'] = "{{ $result->social_security_number }}";
                      bio_data['bank'] = "{{ $result->bank }}";
                      bio_data['branch_name'] = "{{ $result->branch_name }}";
                      bio_data['account_number'] = "{{ $result->account_name }}";
                      bio_data['languages_spoken'] = "{{ $result->languages_spoken }}";
                      bio_data['physical_disability'] = "{{ $result->physical_disability }}";

                      var children = [];
                      var education_training = {};
                      var referee_list = [];
                      var beneficiary_list = [];
                      var employee_data = {};
                      
                  </script>
                  {{-- Adding children --}}
                  @foreach ($result->children as $child)
                    <script>
                      children.push(
                        {
                          "id" : "{{ $child->id }}",
                          "family_data_id" : "{{ $child->family_data_id }}",
                          "name" : "{{ $child->name }}",
                          "date_of_birth" : "{{ $child->date_of_birth }}"
                        }
                      );
                    </script>
                  @endforeach
                  {{-- Adding educational training data --}}
                  <script>
                    education_training['no_academic_qualification'] = "{{ $result->education_training->number_of_academic_qualifications }}";
                    education_training['no_professional_training'] = "{{ $result->education_training->number_of_professional_training }}";
                    education_training['hobby'] = "{{ $result->education_training->hobbies_special_interes }}";
                    var education_list = [];
                    var training_list = [];
                  </script>
                  @foreach ($result->education_training->academic_qualifications as  $qualification2)
                    <script>
                      education_list.push(
                        {
                          "education_trainings_id" : "{{ $qualification2->education_trainings_id }}",
                          "year" : "{{ $qualification2->year }}",
                          "institution" : "{{ $qualification2->institution }}",
                          "qualification" : "{{ $qualification2->qualification }}"
                        }
                      );
                    </script>
                  @endforeach
                  @foreach ($result->education_training->trainings as $training )
                    <script>
                        training_list.push({
                          "year" : "{{ $training->year }}",
                          "course" : "{{ $training->course }}",
                          "instituition" : "{{ $training->instituition }}",
                          "location" : "{{ $training->location }}"
                        });
                    </script>
                  @endforeach
                  <script>
                    education_training['academic_qualifications'] = education_list;
                    education_training['training'] = training_list;
                  </script>
                  @foreach ($result->referees as $referee)
                    <script>
                      referee_list.push({
                        "id": "{{ $referee->id }}",
                        "name": "{{ $referee->name }}",
                        "occupation": "{{ $referee->occupation }}",
                        "address": "{{ $referee->address }}",
                      });
                    </script>
                  @endforeach
                  @foreach ($result->beneficiary as $benefit )
                    <script>
                      beneficiary_list.push({
                        "id": "{{ $benefit->id }}",
                        "name": "{{ $benefit->name }}",
                        "address_telephone_number": "{{ $benefit->address_telephone_number }}",
                        "relationship": "{{ $benefit->relationship }}",
                        "percentage_of_benefit": "{{ $benefit->percentage_of_benefit }}",
                      });
                    </script>
                  @endforeach
                  <script>
                      employee_data['number_of_previous_work_place'] = "{{ $result->employee_data->number_of_previous_work_place }}";
                      employee_data['present_job_title'] = "{{ $result->employee_data->present_job_title }}";
                      employee_data['date_of_employment'] = "{{ $result->employee_data->date_of_employment}}";
                      employee_data['probation_period'] = "{{ $result->employee_data->probation_period }}";
                      employee_data['immediate_supervisor'] = "{{ $result->employee_data->immediate_supervisor }}";
                      employee_data['employment_status'] = "{{ $result->employee_data->employment_status }}";
                      employee_data['career_objects'] = "{{ $result->employee_data->career_objects }}";
                      var previous_jobs_list = [];
                  </script>
                  @foreach ($result->employee_data->previous_jobs as $job)
                    <script>
                      previous_jobs_list.push({
                          "id": "{{ $job->id }}",
                          "employment_records_id": "{{ $job->employment_records_id }}",
                          "company_instituition": "{{ $job->company_instituition }}",
                          "job_title": "{{ $job->job_title }}",
                          "date": "{{ $job->date }}",
                      });
                    </script>
                  @endforeach
                  <script>
                    employee_data['previous_jobs'] = previous_jobs_list;
                    var emergency = {};
                    emergency['name'] = "{{ $result->emergency->name }}";
                    emergency['address'] = "{{ $result->emergency->address }}";
                    emergency['telephone_number'] = "{{ $result->emergency->telephone_number }}";

                    var payload = {
                      "biodata" : bio_data,
                      "children" : children,
                      "education_training" :education_training,
                      "referee_list" : referee_list,
                      "beneficiary_list" : beneficiary_list,
                      "employee_data" : employee_data,
                      "emergency" : emergency
                    }

                    data['{{ $result->id }}'] = payload;
                  

                  </script>

              @endforeach
          </tbody>
        </table>
      </div>  
      {{ $staff->links() }}
       
   </div>

   <div id="staff_detail_con" class="w-full h-full hidden overflow-y-scroll left-0 bottom-0 absolute flex flex-col place-items-center">
      <div style="height:50px;" class="w-full mt-4 flex flex-row  ">
         <div class="flex-grow"></div>
         <div style="height: 30px; width:30px;" onclick="closeStaffDetail()" class="rounded-full bg-red-400  mr-4 flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white mx-auto my-auto">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          
         </div>
         
      </div>
      <div style="height: 30px;" class="w-full mt-2  relative">
        <label class="text-2xl font-bold ml-4 ">Staff Detail</label>
      </div>
      <div  style="height:50px;" class="w-4/5  mt-8  flex flex-row place-content-center place-items-center">
         <div onclick="showBioData()" id="bio_dat_title" style="width:100px; height:40px;" class="rounded-full bg-gray-400 text-white flex hover:bg-red-400">
            <label class="mx-auto my-auto">Biodata</label>
         </div>
         <div onclick="showChildren()" id="children_title" style="width:100px; height:40px;" class="rounded-full bg-gray-400 ml-2 text-white flex hover:bg-red-400">
           <label class="mx-auto my-auto">Children</label>
         </div>
         <div onclick="showEducationTraining()" id="education_training_title" style="width:200px; height:40px;" class="rounded-full bg-gray-400 ml-2 text-white flex hover:bg-red-400">
           <label class="mx-auto my-auto">Education And Training</label>
         </div>
         <div onclick="showReferee()" id="referee_title" style="width:100px; height:40px;" class="rounded-full bg-gray-400 ml-2 text-white flex hover:bg-red-400">
           <label class="mx-auto my-auto">Referee</label>
         </div>
         <div onclick="showBeneficiary()" id="beneficiary_title" style="width:120px; height:40px;" class="rounded-full bg-gray-400 ml-2 text-white flex hover:bg-red-400">
           <label class="mx-auto my-auto">Beneficiaries</label>
         </div>
         <div onclick="showJobDetail()" id="job_detail_title" style="width:100px; height:40px;" class="rounded-full bg-gray-400 ml-2 text-white flex hover:bg-red-400">
           <label class="mx-auto my-auto">Job Detail</label>
         </div>
         <div onclick="showEmergency()" id="emergency_title" style="width:100px; height:40px;" class="rounded-full bg-gray-400 ml-2 text-white flex hover:bg-red-400">
           <label class="mx-auto my-auto">Emergency</label>
         </div>
      </div>

      <div id="bio_data_con" class="flex-grow mt-4 hidden w-full  flex flex-col px-6">
          <div style="height:30px;" class="w-full mt-4  flex">
              <label class="font-bold mx-auto my-auto">Biodata</label>
          </div>
          <div style="height:70px;" class="w-full  mt-2 flex flex-row">
             <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
                <label class="text-sm text-gray-400">Surname</label>
                <input style="height:40px;"  id="surname"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
             </div>
             <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
                <label class="text-sm text-gray-400">Other Names</label>
                <input style="height:40px;"  id="other_name"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
             </div>
             <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
                <label class="text-sm text-gray-400">Previous Names</label>
                <input style="height:40px;"  id="previous_name"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
             </div>
          </div>

          <div style="height:70px;" class="w-full mt-2  mt-2 flex flex-row">
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
               <label class="text-sm text-gray-400">Date Of Birth</label>
               <input style="height:40px;"  id="date_of_birth" readonly="readonly"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
               <label class="text-sm text-gray-400">Nationality</label>
               <input style="height:40px;"  id="nationality"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
               <label class="text-sm text-gray-400">Home Town</label>
               <input style="height:40px;"  id="home_town"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div> 
          </div>

          <div style="height:70px;" class="w-full mt-2  mt-2 flex flex-row">
              <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
                <label class="text-sm text-gray-400">Region</label>
                <input style="height:40px;"  id="region"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
              </div>
              <div style="height:70px;" class="w-1/3 flex flex-col pr-2">
                <label class="text-sm text-gray-400">Gender</label>
                <input style="height:40px;"  id="gender" disabled class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
              </div>
              <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
                <label class="text-sm text-gray-400">House Number</label>
                <input style="height:40px;"  id="house_number"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
              </div> 
          </div>

         <div style="height:70px;" class="w-full mt-2  mt-2 flex flex-row">
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">City/Town</label>
              <input style="height:40px;"  id="city_town"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Digital Address</label>
              <input style="height:40px;"  id="digital_address"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Street Name</label>
              <input style="height:40px;"  id="street_name"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div> 
        </div>

        <div style="height:70px;" class="w-full mt-2  mt-2 flex flex-row">
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Nearest Landmark</label>
              <input style="height:40px;"  id="nearest_landmark"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Postal Address</label>
              <input style="height:40px;"  id="postal_address"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">EMail Address</label>
              <input style="height:40px;"  id="email_address"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div> 
        </div>

        <div style="height:70px;" class="w-full mt-2  mt-2 flex flex-row">
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Telephone</label>
              <input style="height:40px;"  id="telephone"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3 flex flex-col pr-2">
              <label class="text-sm text-gray-400">Social Security Number</label>
              <input style="height:40px;"  id="ssn" disabled  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Bank</label>
              <input style="height:40px;"  id="bank"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div> 
        </div>

        <div style="height:70px;" class="w-full mt-2  flex flex-row">
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Bank Branch</label>
              <input style="height:40px;"  id="bank_branch"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Account Number</label>
              <input style="height:40px;"  id="account_number"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div style="height:70px;" class="w-1/3  flex flex-col pr-2">
              <label class="text-sm text-gray-400">Languages Spoken</label>
              <input style="height:40px;"  id="languages"  class="w-full mt-2 focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div> 
        </div>

        <div style="height:60px;" class="w-full mt-4  flex relative ">
            <button style="width:150px; height:50px;" class="bg-red-400 rounded-full text-white my-auto right-0 absolute" onclick="updateBiodata()">Update</button>
        </div>
      </div>

      <div id="children_con" class="flex-grow mt-4 hidden w-full overflow-y-scroll flex flex-col px-6">
        <div style="height:30px;" class="w-full mt-4  flex">
          <label class="font-bold mx-auto my-auto">Children</label>
        </div>
        <div id="children_list" class="w-full py-2  mt-4 relative px-2"></div>
        <div style="height:400px;" id="add_child" class="w-full mt-4 py-2 hidden flex flex-col place-items-center">
           <div style="width:300px; height:50px;" class="relative flex" onclick="closeAddChild()">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 top-2 text-red-400 absolute right-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
           </div>
           <label class="text-md text-gray-400 font-bold">Add Child</label>

           <div style="height: 20px; width:300px;" class="mt-4">
             <label class="text-sm text-gray-400">Enter Child Name</label>
           </div>
           <input style="height:50px; width:300px;"  id="add_child_name"  class="  focus:outline-none  px-2  border border-gray-300 bg-inherit   rounded-full" type="text" >

           <div style="height: 20px; width:300px;" class="mt-2">
              <label class="text-sm text-gray-400">Enter Date Of Birth</label>
           </div>
           <input style="height:50px; width:300px;"  id="add_child_date_of_birth"  class="focus:outline-none  px-2  border border-gray-300 bg-inherit rounded-full" type="date" >
           <button onclick="addNewChild()" style="width:300px;height:50px;" class="bg-red-400 mt-4 rounded-full text-white">Add Child</button>
        </div>
        <div id="add_child_btn_con" style="height:60px;" class="w-full mt-4  flex relative ">
          <button style="width:150px; height:50px;" onclick="showAddChild()" class="bg-red-400 rounded-full text-white my-auto right-0 absolute">Add Child</button>
        </div>
      </div>

      <div id="education_training_con" class="flex-grow mt-4 hidden w-full overflow-y-scroll flex flex-col px-6">
        <div style="height:30px;" class="w-full mt-4  flex">
          <label class="font-bold mx-auto my-auto">Education And Training</label>
        </div>
        <div id="education_display" class="py-1 w-full flex flex-col">
          <div style="height:30px;" class="w-full ">
            <label class="text-md text-gray-400 ml-4">Academic Record:</label>
          </div>
          <div id="education_list" class="w-full py-2 relative px-2">
          </div>
          <div style="height:30px;" class="w-full  mt-2">
            <label class="text-md text-gray-400 ml-4">Professional Training:</label>
          </div>
          <div id="training_list" class="w-full py-2  relative px-2 "></div>
          <div style="height:50px;" class="w-full flex flex-row mt-2  place-items-center">
             <label class="text-md text-gray-400 ml-4">Hobby:</label>
             <label id="hobby" class="text-lg ml-2"></label>
          </div>
        </div>
        <div style="height:500px;" id="add_training" class="w-full mt-4 py-2 hidden flex flex-col place-items-center">
          <div style="width:300px; height:50px;" class="relative flex" onclick="closeAddTraining()">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 top-2 text-red-400 absolute right-0">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
             </svg>
          </div>
          <label class="text-md text-gray-400 font-bold">Add Professional Training</label>

          <div style="height: 20px; width:300px;" class="mt-4">
            <label class="text-sm text-gray-400">Enter Course Name</label>
          </div>
          <input style="height:50px; width:300px;"  id="add_training_course"  class="  focus:outline-none  px-2  border border-gray-300 bg-inherit   rounded-full" type="text" >

          <div style="height: 20px; width:300px;" class="mt-2">
             <label class="text-sm text-gray-400">Enter Institution</label>
          </div>
          <input style="height:50px; width:300px;"  id="add_training_institution"  class="focus:outline-none  px-2  border border-gray-300 bg-inherit rounded-full" type="text" >
          
          <div style="height: 20px; width:300px;" class="mt-2">
            <label class="text-sm text-gray-400">Enter Location</label>
          </div>
          <input style="height:50px; width:300px;"  id="add_training_location"  class="focus:outline-none  px-2  border border-gray-300 bg-inherit rounded-full" type="text" >
          <div style="height: 20px; width:300px;" class="mt-2">
            <label class="text-sm text-gray-400">Enter Year</label>
          </div>
          <input style="height:50px; width:300px;"  id="add_training_year"  class="focus:outline-none  px-2  border border-gray-300 bg-inherit rounded-full" type="text" >
          <button onclick="addNewProfessionalTraining()" style="width:300px;height:50px;" class="bg-red-400 mt-4 rounded-full text-white">Add Professional Training</button>
       </div>
        <div id="add_education_btn_con" style="height:60px;" class="w-full mt-4  flex relative ">
          <button style="width:250px; height:50px;" onclick="showAddTraining()" class="bg-red-400 rounded-full text-white my-auto right-0 absolute">Add Professional Training</button>
        </div>
      </div>

      <div id="referee_con" class="flex-grow mt-4 hidden w-full overflow-y-scroll flex flex-col px-6">
        <div style="height:30px;" class="w-full mt-4  flex">
          <label class="font-bold mx-auto my-auto">Referee</label>
        </div>
        <div id="referee_list" class="w-full py-2  mt-4 relative px-2"></div>
      </div>

      <div id="beneficiary_con" class="flex-grow mt-4 hidden w-full overflow-y-scroll flex flex-col px-6">
        <div style="height:30px;" class="w-full mt-4  flex">
          <label class="font-bold mx-auto my-auto">Beneficiaries</label>
        </div>
        <div style="height: 50px;" class="w-full flex flex-row place-items-center place-content-center">
           <label class="text-sm text-grey">Current Percentage value</label>
           <label class="ml-2 text-lg" id="current_percentage_value"></label>
        </div>
        <div style="height:500px;" id="add_beneficiary" class="w-full mt-4 py-2 hidden flex flex-col place-items-center">
          <div style="width:300px; height:50px;" class="relative flex" onclick="closeBeneficiary()">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 top-2 text-red-400 absolute right-0">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
             </svg>
          </div>
          <label class="text-md text-gray-400 font-bold">Add Beneficiary</label>

          <div style="height: 20px; width:300px;" class="mt-4">
            <label class="text-sm text-gray-400">Enter Name</label>
          </div>
          <input style="height:50px; width:300px;"  id="add_beneficiary_name"  class="  focus:outline-none  px-2  border border-gray-300 bg-inherit   rounded-full" type="text" >

          <div style="height: 20px; width:300px;" class="mt-2">
             <label class="text-sm text-gray-400">Enter Address/Telephone </label>
          </div>
          <input style="height:50px; width:300px;"  id="add_beneficiary_telephone"  class="focus:outline-none  px-2  border border-gray-300 bg-inherit rounded-full" type="text" >
          
          <div style="height: 20px; width:300px;" class="mt-2">
            <label class="text-sm text-gray-400">Enter Relationship</label>
          </div>
          <input style="height:50px; width:300px;"  id="add_beneficiary_relationship"  class="focus:outline-none  px-2  border border-gray-300 bg-inherit rounded-full" type="text" >
          <div style="height: 20px; width:300px;" class="mt-2">
            <label class="text-sm text-gray-400">Enter Percentage</label>
          </div>
          <input style="height:50px; width:300px;"  id="add_beneficiary_percentage" oninput="computeNewBeneficiaryTotal()"  class="focus:outline-none  px-2  border border-gray-300 bg-inherit rounded-full" type="number" >
          <button onclick="addNewBeneficiary()" style="width:300px;height:50px;" class="bg-red-400 mt-4 rounded-full text-white">Add Bemeficiary</button>
       </div>
        <div id="beneficiary_list" class="w-full py-2  mt-4 relative px-2"></div>
        <div id="add_beneficiary_btn_con" style="height:60px;" class="w-full mt-4  flex relative ">
          <button style="width:150px; height:50px;" onclick="showAddBeneficiary()" class="bg-red-400 rounded-full text-white my-auto right-0 absolute">Add Beneficiary</button>
        </div>
      </div>

      <div id="job_detail_con" class="flex-grow mt-4 hidden w-full overflow-y-scroll flex flex-col px-6">
        <div style="height:30px;" class="w-full mt-4  flex">
          <label class="font-bold mx-auto my-auto">Job Detail</label>
        </div>
        <label class="ml-2 text-gray-400 mt-4"> Career Objectives : </label>
        <label id="career_objectives" class="mt-2 ml-2"></label>
        <label class="ml-2 text-gray-400 mt-2"> Job Title : </label>
        <label id="job_title" class="mt-2 ml-2"></label>
        <div style="height:40px;" class="w-full mt-2 flex flex-row">
           <div style="height:40px;" class="w-1/2 flex flex-row">
              <label class="ml-2 text-gray-400">Date Of Empoyment:</label>
              <label id="date_of_employment" class="ml-4"></label>
           </div>
           <div style="height:40px;" class="w-1/2 flex flex-row">
            <label class="ml-2 text-gray-400">Employment Status :</label>
            <label id="employment_status" class="ml-4"></label>
          </div>
        </div>
        <label class="ml-2 text-gray-400 mt-2"> Previous Jobs : </label>
        <div id="previous_job_list" class="w-full py-2  mt-2 relative px-2"></div>
      </div>

      <div id="emergency_con" class="flex-grow mt-4 hidden w-full overflow-y-scroll flex flex-col px-6">
        <div style="height:30px;" class="w-full mt-4  flex">
          <label class="font-bold mx-auto my-auto">Emergency Contact</label>
        </div>
        <div style="height: 100px;" class="w-full  mt-4 px-2">
           <div style="height:100px" class="w-full bg-white rounded-md drop-shadow-md mt-2 flex flex-row place-items-center px-2 ">
             <div style="height: 50px; width:50px;" class="bg-gray-300 rounded-full flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
             </div>
             <div class="flex-grow flex flex-col ml-4 place-content-center">
                <label id="emregency_name" class="text-gray-500 text-lg"></label>
                <label id="emergency_address" class="text-gray-400"></label>
             </div>
           </div>
        </div>
      </div>

   </div>

   
</div>
@endsection


