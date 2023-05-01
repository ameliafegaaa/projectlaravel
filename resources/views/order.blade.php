<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkout</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-50 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Shoes
                    Store</span>
            </a>
            <div class="flex md:order-2 space-x-3">
                <div class="flex space-x-3">
                    @if (session()->has('user'))
                    <button id="profile" data-dropdown-toggle="dropdown"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                        type="button">Profile&nbsp;<i class="fa fa-chevron-down text-sm"></i></button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ session('user')->name }}</div>
                            <div class="font-medium truncate">{{ session('user')->email }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="profile">
                            <li>
                                <a href="{{ url('/order_history') }}" class="block px-4 py-2 hover:bg-gray-100">Order History</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}" class="block px-4 py-2 hover:bg-gray-100">Sign out</a>
                            </li>
                        </ul>
                    </div>

                    @else
                    <a href="{{ url('/login') }}">
                        <button type="button"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Login</button>
                    </a>
                    <a href="{{ url('/register') }}">
                        <button type="button"
                            class="focus:outline-none text-red-700 hover:text-white outline-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">Register</button>
                    </a>
                    @endif
                </div>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 dark:text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{ url('/') }}"
                            class="block py-2 pl-3 pr-4 rounded md:hover:text-red-500 text-gray-900 hover:bg-gray-700 hover:text-gray-900 md:hover:bg-transparent border-gray-700">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/shoeslist') }}"
                            class="block py-2 pl-3 pr-4 rounded md:hover:text-red-500 text-gray-900 hover:bg-gray-700 hover:text-gray-900 md:hover:bg-transparent border-gray-700">Shoes</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 rounded md:hover:text-red-500 text-gray-900 hover:bg-gray-700 hover:text-gray-900 md:hover:bg-transparent border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 rounded md:hover:text-red-500 text-gray-900 hover:bg-gray-700 hover:text-gray-900 md:hover:bg-transparent border-gray-700">Help</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 rounded md:hover:text-red-500 text-gray-900 hover:bg-gray-700 hover:text-gray-900 md:hover:bg-transparent border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container mx-auto mt-28 mb-6 px-4 md:px-12">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden p-10">
            <h1 class="text-center text-2xl md:text-3xl text-gray-800 font-bold">Checkout Success!</h1>
            <center>
                <img class="w-[35rem]" src="{{ asset('images/Receipt-pana.png') }}" alt="pana">
            </center>
            <p class="text-center text-sm md:text-lg text-gray-800 my-3">Thank you for your payment. An automated payment receipt will be sent to your email.</p>
            <div class="flex justify-center">
                <button type="button" onclick="location.href='/'" id="checkout-trigger" class="text-white focus:outline-none focus:ring-4 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900">Back To Home</button>
            </div>
        </div>
    </section>
    <br><br><br><br>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $('#checkout-trigger').on('click', () => {
            $('#checkout-btn').click();
        });
    </script>
</body>

</html>