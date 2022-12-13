<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src={{ URL("js/sweetalert2.all.js") }}></script>
    <link rel="stylesheet" href={{ asset('css/sweetalert2.css') }} />
</head>
<script>
   function showError(title,message){
        Swal.fire({
                            icon: 'error',
                            title: title,
                            text: message,
                            
        }); 
    }

    function showSuccess(title,message){
        Swal.fire({
            title: title,
            icon: 'success',
            text: message,
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Okay'
        }).then((result) => {
            if (result.value) {
                window.location = ('/')        
            }                       
        });
    }
</script>
<body>
    <div class="flex w-screen h-screen relative flex">
       <img class="w-screen h-screen absolute" src="{{ asset('images/staff.jpg') }}"/>
       <div class="absolute bg-black opacity-50 w-screen h-screen"></div>
       <div class=" rounded-md w-full h-full absolute flex">
        <div style="height:650px;width:500px;" class="mx-auto my-auto flex px-4  flex-col bg-white rounded-md place-items-center place-content-center">
            <div style="height:80px; width:80px;" class="rounded-full border-gray-400 border  flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto my-auto text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>         
            </div>
            <label class="text-black font-bold text-3xl mt-4">Create Account</label>
            <label class="text-gray-400 mt-2  text-center">Enter your details to create account with us</label>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div style="width:350px;height:50px;" class="rounded-md border-gray-200 border mt-6 flex flex-row">
                    <div style="height:50px; width:60px" class=" flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 mx-auto my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>                  
                    </div>
                    <div style="height:50px;" class="flex-grow mr-2 ">
                    <input style="height:50px;" type="text" name="name"  class="w-full  focus:outline-none  px-2   bg-inherit  " type="text"   placeholder="Enter User Name"/>
                    </div>
                </div>
                <div style="width:350px;height:50px;" class="rounded-md border-gray-200 border mt-2 flex flex-row">
                    <div style="height:50px; width:60px" class=" flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 mx-auto my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                        </svg>                                    
                    </div>
                    <div style="height:50px;" class="flex-grow mr-2 ">
                      <input style="height:50px;" type="number" name="userId"  class="w-full  focus:outline-none  px-2   bg-inherit  " type="text"   placeholder="Enter User ID"/>
                    </div>
                </div>
                <div style="width:350px;height:50px;" class="rounded-md border-gray-200 border mt-2 flex flex-row">
                    <div style="height:50px; width:60px" class=" flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 mx-auto my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>                   
                    </div>
                    <div style="height:50px;" class="flex-grow mr-2 ">
                    <input style="height:50px;" type="password" name="password"  class="w-full  focus:outline-none  px-2   bg-inherit  " type="text"   placeholder="Enter User Password"/>
                    </div>
                </div>
                <div style="width:350px;height:50px;" class="rounded-md border-gray-200 border mt-2 flex flex-row">
                    <div style="height:50px; width:60px" class=" flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 mx-auto my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>                  
                    </div>
                    <div style="height:50px;" class="flex-grow mr-2 ">
                    <input style="height:50px;" type="password" name="confirm_password"  class="w-full  focus:outline-none  px-2   bg-inherit  " type="text"   placeholder="Confirm User Password"/>
                    </div>
                </div>
                <div style="width:350px;height:50px;" class="rounded-md border-gray-200 border mt-2 flex flex-row">
                    <div style="height:50px; width:60px" class=" flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 mx-auto my-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                        </svg>                                      
                    </div>
                    <div style="height:50px;" class="flex-grow mr-2 ">
                     <input style="height:50px;" type="number" name="key"  class="w-full  focus:outline-none  px-2   bg-inherit  " type="text"   placeholder="Super Admin Registration Key"/>
                    </div>
                </div>
                <button type="submit" style="width: 350px;height:50px;" class="bg-red-500 text-white rounded mt-4 text-lg">Register</button>
            </form>
            <div style="width:350px; height:30px;" class=" flex flex-row place-items-center place-content-center mt-2 ">
                <label class="italic text-gray-400 text-sm">Already having an account?</label>
                <a href="/" class="text-red-400 ml-2 font-semibold">Login</a>
            </div>
        </div>
       </div>
    </div>
    @if($errors->any())
     <script>
        showError("{{ $errors->first() }}");
     </script>
     {{-- <h4>{{$errors->first()}}</h4> --}}
    @endif
    @if(Session::has('success'))
      
      <script>
        showSuccess("{{ Session::get('success') }}","Your registration was successful");
      </script>
        {{-- <div class="alert alert-success">

            {{Session::get('success')}}

        </div> --}}

     @endif
</body>
</html>