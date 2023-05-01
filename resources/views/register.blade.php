<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-cover" style="background-image: url({{ asset('images/14731307_rm218-bb-07.jpg') }})">
    <div class="min-h-screen flex items-center justify-center">
      <div class="w-[35rem] glass shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h2 class="text-center text-gray-50 text-2xl font-semibold mb-14">Sign Up</h2>
        <form action="{{ url('auth/signup') }}" method="POST" class="grid md:grid-cols-2 gap-3">
          @csrf
          <div class="mb-2.5">
            <label class="block text-gray-50 font-bold mb-2" for="nama">
              Nama
            </label>
            <input class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="nama" type="text" placeholder="Nama">
            @if ($errors->has('name'))
                <i class="text-red-600" role="alert">
                    <strong>*{{ $errors->first('name') }}</strong>
                </i>
            @endif
          </div>
          <div class="mb-2.5">
            <label class="block text-gray-50 font-bold mb-2" for="phone_number">
              Phone Number
            </label>
            <input class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="phone_number" id="phone_number" type="text" placeholder="Phone Number">
            @if ($errors->has('phone_number'))
                <i class="text-red-600" role="alert">
                    <strong>*{{ $errors->first('phone_number') }}</strong>
                </i>
            @endif
          </div>
          <div class="mb-2.5">
            <label class="block text-gray-50 font-bold mb-2" for="email">
              Email
            </label>
            <input class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" id="email" type="email" placeholder="Email">
            @if ($errors->has('email'))
                <i class="text-red-600" role="alert">
                    <strong>*{{ $errors->first('email') }}</strong>
                </i>
            @endif
          </div>
          <div class="mb-6">
            <label class="block text-gray-50 font-bold mb-2" for="password">
              Password
            </label>
            <input class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="Password">
            @if ($errors->has('password'))
                <i class="text-red-600" role="alert">
                    <strong>*{{ $errors->first('password') }}</strong>
                </i>
            @endif
          </div>
          <div class="col-span-2 flex items-center justify-center">
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-2.5">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </body>
  
  </html>