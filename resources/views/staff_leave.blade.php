
@extends('base')

@section('pageJs')
   <script>
      document.addEventListener("DOMContentLoaded", () => {
        //alert("It works");
        var selection = document.getElementById('leaveStaff');
        selection.classList.remove('bg-gray-100');
        selection.classList.add('bg-red-400');

        document.getElementById('leaveStaffText').classList.remove('text-gray-500');
        document.getElementById('leaveStaffText').classList.add('text-white');

        document.getElementById('leaveStaffLogo').classList.remove('text-gray-500');
        document.getElementById('leaveStaffLogo').classList.add('text-white');
        
    }); 
    function checkLeaveDays(a){
       var current_input = document.getElementById('leave_days_'+a).value;
       var days_gone = document.getElementById('days_gone_'+a).innerHTML;
      //  if(current_input < parseInt(days_gone)){
      //    showError('Error',"Leave days must be higher than days already gone on leave");
      //  }
      //  else{
      //   document.getElementById('leave_days_'+a).value = 0;
      //  }
       //alert(a);
    }

    function showError(title,message){
        Swal.fire({
            icon: 'error',
            title: title,
            text: message,              
        }); 
    }

    function updateLeaveDay(id){
     
      var current_input = document.getElementById('leave_days_'+id).value;
     
      var days_gone = document.getElementById('days_gone_'+id).innerHTML;
      if(current_input.length == 0){
        showError("Error","Leave days must not be empty");
      }
      else if(current_input < parseInt(days_gone)){
        showError('Error',"Leave days must be higher than days already gone on leave");
      }
      else{
        Swal.fire({
          title: 'Update Leave',
          text: "Are you sure you want to update leave?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#0093E9',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes',
          cancelButtonText: 'No'
        }).then((result) => {  
            if (result.value) {
                            
                var inventoryRequest  = $.ajax({
                    url:"/updateLeave",
                    method: "GET",
                    data: {
                        "id" : id,
                        "days" : current_input,
                        "_token": "{{ csrf_token() }}",
                    }
                });
                inventoryRequest.done(function (response, textStatus, jqXHR){
                  
                    if(response == 'Successfully updated leave'){
                        Swal.fire({
                            title: 'Successfully updated leave',
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



   </script>
@endsection

@section('pageContent')
  <div class="w-full h-full   flex flex-col overflow-y-scroll place-items-center place-content-center">
     <label class="text-2xl font-bold mb-8">Staff Leave</label>
     @foreach ($leave as $data)
        <div style="height: 100px;" class="w-full  mt-2 flex px-2">
           <div style="width:900px; height:100px;" class="bg-white mx-auto drop-shadow-md rounded-md flex flex-row place-items-center pl-2">
              <div style="width:50px; height:50px;" class="bg-gray-300 rounded-full flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
              </div>
              <div class="ml-8 flex-grow flex flex-col place-content-center">
                <label class="text-lg text-gray-500">{{ $data->surname }} {{ $data->other_names }}</label>
                <label class="text-gray-400">{{ $data->telephone }} </label>
              </div>
              <div style="height:50px; width:200px;" class=" flex flex-row place-items-center">
                 <label class="text-sm text-gray-400">Leave Days : </label>
                 <input style="height:50px; width:100px;" id="leave_days_{{ $data->leave->id }}" oninput="checkLeaveDays('{{ $data->leave->id }}')" type="number" name="userId"  class=" focus:outline-none ml-2  px-2 border border-gray-200 rounded-md  bg-inherit  " type="number" placeholder={{ $data->leave->number_of_days }} /> 
              </div>
              <div style="height: 100px;" class="px-2 mr-2  flex flex-row place-items-center">
                <label class="text-sm text-gray-400">Days Gone :</label>
                <label id="days_gone_{{ $data->leave->id }}" class="ml-2 text-xl">{{ $data->leave->days_gone }}</label>
              </div>
              <div style="height: 100px;" class="px-2 mr-2  flex flex-row place-items-center">
                <label class="text-sm text-gray-400">Days Left :</label>
                <label class="ml-2 text-xl">{{ $data->leave->days_left }}</label>
              </div>
              <button style="height:40px; width:100px;" onclick="updateLeaveDay({{ $data->leave->id }})" class="bg-red-400 rounded-full text-white mr-8 hover:bg-white hover:text-red-400">Update</button>
           </div>
        </div>
     @endforeach
  </div>
@endsection