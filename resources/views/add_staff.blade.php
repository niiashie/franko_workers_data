@extends('base')

@section('pageJs')
  
  <script>
    var payLoad = {};
    var biodata = {};
    var familyData = {};
    var employeeData = {};
    var educationalTraining = {};
    var refereeData = {};
    var emergency_name;
    var emergency_address;
    var emergency_number;
    var beneficiaryData = {};
    
    document.addEventListener("DOMContentLoaded", () => {
      //alert("It works");
      var selection = document.getElementById('addStaff');
      selection.classList.remove('bg-gray-100');
      selection.classList.add('bg-red-400');

      document.getElementById('addStaffText').classList.remove('text-gray-500');
      document.getElementById('addStaffText').classList.add('text-white');

      document.getElementById('addStaffLogo').classList.remove('text-gray-500');
      document.getElementById('addStaffLogo').classList.add('text-white');

      var source = document.getElementById('children_number');
       
    });

    function show(){
        var family = document.getElementById('family_children_con');
        var x = document.getElementById("number_of_children").value;
        
        var child = family.lastElementChild; 
        while (child) {
            family.removeChild(child);
            child = family.lastElementChild;
        }

        var number = parseInt(x);
        for(var i=0;i<number;i++){
          let d1 = document.createElement('div');
          d1.style.height = "50px";
          d1.classList.add('mt-2','w-full','flex','flex-row');
          
          //Name of child box
          let d2 = document.createElement('div');
          d2.style.height = "50px";
          d2.classList.add('w-1/2','flex','flex-row','place-items-center');
          
          //Name of date box
          let d3 = document.createElement('div');
          d3.style.height = "50px";
          d3.classList.add('w-1/2','flex','flex-row','place-items-center');
          
          //label of child name
          let childNameLabel = document.createElement('label');
          childNameLabel.innerHTML = "Name: ";
          childNameLabel.classList.add('text-gray-400','ml-4');
          
          //input for child name
          let childNameInput = document.createElement('input');
          childNameInput.type = "text";
          childNameInput.style.height = "40px";
          childNameInput.id = "number_of_children_name_"+i;
          childNameInput.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');
          
          //label of child date of birth
          let childDateLabel = document.createElement('label');
          childDateLabel.innerHTML = "Date Of Birth: ";
          childDateLabel.classList.add('text-gray-400','ml-4');

          //input for child name
          let childDateInput = document.createElement('input');
          childDateInput.type = "date";
          childDateInput.style.height = "40px";
          childDateInput.id = "number_of_children_date_"+i;
          childDateInput.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');
          

          d2.appendChild(childNameLabel);
          d2.appendChild(childNameInput);
          
          d3.appendChild(childDateLabel);
          d3.appendChild(childDateInput);

          d1.appendChild(d2);
          d1.appendChild(d3);

          family.appendChild(d1);

        }
    }

    function jobs(){
      //number_of_previous_jobs
      var jobsCon = document.getElementById('jobs_children_con');
      var x = document.getElementById("number_of_previous_jobs").value;
      var number = parseInt(x);
      
      var child = jobsCon.lastElementChild; 
      while (child) {
        jobsCon.removeChild(child);
        child = jobsCon.lastElementChild;
      }

      for(var i=0;i<number;i++){
        let d1 = document.createElement('div');
        d1.style.height = "50px";
        d1.classList.add('mt-2','w-full','flex','flex-row');

       
        let con1 = document.createElement('div');
        con1.classList.add('w-1/3','flex','flex-row','place-items-center');

        let con1Label = document.createElement('label');
        con1Label.innerHTML = "Company/Institution";
        con1Label.classList.add('text-gray-400','ml-4');

        let con1Input = document.createElement("input");
        con1Input.type = "text";
        con1Input.style.height = "40px";
        con1Input.id = "number_of_previous_jobs_company_"+i;
        con1Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con1.appendChild(con1Label);
        con1.appendChild(con1Input);

        //Title con
        let con2 = document.createElement('div');
        con2.classList.add('w-1/3','flex','flex-row','place-items-center');

        let con2Label = document.createElement('label');
        con2Label.innerHTML = "Job Title";
        con2Label.classList.add('text-gray-400','ml-4');

        let con2Input = document.createElement("input");
        con2Input.type = "text";
        con2Input.style.height = "40px";
        con2Input.id = "number_of_previous_jobs_title_"+i;
        con2Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');
        
        con2.appendChild(con2Label);
        con2.appendChild(con2Input);

        //Duration con
        let con3 = document.createElement('div');
        con3.classList.add('flex-grow','flex','flex-row','place-items-center');

        let con3Label = document.createElement('label');
        con3Label.innerHTML = "Date";
        con3Label.classList.add('text-gray-400','ml-4');

        let con3Input = document.createElement("input");
        con3Input.type = "date";
        con3Input.style.height = "40px";
        con3Input.id = "number_of_previous_jobs_date_"+i;
        con3Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');
        
        con3.appendChild(con3Label);
        con3.appendChild(con3Input);


        d1.appendChild(con1);
        d1.appendChild(con2);
        d1.appendChild(con3);

        jobsCon.appendChild(d1);
      }
    }
    
    function academic(){
      var academicCon = document.getElementById('academic_children_con');
      var x = document.getElementById("number_of_previous_academic").value;
        
      var number = parseInt(x);
      
      var child = academicCon.lastElementChild; 
      while (child) {
        academicCon.removeChild(child);
        child = academicCon.lastElementChild;
      }

      for(var i=0;i<number;i++){
        let d1 = document.createElement('div');
        d1.style.height = "50px";
        d1.classList.add('mt-2','w-full','flex','flex-row');

        let con1 = document.createElement('div');
        con1.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con1Label = document.createElement('label');
        con1Label.innerHTML = "Year";
        con1Label.classList.add('text-gray-400','ml-4');

        let con1Input = document.createElement("input");
        con1Input.type = "text";
        con1Input.style.height = "40px";
        con1Input.id = "number_of_previous_academic_year_"+i;
        con1Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con1.appendChild(con1Label);
        con1.appendChild(con1Input);

        let con2 = document.createElement('div');
        con2.classList.add('w-1/3','flex','flex-row','place-items-center');

        let con2Label = document.createElement('label');
        con2Label.innerHTML = "Instituition";
        con2Label.classList.add('text-gray-400','ml-4');

        let con2Input = document.createElement("input");
        con2Input.type = "text";
        con2Input.style.height = "40px";
        con2Input.id = "number_of_previous_academic_institution_"+i;
        con2Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');
        
        con2.appendChild(con2Label);
        con2.appendChild(con2Input);
        
        let con3 = document.createElement('div');
        con3.classList.add('flex-grow','flex','flex-row','place-items-center');

        let con3Label = document.createElement('label');
        con3Label.innerHTML = "Qualification";
        con3Label.classList.add('text-gray-400','ml-4');

        let con3Input = document.createElement("input");
        con3Input.type = "text";
        con3Input.style.height = "40px";
        con3Input.id = "number_of_previous_academic_qualification_"+i;
        con3Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');
        
        con3.appendChild(con3Label);
        con3.appendChild(con3Input);

        d1.appendChild(con1);
        d1.appendChild(con2);
        d1.appendChild(con3);
        academicCon.appendChild(d1);
       }
    }

    function training(){
      var academicCon = document.getElementById('training_children_con');
      var x = document.getElementById("number_of_previous_training").value;
        
      var number = parseInt(x);
      
      var child = academicCon.lastElementChild; 
      while (child) {
        academicCon.removeChild(child);
        child = academicCon.lastElementChild;
      }

      for(var i=0;i<number;i++){
        let d1 = document.createElement('div');
        d1.style.height = "50px";
        d1.classList.add('mt-2','w-full','flex','flex-row');

        let con1 = document.createElement('div');
        con1.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con1Label = document.createElement('label');
        con1Label.innerHTML = "Year";
        con1Label.classList.add('text-gray-400','ml-4');

        let con1Input = document.createElement("input");
        con1Input.type = "text";
        con1Input.style.height = "40px";
        con1Input.id = "number_of_previous_training_year_"+i;
        con1Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con1.appendChild(con1Label);
        con1.appendChild(con1Input);

        let con2 = document.createElement('div');
        con2.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con2Label = document.createElement('label');
        con2Label.innerHTML = "Course";
        con2Label.classList.add('text-gray-400','ml-4');

        let con2Input = document.createElement("input");
        con2Input.type = "text";
        con2Input.style.height = "40px";
        con2Input.id = "number_of_previous_training_course_"+i;
        con2Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con2.appendChild(con2Label);
        con2.appendChild(con2Input);

        let con3 = document.createElement('div');
        con3.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con3Label = document.createElement('label');
        con3Label.innerHTML = "Instituition";
        con3Label.classList.add('text-gray-400','ml-4');

        let con3Input = document.createElement("input");
        con3Input.type = "text";
        con3Input.style.height = "40px";
        con3Input.id = "number_of_previous_training_institution_"+i;
        con3Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con3.appendChild(con3Label);
        con3.appendChild(con3Input);

        let con4 = document.createElement('div');
        con4.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con4Label = document.createElement('label');
        con4Label.innerHTML = "Location";
        con4Label.classList.add('text-gray-400','ml-4');

        let con4Input = document.createElement("input");
        con4Input.type = "text";
        con4Input.style.height = "40px";
        con4Input.id = "number_of_previous_training_location_"+i;
        con4Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con4.appendChild(con4Label);
        con4.appendChild(con4Input);

        d1.appendChild(con1);
        d1.appendChild(con2);
        d1.appendChild(con3);
        d1.appendChild(con4);
        academicCon.appendChild(d1);
      }
    }

    function referees(){

      var academicCon = document.getElementById('referees_children_con');
      var x = document.getElementById("number_of_referees").value;
        
      var number = parseInt(x);
      
      var child = academicCon.lastElementChild; 
      while (child) {
        academicCon.removeChild(child);
        child = academicCon.lastElementChild;
      }

      for(var i=0;i<number;i++){
        let d1 = document.createElement('div');
        d1.style.height = "50px";
        d1.classList.add('mt-2','w-full','flex','flex-row');

        let con1 = document.createElement('div');
        con1.classList.add('w-1/3','flex','flex-row','place-items-center');

        let con1Label = document.createElement('label');
        con1Label.innerHTML = "Name :";
        con1Label.classList.add('text-gray-400','ml-4');

        let con1Input = document.createElement("input");
        con1Input.type = "text";
        con1Input.style.height = "40px";
        con1Input.id = "number_of_referees_name_"+i;
        con1Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con1.appendChild(con1Label);
        con1.appendChild(con1Input);

        let con2 = document.createElement('div');
        con2.classList.add('w-1/3','flex','flex-row','place-items-center');

        let con2Label = document.createElement('label');
        con2Label.innerHTML = "Occupation :";
        con2Label.classList.add('text-gray-400','ml-4');

        let con2Input = document.createElement("input");
        con2Input.type = "text";
        con2Input.style.height = "40px";
        con2Input.id = "number_of_referees_occupation_"+i;
        con2Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con2.appendChild(con2Label);
        con2.appendChild(con2Input);

        let con3 = document.createElement('div');
        con3.classList.add('flex-grow','flex','flex-row','place-items-center');

        let con3Label = document.createElement('label');
        con3Label.innerHTML = "Address :";
        con3Label.classList.add('text-gray-400','ml-4');

        let con3Input = document.createElement("input");
        con3Input.type = "text";
        con3Input.style.height = "40px";
        con3Input.id = "number_of_referees_name_address_"+i;
        con3Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con3.appendChild(con3Label);
        con3.appendChild(con3Input);
  
        d1.appendChild(con1);
        d1.appendChild(con2);
        d1.appendChild(con3);
        academicCon.appendChild(d1);
      }

     
    }

    function beneficiaries(){
      var academicCon = document.getElementById('beneficiary_children_con');
      var x = document.getElementById("number_of_beneficiaries").value;
        
      var number = parseInt(x);
      
      var child = academicCon.lastElementChild; 
      while (child) {
        academicCon.removeChild(child);
        child = academicCon.lastElementChild;
      }

      for(var i=0;i<number;i++){
        let d1 = document.createElement('div');
        d1.style.height = "50px";
        d1.classList.add('mt-2','w-full','flex','flex-row');

        let con1 = document.createElement('div');
        con1.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con1Label = document.createElement('label');
        con1Label.innerHTML = "Name :";
        con1Label.classList.add('text-gray-400','ml-4');

        let con1Input = document.createElement("input");
        con1Input.type = "text";
        con1Input.id = "number_of_beneficiaries_name_"+i;
        con1Input.style.height = "40px";
        con1Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con1.appendChild(con1Label);
        con1.appendChild(con1Input);

        let con2 = document.createElement('div');
        con2.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con2Label = document.createElement('label');
        con2Label.innerHTML = "Address/Tel No";
        con2Label.classList.add('text-gray-400','ml-4');

        let con2Input = document.createElement("input");
        con2Input.type = "text";
        con2Input.id = "number_of_beneficiaries_address_"+i;
        con2Input.style.height = "40px";
        con2Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con2.appendChild(con2Label);
        con2.appendChild(con2Input);

        let con3 = document.createElement('div');
        con3.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con3Label = document.createElement('label');
        con3Label.innerHTML = "Relationship";
        con3Label.classList.add('text-gray-400','ml-4');

        let con3Input = document.createElement("input");
        con3Input.type = "text";
        con3Input.id = "number_of_beneficiaries_relationship_"+i;
        con3Input.style.height = "40px";
        con3Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con3.appendChild(con3Label);
        con3.appendChild(con3Input);

        let con4 = document.createElement('div');
        con4.classList.add('w-1/4','flex','flex-row','place-items-center');

        let con4Label = document.createElement('label');
        con4Label.innerHTML = "% Of Benefit";
        con4Label.classList.add('text-gray-400','ml-4');

        let con4Input = document.createElement("input");
        con4Input.type = "number";
        con4Input.id = "number_of_beneficiaries_percentage_"+i;
        con4Input.style.height = "40px";
        con4Input.classList.add('flex-grow','ml-8','focus:outline-none','px-2','border','border-gray-300','bg-inherit');

        con4.appendChild(con4Label);
        con4.appendChild(con4Input);

        d1.appendChild(con1);
        d1.appendChild(con2);
        d1.appendChild(con3);
        d1.appendChild(con4);
        academicCon.appendChild(d1);
      }
    }

    function addStaff(){
      populateBioData();
    }

    function populateBioData(){
      var surname = document.getElementById('surname').value;
      var othername = document.getElementById('other_names').value;
      var previous_name = document.getElementById('previous_name').value;
      var date_of_birth = document.getElementById('date_of_birth').value;
      var nationality = document.getElementById('nationality').value;
      var hometown = document.getElementById('hometown').value;
      var region = document.getElementById('region').value;
      var gender = document.getElementById('gender').value;
      var house_number = document.getElementById('house_number').value;
      var city_town = document.getElementById('city_town').value;
      var digital_address = document.getElementById('digital_address').value;
      var street_name = document.getElementById('street_name').value;
      var nearest_landmark = document.getElementById('nearest_landmark').value;
      var postal_address = document.getElementById('postal_address').value;
      var email_address = document.getElementById('email_address').value;
      var telephone_no = document.getElementById('telephone_no').value;
      var ssn = document.getElementById('ssn').value;
      var bank = document.getElementById('bank').value;
      var branch_name = document.getElementById('branch_name').value;
      var account_number = document.getElementById('account_number').value;
      var languages = document.getElementById('languages').value;
      var physical_disability = document.getElementById('physical_disability').value;
      
     
      var error_counter = 0;
      if(surname.length == 0){
        showError("Error","Surname required please");
        error_counter = error_counter + 1;
      }
      else if(othername.length == 0){
        showError("Error","Other names required please");
        error_counter = error_counter + 1;
      }
      else if(date_of_birth.length == 0){
        showError("Error","Date of birth required please");
        error_counter = error_counter + 1;
      }
      else if(nationality.length == 0){
        showError("Error","Nationality required please");
        error_counter = error_counter + 1;
      }
      else if(telephone_no.length == 0){
        showError("Error","Telephone number required please");
        error_counter = error_counter + 1;
      }
      else if(ssn.length == 0){
        showError("Error","Social security number required please");
        error_counter = error_counter + 1;
      }
      else if(bank.length == 0){
        showError("Error","Bank name required please");
        error_counter = error_counter + 1;
      }
      else if(branch_name.length == 0){
        showError("Error","Bank branch required please");
        error_counter = error_counter + 1;
      }
      else if(account_number.length == 0){
        showError("Error","Bank account number required please");
        error_counter = error_counter + 1;
      }
      else if(languages.length == 0){
        showError("Error","Languages spoken required please");
        error_counter = error_counter + 1;
      }

      if(error_counter == 0){
         biodata = {
          "sur_name" : surname,
          "other_name" : othername,
          "previous_name" : previous_name,
          "date_of_birth" : date_of_birth,
          "nationality" : nationality,
          "hometown" : hometown,
          "region" : region,
          "gender" : gender,
          "house_number" : house_number,
          "city_town" : city_town,
          "digital_address" : digital_address,
          "street_name" : street_name,
          "nearest_landmark" : nearest_landmark,
          "postal_address" : postal_address,
          "email_address" : email_address,
          "telephone_no" : telephone_no,
          "ssn" : ssn,
          "bank" :bank,
          "branch_name" : branch_name,
          "account_number" : account_number,
          "languages" : languages,
          "physical_disability" : physical_disability
        }
        populateFamilyRecord();
      }
      
     
      




    }

    function populateFamilyRecord(){
      var marital_status = document.getElementById('marital_status').value;
      var spouse_name = document.getElementById('spouse_name').value;
      var spouse_occupation = document.getElementById('spouse_occupation').value;
      var father_name = document.getElementById('father_name').value;
      var father_deceased = document.getElementById('father_deceased').value;
      var mother_name = document.getElementById('mother_name').value;
      var mother_deceased = document.getElementById('mother_deceased').value;
 
      let error_counter = 0;
      if(father_name.length == 0){
        error_counter = error_counter + 1;
        showError("Error","Father's name required");
      }
      else if(mother_name.length == 0){
        showError("Error","Mother's name required");
        error_counter = error_counter + 1;
      }

      //Get the number of children
      let children_error = 0;
      var x = document.getElementById("number_of_children").value;

      var children = [];
      for(var i=0;i<x;i++){
        var childName = document.getElementById("number_of_children_name_"+i).value;
        var childDOB = document.getElementById("number_of_children_date_"+i).value;

        if(childName.length == 0){
          children_error = children_error + 1;
        }
        else if(childDOB.length == 0){
          children_error = children_error + 1;
        }
        children.push({
          "name" : childName,
          "date_of_birth" : childDOB
        });
      }

      if(children_error > 0){
        showError("Error","Ensure children details are fully filled");
      }

      if(error_counter == 0 && children_error == 0){
        familyData = {
          "children" : children,
          "marital_status" : marital_status,
          "spouse_name" : spouse_name,
          "spouse_occupation" : spouse_occupation,
          "father_name" : father_name,
          "father_deceased" : father_deceased,
          "mother_name" : mother_name,
          "mother_deceased" : mother_deceased,
          "children" : children
        }
        populateEmployeeRecord();
      }
    }

    function populateEmployeeRecord(){

      var present_job_title = document.getElementById('present_job_title').value;
      var date_of_employment = document.getElementById('date_of_employment').value;
      var probation_period = document.getElementById('probation_period').value;
      var supervisor = document.getElementById('supervisor').value;
      var employment_status = document.getElementById('employment_status').value;
      var career_objectives = document.getElementById('career_objectives').value;
      var x = document.getElementById('number_of_previous_jobs').value;

      let error_counter = 0;
      if(present_job_title.length == 0){
        error_counter = error_counter + 1;
        showError("Error","Present job title required please");
      }
      else if(date_of_employment.length == 0){
        error_counter = error_counter + 1;
        showError("Error","Date of employment required please");
      }
      else if(probation_period.length == 0){
        error_counter = error_counter + 1;
        showError("Error","Probation period required please");
      }
      else if(career_objectives.length == 0){
        error_counter = error_counter + 1;
        showError("Error","Please specify career objectives");
      }
      

      
  
      var jobs_error = 0;
      var job_lists = [];
      for(var i=0;i<x;i++){

        var institution = document.getElementById("number_of_previous_jobs_company_"+i).value;
        var job = document.getElementById("number_of_previous_jobs_title_"+i).value;
        var date = document.getElementById("number_of_previous_jobs_date_"+i).value;


        if(institution.length == 0){
          jobs_error = jobs_error + 1;
        }
        else if(job.length == 0){
          jobs_error = jobs_error + 1;
        }
        else if(date.length == 0){
          jobs_error = jobs_error + 1;
        }
       
        job_lists.push({
          "institution" : institution,
          "job" : job,
          "date" : date
        });

      }

      if(jobs_error > 0){
        showError("Error","Ensure previous jobs details are fully filled");
      }

      if(jobs_error == 0 &&  error_counter == 0){
        employeeData = {
          "present_job_title" : present_job_title,
          "date_of_employment" : date_of_employment,
          "probation_period" : probation_period,
          "supervisor" : supervisor,
          "employment_status" : employment_status,
          "career_objectives" : career_objectives,
          "job_lists" : job_lists
        }
        populateEducationalData();
      }
      //employeeData

    }

    function populateEducationalData(){
      var x = document.getElementById('number_of_previous_academic').value;
      var y = document.getElementById('number_of_previous_training').value;
      var hobbies = document.getElementById('hobbies').value;

      var academic_error = 0;
      var training_error = 0;
      
      academic_data_list = [];
      for(var i=0;i<x;i++){
        let year = document.getElementById('number_of_previous_academic_year_'+i).value;
        let instituition = document.getElementById('number_of_previous_academic_institution_'+i).value;
        let qualification = document.getElementById("number_of_previous_academic_qualification_"+i).value;
        
        if(year.length == 0){
          academic_error = academic_error + 1;
        }
        else if(instituition.length == 0){
          academic_error = academic_error + 1;
        }
        else if(qualification.length == 0){
          academic_error = academic_error + 1;
        }
        academic_data_list.push({
          "year" : year,
          "institution" : instituition,
          "qualification" : qualification
        });
        

      }
      
      training_data_list = [];
      for(var j=0;j<y;j++){
        let year2 = document.getElementById("number_of_previous_training_year_"+j).value;
        let course = document.getElementById("number_of_previous_training_course_"+j).value;
        let instituition2 = document.getElementById("number_of_previous_training_institution_"+j).value;
        let location = document.getElementById("number_of_previous_training_location_"+j).value;

        if(year2.length == 0){
          training_error = training_error + 1;
        }
        else if(course.length == 0){
          training_error = training_error + 1;
        }
        else if(instituition2.length == 0){
          training_error = training_error + 1;
        }
        else if(location.length == 0){
          training_error = training_error + 1;
        }
        else{
          training_data_list.push(
            {
              "year" : year2,
              "course" : course,
              "instituition" : instituition2,
              "location" : location
            }
          );
        }
      }

      if(academic_error > 0){
        showError("Error","Ensure that academic qualifications details are filled");
      }
      else if(training_error > 0 ){
        showError("Error","Ensure that previous training/jobs are all filled");
      }
      else if(hobbies.length == 0){
        showError("Error","Your hobby is required please");
      }
      else if(x == 0){
        showError("Error","Your educational background is required");
      }else{
        educationalTraining = {
          "hobbies" :  hobbies,
          "academic" : academic_data_list,
          "training" : training_data_list
        }
        populateReferees();
      }

    }

    function populateReferees(){
      var x = document.getElementById('number_of_referees').value;
      
      var referee_error = 0;
      referee_list = [];
      for(var i=0;i<x.length;i++){
        let name = document.getElementById('number_of_referees_name_'+i).value;
        let occupation = document.getElementById("number_of_referees_occupation_"+i).value;
        let address = document.getElementById("number_of_referees_name_address_"+i).value;

        if(name.length == 0){
          referee_error = referee_error + 1;
        }
        else if(occupation.length == 0){
          referee_error = referee_error + 1;
        }
        else if(address.length == 0){
          referee_error = referee_error + 1;
        }
        else{
          referee_list.push(
            {
              "name" : name,
              "occupation" : occupation,
              "address" : address
            }
          );
        }
      }
      console.log("referee error: "+referee_error);
      if(referee_error > 0){
        showError("Error","Please ensure referee data are fully filled");
      }
      else if(x.length == 0){
        showError("Error","Please referees are required");
      }
      else{
        refereeData = referee_list;
        populateEmergency();
      }
    }

    function populateEmergency(){
      emergency_name = document.getElementById('emergency_name').value;
      emergency_address = document.getElementById('emergency_address').value;
      emergency_number = document.getElementById('emergency_number').value;

      if(emergency_name.length == 0){
        showError("Error","Please specify who to contact in emergency");
      }
      else if(emergency_address.length == 0){
        showError("Error","Please specify emergency address");
      }
      else if(emergency_number.length == 0){
        showError("Error","Please specify emergency contact number");
      }
      else{
        // alert("Rock");
        populateBeneficiaries();
      }
    }

    function populateBeneficiaries(){
      let x = document.getElementById('number_of_beneficiaries').value;
      
      let b_error = 0;
      let b_array = [];
      for(let i=0;i<x;i++){
        let b_name = document.getElementById("number_of_beneficiaries_name_"+i).value;
        let b_address = document.getElementById("number_of_beneficiaries_address_"+i).value;
        let b_relationship = document.getElementById("number_of_beneficiaries_relationship_"+i).value;
        let b_percentage = document.getElementById("number_of_beneficiaries_percentage_"+i).value;

        if(b_name.length == 0){
          b_error = b_error + 1;
        }
        else if(b_address.length == 0){
          b_error = b_error + 1;
        }
        else if(b_relationship.length == 0){
          b_error = b_error + 1;
        }
        else if(b_percentage.length == 0){
          b_error = b_error + 1;
        }
        else{
          b_array.push({
            "name" : b_name,
            "address" : b_address,
            "relationship" : b_relationship,
            "percentage" : b_percentage
          });

        }
      }

      if(x.length == 0){
        showError("Error","Please specify beneficiaries");
      }
      else if(b_error > 0){
        showError("Error","Please ensure all beneficiary details are filled");
      }
      else{
        //alert("Ready to rock");
        beneficiaryData = b_array;

        payLoad = {
          "biodata" : biodata,
          "familyData" : familyData,
          "employeeData" : employeeData,
          "educationalTraining" : educationalTraining,
          "refereeData" : refereeData,
          "emergency_name" : emergency_name,
          "emergency_address" : emergency_address,
          "emergency_number" : emergency_number,
          "beneficiaryData" : beneficiaryData
        };

        //console.log("Payload : "+payLoad['emergency_address']);
        var json = JSON.stringify(payLoad);
        //console.log("payload: "+json);
        Swal.fire({
          title: 'Add Staff',
          text: "Are you certain the information provided about your staff is accurate?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
         }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest  = $.ajax({
                    url:"/addStaffData",
                    method: "GET",
                    data: {
                        "res":json,
                        "id" : 2,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                    console.log("Response is :"+ response);
                    if(response == 'Success'){
                        Swal.fire({
                            title: 'Successfully added staff',
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



    function showError(title,message){
        Swal.fire({
            icon: 'error',
            title: title,
            text: message,              
        }); 
    }

  </script>
@endsection

@section('pageContent')
  <div class="w-full h-full px-4 py-4  flex flex-col place-items-start">

     {{-- Bio Data --}}
     <div style="width:150px; height:50px;" class="rounded-full bg-gray-400 flex">
       <label class="text-white mx-auto my-auto">Bio Data</label>
     </div>
     <div  class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
        <div style="height:50px;" class="w-full  flex flex-row">
           <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
              <label class=" text-gray-400 ml-4 ">Surname(Mr/Mrs/Miss)  :</label>
           </div>
           <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
              <input style="height:40px;"  id="surname"  class="w-full  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
           </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
               <label class=" text-gray-400 ml-4 ">Other Names  :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
               <input style="height:40px;"  id="other_names"  class="w-full  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
               <label class=" text-gray-400 ml-4 ">Previous Names  :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
               <input style="height:40px;"  id="previous_name"  class="w-full  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
          <div class="w-1/2 flex flex-row place-items-center">
            <label class=" text-gray-400 ml-4 ">Date Of Birth :</label>
            <input style="height:40px;"  id="date_of_birth"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="date" >
          </div>
          <div class="w-1/2 flex flex-row place-items-center">
            <label class=" text-gray-400 ml-4 ">Nationality :</label>
            <input style="height:40px;"  id="nationality"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
          </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">HomeTown :</label>
              <input style="height:40px;"  id="hometown"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Region :</label>
              <input style="height:40px;"  id="region"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
                <label class=" text-gray-400 ml-4 ">Gender :</label>
                <select style="height:40px;" id="gender"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  ">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">House Number :</label>
              <input style="height:40px;"  id="house_number"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">City/Town :</label>
              <input style="height:40px;"  id="city_town"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
                <label class=" text-gray-400 ml-4 ">Digital Address :</label>
                <input style="height:40px;"  id="digital_address"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>

        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Street Name :</label>
              <input style="height:40px;"  id="street_name"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Nearest Landmark :</label>
              <input style="height:40px;"  id="nearest_landmark"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>

        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Postal Address :</label>
              <input style="height:40px;"  id="postal_address"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">EMail Address :</label>
              <input style="height:40px;"  id="email_address"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
                <label class=" text-gray-400 ml-4 ">Telephone No. :</label>
                <input style="height:40px;"  id="telephone_no"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>

        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Social Security Number :</label>
              <input style="height:40px;"  id="ssn"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Bank :</label>
              <input style="height:40px;"  id="bank"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>

        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Branch Name :</label>
              <input style="height:40px;"  id="branch_name"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Account Number :</label>
              <input style="height:40px;"  id="account_number"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>

        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Languages Spoken :</label>
              <input style="height:40px;" id="languages"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Any Physical Disability :</label>
              <select style="height:40px;" id="physical_disability"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  ">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            </div>
        </div>

     </div>
     
     {{-- Family Data --}}
     
     <div style="width:200px; height:40px;" class="rounded-full mt-4 bg-gray-400 flex">
        <label class="text-white mx-auto my-auto">Family Information</label>
     </div>
     <div id="family_data_con"  class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
        <div style="height:50px;" class="w-full  flex flex-row">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
               <label class=" text-gray-400 ml-4 ">Marital Status  :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
                <select style="height:40px;" id="marital_status"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  ">
                    <option value="married">Married</option>
                    <option value="single">Single</option>
                    <option value="deceased">Deceased</option>
                    <option value="widowed">Widowed</option>
                </select>
            </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Name Of Spouse :</label>
              <input style="height:40px;"  id="spouse_name"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Occupation :</label>
              <input style="height:40px;"  id="spouse_occupation"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Name Of Father :</label>
              <input style="height:40px;"  id="father_name"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Deceased :</label>
              <select style="height:40px;" id="father_deceased"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  ">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Name Of Mother :</label>
              <input style="height:40px;"  id="mother_name"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Deceased :</label>
              <select style="height:40px;" id="mother_deceased"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  ">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
               <label class=" text-gray-400 ml-4 ">Number Of Children  :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
                <input style="height:40px;"  oninput="show()" id="number_of_children"  name="surname"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="number" >
            </div>
        </div>
        <label class=" ml-4 text-gray-400">Children :</label>
        <div id="family_children_con" class="w-full py-1  mt-2  flex flex-col">
           
        </div>
     </div>

    {{-- Employment Data --}}
    <div style="width:200px; height:40px;" class="rounded-full mt-4 bg-gray-400 flex">
        <label class="text-white mx-auto my-auto">Employment Record</label>
    </div>
    <div id="employment_data_con" class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
        <div style="height:50px;" class="w-full  flex flex-row">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
               <label class=" text-gray-400 ml-4 ">Number Of Previous Work Places  :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
                <input style="height:40px;"  oninput="jobs()" id="number_of_previous_jobs"  name="surname"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="number" >
            </div>
        </div>
        <div id="jobs_children_con" class="w-full py-1  mt-2  flex flex-col">
           
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Present Job Tile :</label>
              <input style="height:40px;"  id="present_job_title"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Date Of Employment :</label>
              <input style="height:40px;"  id="date_of_employment"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="date" >
            </div>
            <div class="w-1/3 flex flex-row place-items-center">
                <label class=" text-gray-400 ml-4 ">Probation Period :</label>
                <input style="height:40px;"  id="probation_period"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Title Of Immediate Supervisor :</label>
              <input style="height:40px;"  id="supervisor"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
            </div>
            <div class="w-1/2 flex flex-row place-items-center">
              <label class=" text-gray-400 ml-4 ">Employment Status :</label>
              <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
                    <select style="height:40px;" id="employment_status"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  ">
                        <option value="casual/partime">Casual/Part Time</option>
                        <option value="permanent">Permanent</option>
                    
                    </select>
              </div>
            </div>
        </div>
        <div style="height:100px;" class="w-full  flex flex-row">
            <div style="height:100px;" class="w-1/3  text-left flex place-items-center">
                <label class=" text-gray-400 ml-4 ">Please State Your Career Objectives  :</label>
            </div>
            <div style="height:100px;" class="flex-grow  px-8 flex place-items-center">
                <textarea style="height:80px;"   id="career_objectives"   class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" ></textarea>
            </div>
        </div>
    </div>

    {{-- Education And Training --}}
    <div style="width:200px; height:40px;" class="rounded-full mt-4 bg-gray-400 flex">
        <label class="text-white mx-auto my-auto">Education/Training</label>
    </div>
    <div id="education_data_con" class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
        <div style="height:50px;" class="w-full  flex flex-row">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
               <label class=" text-gray-400 ml-4 ">Number Of Academic Qualifications  :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
                <input style="height:40px;"  oninput="academic()" id="number_of_previous_academic"  name="surname"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="number" >
            </div>
        </div>
        <div id="academic_children_con" class="w-full py-1  mt-2  flex flex-col">
           
        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
               <label class=" text-gray-400 ml-4 ">Number Of Job Related/Professional Training  :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
                <input style="height:40px;"  oninput="training()" id="number_of_previous_training"  name="surname"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="number" >
            </div>
        </div>
        <div id="training_children_con" class="w-full py-1  mt-2  flex flex-col ">

        </div>
        <div style="height:50px;" class="w-full  flex flex-row">
          <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
             <label class=" text-gray-400 ml-4 ">Hobbies/Special Interest  :</label>
          </div>
          <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
              <input style="height:40px;"  id="hobbies"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
          </div>
      </div>
    </div>

    {{-- Referees --}}
    <div style="width:200px; height:40px;" class="rounded-full mt-4 bg-gray-400 flex">
      <label class="text-white mx-auto my-auto">Referees</label>
    </div>
    <div id="referees_data_con" class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
      <div style="height:50px;" class="w-full  flex flex-row">
        <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
           <label class=" text-gray-400 ml-4 ">Number Of Referees  :</label>
        </div>
        <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
            <input style="height:40px;"  oninput="referees()" id="number_of_referees"  name="surname"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="number" >
        </div>
      </div>
      <div id="referees_children_con" class="w-full py-1  mt-2  flex flex-col">
           
      </div>
    </div>

    {{-- Emergency Contact --}}
    <div style="width:200px; height:40px;" class="rounded-full mt-4 bg-gray-400 flex">
      <label class="text-white mx-auto my-auto">Emergency Contact</label>
    </div>
    <div id="emergency_data_con" class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
      <div style="height:50px;" class="w-full  flex flex-row">
        <div class="w-1/3 flex flex-row place-items-center">
          <label class=" text-gray-400 ml-4 ">Name :</label>
          <input style="height:40px;"  id="emergency_name"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
        </div>
        <div class="w-1/3 flex flex-row place-items-center">
          <label class=" text-gray-400 ml-4 ">Address :</label>
          <input style="height:40px;"  id="emergency_address"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
        </div>
        <div class="w-1/3 flex flex-row place-items-center">
            <label class=" text-gray-400 ml-4 ">Telephone Number :</label>
            <input style="height:40px;"  id="emergency_number"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="text" >
        </div>
      </div>
    </div>

    {{-- Beneficiary Information(Next Of Kin) --}}
    <div style="width:200px; height:40px;" class="rounded-full mt-4 bg-gray-400 flex">
      <label class="text-white mx-auto my-auto">Beneficiary Information</label>
    </div>
    <label class=" text-gray-400 text-left mt-4">
      I hereby nominate the person(s) below to receive any benefit that am entitled to,
      any amount standing to credit in the event of death, direct that the said amount be distributed
      among the person(s) in the oercentage indicated below 
    </label>
    <div id="beneficiary_data_con" class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
      <div style="height:50px;" class="w-full  flex flex-row">
        <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
           <label class=" text-gray-400 ml-4 ">Number Of Beneficiaries  :</label>
        </div>
        <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
            <input style="height:40px;"  oninput="beneficiaries()" id="number_of_beneficiaries"  name="surname"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="number" >
        </div>
      </div>
      <div id="beneficiary_children_con" class="w-full py-1  mt-2  flex flex-col">
           
      </div>
    </div>

     {{-- Declaration --}}
     {{-- <div style="width:200px; height:40px;" class="rounded-full mt-4 bg-gray-400 flex">
       <label class="text-white mx-auto my-auto">Declaration</label>
     </div>
     <label class="mt-4 text-gray-400">I declare that the information provided here are true and correct and can be verified</label>
     <div id="declaration_data_con" class="w-full py-2 flex flex-col  mt-4 flex flex-col border border-gray-300 px-4 rounded-md">
       <div style="150px;" class="w-full  flex flex-row">
         <div style="height:150px;" class="w-1/2  flex flex-col place-items-center place-content-center">
            <img style="width: 100px; height:80px;" class="rounded-md" src="{{ asset('images/image_placeholder.png') }}">
            <div style="height: 40px; width:300px;" class="border border-gray-300 mt-2 flex flex-row rounded-md">
               <div style="height:40px;"  class="flex-grow  flex place-items-center">
                 <label class="text-left text-gray-400 text-sm ml-2">Signature</label>
               </div>
               <div style="height:40px; width:1px;" class="bg-gray-400"></div>
               <div style="height:40px; width:80px;" class=" place-items-center flex">
                 <label class="text-right text-gray-400 text-sm ml-2">Browse</label>
               </div>
               <input id="signature" type="file" class="hidden"/>
            </div>
         </div>
         <div style="height: 150px;" class="w-1/2 flex flex-row place-items-center place-content-center">
            <div style="height:50px;" class="w-1/3  text-left flex place-items-center">
                <label class=" text-gray-400 ml-4 ">Date :</label>
            </div>
            <div style="height:50px;" class="flex-grow  px-8 flex place-items-center">
                <input style="height:40px;"  id="number_of_beneficiaries"  name="surname"  class="flex-grow ml-8  focus:outline-none  px-2  border border-gray-300 bg-inherit  " type="date" >
            </div>
         </div>
       </div>
     </div> --}}
     <button  style="height:50px;" class="bg-red-500 w-full py-2 text-white rounded mt-4 text-lg" onclick="addStaff()">Add Staff</button>
  </div>
@endsection