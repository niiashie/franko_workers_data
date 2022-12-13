<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src={{ URL("js/sweetalert2.all.js") }}></script>
    <script type="text/javascript" src="{{ URL("js/jquery.js") }}"></script> 
    <link rel="stylesheet" href={{ asset('css/sweetalert2.css') }} />
    <title>Document</title>
</head>
@yield('pageJs')
<body>
    <div class="flex w-screen h-screen relative flex flex-row bg-gray-50">
       <div style="width:300px;" class="h-full bg-white shadow-lg place-items-center flex flex-col">
            <img style="width:120px;height:120px;" class="rounded-full mt-8" src="{{ asset('images/frankatson.jpeg') }}"/>
            <label class="text-gray-500 mt-4">Staff Records System</label>
            <div style="width: 100px;height:60px;"></div>
            <a href="/dashboard">
                <div style="width:250px;height:50px;" id="dashboard" class="bg-gray-100 hover:bg-red-400 hover:text-sky-400 rounded-full flex flex-row  place-items-center px-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" id="dashboardLogo" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg> 
                    <label style="margin-left: 20px;" class="text-gray-500 " id="dashboardText">Dashboard</label>
                </div>
            </a>
            <a href="/addStaff">
                <div style="width:250px;height:50px;" id="addStaff" class="bg-gray-100 mt-4 hover:bg-red-400 hover:text-sky-400 rounded-full flex flex-row  place-items-center px-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" id="addStaffLogo" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                    
                    <label style="margin-left: 20px;" id="addStaffText" class="text-gray-500 ">Add Staff</label>
                </div>
            </a>
            <a href="/getStaffData">
                <div style="width:250px;height:50px;" id="registeredStaff" class="bg-gray-100 mt-4 hover:bg-red-400 hover:text-sky-400 rounded-full flex flex-row  place-items-center px-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" id="registeredStaffLogo" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                    </svg> 
                    <label style="margin-left: 20px;" id="registeredStaffText" class="text-gray-500 ">Registered Staff</label>
                </div>
            </a>
            <a href="/pension">
                <div style="width:250px;height:50px;" id="pensionStaff" class="bg-gray-100 mt-4 hover:bg-red-400 hover:text-sky-400 rounded-full flex flex-row  place-items-center px-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" id = "pensionStaffLogo" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>  
                    <label style="margin-left: 20px;" id="pensionStaffText" class="text-gray-500 ">Pension Status</label>
                </div>
            </a>
            <a href="/staffLeave">
                <div style="width:250px;height:50px;" id="leaveStaff" class="bg-gray-100 mt-4 hover:bg-red-400 hover:text-sky-400 rounded-full flex flex-row  place-items-center px-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="leaveStaffLogo" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m0-3l-3-3m0 0l-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                    </svg>
                    
                    
                    <label style="margin-left: 20px;" id="leaveStaffText" class="text-gray-500 ">Staff Leave</label>
                </div>
            </a>
            <a href="/applyLeave">
                <div style="width:250px;height:50px;" id="applyLeaveStaff" class="bg-gray-100 mt-4 hover:bg-red-400 hover:text-sky-400 rounded-full flex flex-row  place-items-center px-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="applyLeaveStaffLogo" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                    <label style="margin-left: 20px;" id="applyLeaveStaffText" class="text-gray-500 ">Apply For Leave</label>
                </div>
            </a>
         
              
       </div>
       <div class="flex-grow h-full flex flex-col">
          <div style="height: 60px;" class="w-full shadow-md bg-white flex">
              {{-- <div style="height:40px; width:350px;" class="rounded-full border border-gray-200  flex flex-row mx-auto my-auto place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input style="height:50px;" type="text" name="pin"  class="w-full flex-grow text-sm  focus:outline-none  px-4 text-gray-500  bg-inherit  " type="text"   placeholder="Search Staff Here"/>  
              </div> --}}
              <label class="mx-auto my-auto text-gray-400 font-bold">
                @php
                    echo "Today is " . date("Y/m/d") . "<br>";
                @endphp
              </label>
          </div>
          <div class="flex-grow overflow-y-scroll">
             @yield('pageContent')
          </div>
          <div style="height:30px;" class="w-full bg-white shadow-lg"></div>
       </div>
    </div>
</body>
</html>