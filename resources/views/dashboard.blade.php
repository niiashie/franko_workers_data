@extends('base')

@section('pageJs')
   <script>
       document.addEventListener("DOMContentLoaded", () => {
            //alert("It works");
            var selection = document.getElementById('dashboard');
            selection.classList.remove('bg-gray-100');
            selection.classList.add('bg-red-400');

            document.getElementById('dashboardText').classList.remove('text-gray-500');
            document.getElementById('dashboardText').classList.add('text-white');

            document.getElementById('dashboardLogo').classList.remove('text-gray-500');
            document.getElementById('dashboardLogo').classList.add('text-white');
       
        });

   </script>
@endsection

@section('pageContent')
    <div class="w-full h-full flex flex-col px-8 place-content-center place-items-center">
       <label class="text-2xl font-bold">Dashboard</label>
       <div style="height:150px;" class="w-full flex flex-row">
          <div style="height: 150px;" class="w-1/3 px-2 py-2">
             <div class="w-full h-full bg-white  drop-shadow-md rounded-md relative">
                 
                 <div class="flex flex-col absolute top-4 left-4">
                     <div style="width:50px; height:50px;" class="rounded-full flex bg-red-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white mx-auto my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                     </div>
                     <label class="mt-2 text-gray-400 text-sm">Staff Count</label>
                 </div>
                 <label class="absolute right-4 bottom-4 text-2xl font-bold">{{ $staff_count }}</label>
             </div>
          </div>
          <div style="height: 150px;" class="w-1/3 px-2 py-2">
            <div class="w-full h-full bg-white  drop-shadow-md rounded-md relative">
                <div class="flex flex-col absolute top-4 left-4">
                    <div style="width:50px; height:50px;" class="rounded-full flex bg-red-400">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="w-6 h-6 text-white mx-auto my-auto">
                            <path fill="currentColor" d="M15,4A4,4 0 0,1 19,8A4,4 0 0,1 15,12A4,4 0 0,1 11,8A4,4 0 0,1 15,4M15,5.9A2.1,2.1 0 0,0 12.9,8A2.1,2.1 0 0,0 15,10.1C16.16,10.1 17.1,9.16 17.1,8C17.1,6.84 16.16,5.9 15,5.9M15,13C17.67,13 23,14.33 23,17V20H7V17C7,14.33 12.33,13 15,13M15,14.9C12,14.9 8.9,16.36 8.9,17V18.1H21.1V17C21.1,16.36 17.97,14.9 15,14.9M5,13.28L2.5,14.77L3.18,11.96L1,10.08L3.87,9.83L5,7.19L6.11,9.83L9,10.08L6.8,11.96L7.45,14.77L5,13.28Z" />
                        </svg> 
                    </div>
                    <label class="mt-2 text-gray-400 text-sm">Pension Staff Count</label>
                </div>
                <label class="absolute right-4 bottom-4 text-2xl font-bold">{{ $pension_count }}</label>
               
            </div>
          </div>
          <div style="height: 150px;" class="w-1/3 px-2 py-2">
            <div class="w-full h-full bg-white  drop-shadow-md rounded-md relative">
                <div class="flex flex-col absolute top-4 left-4">
                    <div style="width:50px; height:50px;" class="rounded-full flex bg-red-400">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="w-6 h-6 text-white mx-auto my-auto">
                            <path fill="currentColor" d="M17 17V21H19V17H21L18 14L15 17H17M11 4C8.8 4 7 5.8 7 8S8.8 12 11 12 15 10.2 15 8 13.2 4 11 4M11 6C12.1 6 13 6.9 13 8S12.1 10 11 10 9 9.1 9 8 9.9 6 11 6M11 13C8.3 13 3 14.3 3 17V20H12.5C12.2 19.4 12.1 18.8 12 18.1H4.9V17C4.9 16.4 8 14.9 11 14.9C11.5 14.9 12 15 12.5 15C12.8 14.4 13.1 13.8 13.6 13.3C12.6 13.1 11.7 13 11 13" />
                        </svg>
                    </div>
                    <label class="mt-2 text-gray-400 text-sm">Fast Approaching Pension Staff Count</label>
                </div>
                <label class="absolute right-4 bottom-4 text-2xl font-bold">{{ $fast_approaching }}</label>
             
            </div>
          </div>
       </div>
       <div style="height:150px;" class="w-full flex flex-row mt-4">
            <div style="height: 150px;" class="w-1/3 px-2 py-2">
                <div class="w-full h-full bg-white  drop-shadow-md rounded-md relative">
                    <div class="flex flex-col absolute top-4 left-4">
                        <div style="width:50px; height:50px;" class="rounded-full flex bg-red-400">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="w-6 h-6 text-white mx-auto my-auto">
                                <path fill="currentColor" d="M18 16H14V18H18V20L21 17L18 14V16M11 4C8.8 4 7 5.8 7 8S8.8 12 11 12 15 10.2 15 8 13.2 4 11 4M11 6C12.1 6 13 6.9 13 8S12.1 10 11 10 9 9.1 9 8 9.9 6 11 6M11 13C8.3 13 3 14.3 3 17V20H12.5C12.2 19.4 12.1 18.8 12 18.1H4.9V17C4.9 16.4 8 14.9 11 14.9C11.5 14.9 12 15 12.5 15C12.8 14.4 13.1 13.8 13.6 13.3C12.6 13.1 11.7 13 11 13" />
                            </svg>
                        </div>
                        <label class="mt-2 text-gray-400 text-sm">Medium Approaching Pension Staff Count</label>
                    </div>
                    <label class="absolute right-4 bottom-4 text-2xl font-bold">{{ $medium_approaching }}</label>
                    
                </div>
            </div>
            <div style="height: 150px;" class="w-1/3 px-2 py-2">
                <div class="w-full h-full bg-white  drop-shadow-md rounded-md relative">
                    <div class="flex flex-col absolute top-4 left-4">
                        <div style="width:50px; height:50px;" class="rounded-full flex bg-red-400">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="w-6 h-6 text-white mx-auto my-auto">
                                <path fill="currentColor" d="M19 18V14H17V18H15L18 21L21 18H19M11 4C8.8 4 7 5.8 7 8S8.8 12 11 12 15 10.2 15 8 13.2 4 11 4M11 6C12.1 6 13 6.9 13 8S12.1 10 11 10 9 9.1 9 8 9.9 6 11 6M11 13C8.3 13 3 14.3 3 17V20H12.5C12.2 19.4 12.1 18.8 12 18.1H4.9V17C4.9 16.4 8 14.9 11 14.9C11.5 14.9 12 15 12.5 15C12.8 14.4 13.1 13.8 13.6 13.3C12.6 13.1 11.7 13 11 13" />
                            </svg>
                        </div>
                        <label class="mt-2 text-gray-400 text-sm">Low Approaching Pension Staff Count</label>
                    </div>
                    <label class="absolute right-4 bottom-4 text-2xl font-bold">{{ $low_approaching }}</label>
                </div>
            </div>
            <div style="height: 150px;" class="w-1/3 px-2 py-2">
                <div class="w-full h-full bg-white  drop-shadow-md rounded-md relative">
                    <div class="flex flex-col absolute top-4 left-4">
                        <div style="width:50px; height:50px;" class="rounded-full flex bg-red-400">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24" class="w-6 h-6 text-white mx-auto my-auto">
                                <path fill="currentColor" d="M19,7H11V14H3V5H1V20H3V17H21V20H23V11A4,4 0 0,0 19,7M7,13A3,3 0 0,0 10,10A3,3 0 0,0 7,7A3,3 0 0,0 4,10A3,3 0 0,0 7,13Z" />
                            </svg>
                        </div>
                        <label class="mt-2 text-gray-400 text-sm">Staff On Leave Count</label>
                    </div>
                    <label class="absolute right-4 bottom-4 text-2xl font-bold">{{ $leave }}</label>
                </div>
            </div>
       </div>
    </div>
@endsection