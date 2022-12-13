
@extends('base')

@section('pageJs')
   <script>
        var staffSelectedDaysLeft;
        document.addEventListener("DOMContentLoaded", () => {
            //alert("It works");
            var selection = document.getElementById('applyLeaveStaff');
            selection.classList.remove('bg-gray-100');
            selection.classList.add('bg-red-400');

            document.getElementById('applyLeaveStaffText').classList.remove('text-gray-500');
            document.getElementById('applyLeaveStaffText').classList.add('text-white');

            document.getElementById('applyLeaveStaffLogo').classList.remove('text-gray-500');
            document.getElementById('applyLeaveStaffLogo').classList.add('text-white');

            var source = document.getElementById('children_number');
            
        });

        function applyForLeave(){
           //alert(1);
           //var staff = document.getElementById('staff').value;
           
           var select = document.getElementById('staff');
           var value = select.options[select.selectedIndex].value;
           var description = document.getElementById('description').value;
           var number_of_days = document.getElementById('number_of_days').value;
           var date = document.getElementById('date').value;

           var values = value.split("_");

           if(value.length == 0){
             showError("Error","Please select staff to proceed");
           }
           else if(description.length == 0){
             showError("Error","Please specify leave description");
           }
           else if(number_of_days.length == 0){
            showError("Error","Please specify leave days");
           }
           else if(date.length == 0){
             showError("Error","Please specify leave date");
           }
           else if(number_of_days > parseInt(staffSelectedDaysLeft)){
             showError("Error","Leave days higher than days left");
           }
           else if(number_of_days == 0){
             showError("Error","Number of days must be greater than 0");
           }
           else{
            Swal.fire({
                  title: 'Apply For Leave',
                  text: "Are you sure you want to go on leave?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#0093E9',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes',
                  cancelButtonText: 'No'
               }).then((result) => {  
                     if (result.value) {
                                    
                        var inventoryRequest  = $.ajax({
                           url:"/processLeave",
                           method: "GET",
                           data: {
                                 "bio_data_id" : values[0],
                                 "description" : description,
                                 "date" : date,
                                 "days" : number_of_days,
                                 "_token": "{{ csrf_token() }}",
                           }
                        });
                        inventoryRequest.done(function (response, textStatus, jqXHR){
                           
                           if(response == 'Leave application successful'){
                                 Swal.fire({
                                    title: 'Leave application successful',
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

        function getSelectedStaff(){
         var select = document.getElementById('staff');
         var value = select.options[select.selectedIndex].value;
         var values = value.split("_");

         staffSelectedDaysLeft = values[1];
         document.getElementById('number_of_days').value = values[1];

        }

        function showError(title,message){
                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: message,              
                }); 
        }

        function openOngoingStaffLeave(){
           document.getElementById('ongoingStaffLeave').classList.remove('hidden');
           document.getElementById('applyStaffLeave').classList.add('hidden');
        }

        function closeOngoingStaffLeave(){
           document.getElementById('ongoingStaffLeave').classList.add('hidden');
           document.getElementById('applyStaffLeave').classList.remove('hidden');
        }
   </script>
@endsection

@section('pageContent')
  <div class="w-full h-full relative ">
      <div id="applyStaffLeave" class="w-full h-full absolute  left-0 flex flex-col place-items-center place-content-center">
         <label class="text-2xl font-bold mb-8">Apply For Leave</label>
         <select id="staff" onchange="getSelectedStaff()" style="width: 500px; height:60px;" class="border mt-4 focus:outline-none border-gray-300 rounded-md px-2">
            <option value="" disabled selected>Select Staff</option>
            @foreach ($staff as $data)
               <option value="{{ $data->id }}_{{ $data->leave->days_left }}">{{ $data->other_names }}  {{ $data->surname }}</option>
            @endforeach
         </select>
         <div style="width:500px; height:30px;" class="mt-2">
            <label class="text-sm text-gray-400 mt-2">Description</label>
         </div>
         <textarea style="height: 100px; width: 500px;" id="description" class="border focus:outline-none border-gray-300 rounded-md px-2 "></textarea>
         <div style="width:500px; height:30px;" class="mt-2">
            <label class="text-sm text-gray-400 mt-2">Number Of Days</label>
         </div>
         <input style="height:50px; width:500px;"  id="number_of_days"  class="bg-white focus:outline-none ml-2  px-2 border border-gray-300 rounded-md  bg-inherit  " type="number"/>
         <div style="width:500px; height:30px;" class="mt-2">
            <label class="text-sm text-gray-400 mt-2">Starting Date</label>
         </div> 
         <input style="height:50px; width:500px;"  id="date"  class="bg-white focus:outline-none ml-2  px-2 border border-gray-300 rounded-md  bg-inherit  " type="date"/>
         <button onclick="applyForLeave()" style="width:500px; height:50px;" class="bg-red-400 text-white mt-4 rounded-md">Apply For Leave</button>
         <button onclick="openOngoingStaffLeave()" style="width:500px; height:50px;"  class="bg-red-400 text-white mt-4 rounded-md mt-4">View Leave Status</button>
      </div>
      <div id="ongoingStaffLeave" class="w-full hidden h-full absolute left-0 flex flex-col place-items-center place-content-center">
         <div style="height:60px;" class="w-full flex flex-row  px-8">
            <div class="flex-grow"></div>
            <div style="width:100px; height:60px;" class="flex">
               <div onclick="closeOngoingStaffLeave()" style="width:40px; height:40px;" class="mx-auto my-auto bg-red-400 rounded-full flex">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white mx-auto my-auto">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                 </svg>                  
               </div>
            </div>
         </div>
         <label class="text-2xl font-bold mb-8">Ongoing Staff Leave</label>
         <div class="w-full py-2  mt-4 flex flex-col">
            @foreach ($status as $data)
               <div style="height: 120px;" class="w-full mt-2 flex">
                  <div style="width:500px; height:120px;" class="mx-auto flex flex-row bg-white  drop-shadow-md rounded-md  place-items-center">
                     <div style="width:50px; height:50px;" class="bg-gray-300 rounded-full flex ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                      </div>
                      <div class="ml-8 flex-grow flex flex-col place-content-center">
                          <label class="text-lg text-gray-500">{{ $data->name }}</label>
                          <div class="flex flex-row place-items-center">
                             <label class="text-sm text-gray-400">Leave Date: </label>
                             <label class="text-gray-500 ml-2">{{ $data->date }}</label>
                          </div>
                          <div class="flex flex-row place-items-center">
                              <label class="text-sm text-gray-400">Leave Days: </label>
                              <label class="text-gray-500 ml-2">{{ $data->days }} days</label>
                          </div>
                          <div class="flex flex-row place-items-center">
                              <label class="text-sm text-gray-400">Days Left: </label>
                              <label class="text-gray-500 ml-2">{{ $data->days_left }} days</label>
                          </div>
                         
                         
                      </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
  </div>
 
@endsection