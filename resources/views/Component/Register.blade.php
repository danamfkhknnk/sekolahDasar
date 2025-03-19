<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta email="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SEKOLAH DASAR</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="relative w-full h-screen">
     <div class="absolute inset-0 flex flex-col justify-center text-center items-center  z-20">
        <form class="md:w-1/3 max-w-sm bg-secondary/75 p-10 rounded-xl shadow-lg" action="{{route('aksiregis')}}" method="POST">
            @csrf   
            <div class="text-center ">
              <h3 class="mr-1 mb-2 font-bold text-2xl text-dark uppercase">Register ADMIN</h3>
              @if (Session::has('message'))
              <div class="flex items-center p-2 mb-2 text-sm text-blue-800 rounded-lg bg-red-50 " >
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <p class="alert" {{Session::get('alert-class', 'alert-info')}}>{{Session::get('message')}}</p>
              </div>
              @endif
              @if ($errors->any())
              <div class="flex items-center p-2 mb-2 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                @foreach ($errors->all() as $item)
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">{{$item}}</span>
                </div>
                @endforeach
              </div>
              @endif
            </div>
            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 " type="text" placeholder="Nama" name="name" value="{{ old('name')}}" autoFocus />
            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2 " type="text" placeholder="Email" name="email" value="{{ old('email')}}" autoFocus />
            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " type="password" placeholder="Password" name="password" />
                        
            <div class="text-center">
              <button class="mt-2 bg-primary hover:bg-primary/50 px-6 py-2 text-white uppercase rounded text-xs tracking-wider" email="submit" type="submit">
                Register
              </button>
              <a class="mt-2 bg-red-700 hover:bg-primary/50 px-6 py-2 text-white uppercase rounded text-xs tracking-wider" href="{{route('login')}}">
                Login
               </a>
            </div> 
          </form>
     </div>
    </div>
      </section>
    
      <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>