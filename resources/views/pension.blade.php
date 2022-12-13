@extends('base')

@section('pageJs')
  <script>
     document.addEventListener("DOMContentLoaded", () => {
      //alert("It works");
      var selection = document.getElementById('pensionStaff');
      selection.classList.remove('bg-gray-100');
      selection.classList.add('bg-red-400');

      document.getElementById('pensionStaffText').classList.remove('text-gray-500');
      document.getElementById('pensionStaffText').classList.add('text-white');

      document.getElementById('pensionStaffLogo').classList.remove('text-gray-500');
      document.getElementById('pensionStaffLogo').classList.add('text-white');
       
    });

    function viewPensionStaff(){
      document.getElementById('working_staff').classList.add('hidden');
      document.getElementById('pension_staff').classList.remove('hidden');
    }

    function closePensionStaff(){
      document.getElementById('working_staff').classList.remove('hidden');
      document.getElementById('pension_staff').classList.add('hidden');
    }


  </script>
@endsection

@section('pageContent')
    <div class="w-full h-full relative ">
        <div id="working_staff" class="w-full h-full  absolute left-0  flex flex-col overflow-y-scroll place-items-center place-content-center">
          <label class="text-2xl font-bold">Working Staff</label>
          <div style="height:50px; width:700px;" class="mt-4 flex flex-row">
             <div class="w-1/3  flex flex-row place-content-center place-items-center">
                <div style="width: 30px; height:30px;" class="bg-red-400 flex rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto my-auto text-white">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                  </svg>
                </div>
                <label class="text-xs text-gray-400 ml-2">Fast Approaching Pension</label>
             </div>
             <div class="w-1/3 flex flex-row place-content-center place-items-center">
                <div style="width: 30px; height:30px;" class="bg-yellow-500 flex rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto my-auto text-white">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                  </svg>
                </div>
                <label class="text-xs text-gray-400 ml-2">Medium Approaching Pension</label>
             </div>
             <div class="w-1/3 flex flex-row place-content-center place-items-center">
                <div style="width: 30px; height:30px;" class="bg-green-500 flex rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto my-auto text-white">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                  </svg>
                </div>
                <label class="text-xs text-gray-400 ml-2">Low Approaching Pension</label>
             </div>
          </div>
          <div class="w-full py-2  px-4 flex flex-row">
             <div class="w-1/3 py-2 px-4  flex flex-col">
                 <label>(45 <-> 59) Years</label>
                 @foreach ($fast as $fastData)
                   <div style="height: 70px;" class="mt-2 bg-white  drop-shadow-md rounded-md flex flex-row place-items-center">
                      <div style="width:50px; height:50px;" class="bg-gray-300 rounded-full flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                      </div>
                      <div class="ml-8 flex-grow flex flex-col place-content-center">
                          <label class="text-lg text-gray-500">{{ $fastData->name }}</label>
                          <label class="text-gray-400">{{ $fastData->years }} years</label>
                      </div>
                  </div>
                 @endforeach
             </div>
             <div class="w-1/3 py-2 px-4  flex flex-col ">
                <label>(35 <-> 44) Years</label>
                @foreach ($medium as $mediumData)
                  <div style="height: 70px;" class="mt-2 bg-white  drop-shadow-md rounded-md flex flex-row place-items-center">
                    <div style="width:50px; height:50px;" class="bg-gray-300 rounded-full flex ml-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    </div>
                    <div class="ml-8 flex-grow flex flex-col place-content-center">
                        <label class="text-lg text-gray-500">{{ $mediumData->name }}</label>
                        <label class="text-gray-400">{{ $mediumData->years }} years</label>
                    </div>
                    <div  style="width:70px; height:70px;" class="bg-yellow-500 rounded-r-md flex">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto my-auto text-white">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                      </svg>
                    </div>
                  </div>
                @endforeach
             </div>
             <div class="w-1/3 py-2 px-4  flex flex-col  ">
                <label>Below 35 Years</label>
                 @foreach ($low as $lowData)
                    <div style="height: 70px;" class="mt-2 bg-white  drop-shadow-md rounded-md flex flex-row place-items-center">
                      <div style="width:50px; height:50px;" class="bg-gray-300 rounded-full flex ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                      </div>
                      <div class="ml-8 flex-grow flex flex-col place-content-center">
                          <label class="text-lg text-gray-500">{{ $lowData->name }}</label>
                          <label class="text-gray-400">{{ $lowData->years }} years</label>
                      </div>
                      <div  style="width:70px; height:70px;" class="bg-green-500 rounded-r-md flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto my-auto text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                        </svg>      
                      </div>
                    </div>
                 @endforeach
             </div>
          </div>
          <button style="width: 200px; height:50px;" class="rounded-full mt-8 bg-red-400 text-white" onclick="viewPensionStaff()">
              View Staff On Pension
          </button>
        </div>
       <div id="pension_staff" class="w-full h-full absolute hidden left-0  flex flex-col overflow-y-scroll place-items-center place-content-center">
          <div style="height:60px;" class="w-full flex flex-row  px-8">
             <div class="flex-grow"></div>
             <div style="width:100px; height:60px;" class="flex">
                <div onclick="closePensionStaff()" style="width:40px; height:40px;" class="mx-auto my-auto bg-red-400 rounded-full flex">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white mx-auto my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>                  
                </div>
             </div>
          </div>
          <label class="text-2xl font-bold">Pension Staff</label>
          <div class="w-full py-2  mt-4 ">
             @foreach ($pension as $data)
                <div style="height:70px;" class="w-full flex mt-2">
                  <div style="width:500px; height:70px;" class="mx-auto flex flex-row bg-white  drop-shadow-md rounded-md  place-items-center">
                    <div style="width:50px; height:50px;" class="bg-gray-300 rounded-full flex ml-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mx-auto my-auto"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    </div>
                    <div class="ml-8 flex-grow flex flex-col place-content-center">
                        <label class="text-lg text-gray-500">{{ $data->name }}</label>
                        <label class="text-gray-400">{{ $data->years }} years</label>
                    </div>
                  </div>
                </div>
             @endforeach
          </div>
       </div>
    </div>
@endsection