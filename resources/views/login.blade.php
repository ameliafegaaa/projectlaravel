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
      <div class="w-96 glass shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <h2 class="text-center text-gray-50 text-2xl font-semibold mb-4">Login</h2>
        <form action="{{ url('auth/signin') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label class="block text-gray-50 font-bold mb-2" for="email">
              Email
            </label>
            <input class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email">
          </div>
          <div class="mb-6">
            <label class="block text-gray-50 font-bold mb-2" for="password">
              Password
            </label>
            <input class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password">
          </div>
          <div class="flex items-center justify-center">
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-10 py-2.5">Login</button>
          </div>
        </form>
      </div>
    </div>
  </body>
  
  </html>