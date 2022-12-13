<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src={{ URL("js/sweetalert2.all.js") }}></script>
  <link rel="stylesheet" href={{ asset('css/sweetalert2.css') }} />
</head>
<script>
   function showError(title,message){
    console.log(title);
        Swal.fire({
                            icon: 'error',
                            title: title,
                            text: message,
                            
        }); 
    }
</script>
<body>
  <div class="flex w-screen h-screen relative flex">
    <img class="w-screen h-screen absolute" src="{{ asset('images/staff.jpg') }}"/>
    <div class="absolute bg-black opacity-50 w-screen h-screen "></div>
    <div class=" rounded-md w-full h-full absolute flex">
       <div style="height:500px;width:500px;" class="mx-auto my-auto flex px-4  flex-col bg-white rounded-md place-items-center place-content-center">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
          </svg> --}}
          <div style="height:80px; width:80px;" class="rounded-full border-gray-400 border  flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto my-auto text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
          </div>
          <label class="text-black font-bold text-3xl mt-4">Admin Login</label>
          <label class="text-gray-400 mt-2  text-center">Welcome back,Enter your details to get signed in to your account</label>
          <form action="{{ route('loginData') }}" method="POST">
              @csrf
              <div style="width:350px;height:50px;" class="rounded-md border-gray-200 border mt-6 flex flex-row">
                <div style="height:50px; width:60px" class=" flex ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 mx-auto my-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>                  
                </div>
                <div style="height:50px;" class="flex-grow mr-2 ">
                  <input style="height:50px;" type="number" name="pin"  class="w-full  focus:outline-none  px-2   bg-inherit  " type="text"   placeholder="Enter User ID"/>
                </div>
              </div>
              <div style="width:350px;height:50px;" class="rounded-md border-gray-200 border mt-2 flex flex-row">
                <div style="height:50px; width:60px" class=" flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-300 mx-auto my-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>                                   
                </div>
                <div style="height:50px;" class="flex-grow mr-2 ">
                    <input style="height:50px;" type="password" name="password"  class="w-full  focus:outline-none  px-2   bg-inherit  " type="text"   placeholder="Enter Password"/>
                </div>
              </div>
              <button type="submit" style="width: 350px;height:50px;" class="bg-red-500 text-white rounded mt-4 text-lg"> Login</button>
          </form>
          
          <div style="width:350px; height:30px;" class=" flex flex-row place-items-center place-content-center mt-2 ">
            <label class="italic text-gray-400 text-sm">Not having an account yet?</label>
            <a href="register" class="text-red-400 ml-2 font-semibold">Register</a>
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
</body>
</html>