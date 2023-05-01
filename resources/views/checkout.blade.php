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
        <form action="{{ url('/checkout/process') }}" method="post"
            class="grid sm:grid-cols-1 md:grid-cols-3 grid-flow-col gap-5 mb-7" id="form">
            @csrf
            <input type="hidden" name="total" value="{{ ($shoes[0]['shoes_price'] + 79000) }}">
            <input type="hidden" name="shoes_id" value="{{ $shoes[0]['shoes_id'] }}">
            <div class="col-span-1 md:col-span-2 rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gray-300 shadow-inner">
                    <div class="bg-white p-7 rounded-md">
                        <h1 class="text-xl text-gray-800 font-bold tracking-wide mb-5">Shipping Data</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" id="email" name="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ session('user')->email }}" placeholder="name@mail.com" readonly>
                            </div>
                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ session('user')->name }}" placeholder="Name" readonly>
                            </div>
                            <div class="mb-6">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">Phone
                                    Number</label>
                                <input type="tel" id="phone" name="phone_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ session('user')->phone_number }}" placeholder="Phone number" readonly>
                            </div>
                            <div class="mb-6">
                                <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900">Postal
                                    Code</label>
                                <input type="text" id="postal_code" name="postal_code"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Postal Code" maxlength="5" required>
                            </div>
                            <div class="col-span-2">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                                <textarea type="text" id="address" name="address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Address" rows="5" required></textarea>
                            </div>
                        </div>
                        <hr class="mt-7">
                        <div id="accordion-flush" data-accordion="collapse"
                            data-active-classes="bg-white dark:bg-gray-900 text-gray-900"
                            data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 "
                                    data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                    aria-controls="accordion-flush-body-1">
                                    <h1 class="text-xl font-bold tracking-wide mb-5">Payment</h1>
                                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                <div class="grid grid-cols-2 gap-3 my-5">
                                    <div class="flex items-center pl-4 border border-gray-200 rounded">
                                        <input id="payment_method-1" type="radio" value="Bank Transfer"
                                            name="payment_method"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            required>
                                        <label for="payment_method-1"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bank
                                            Transfer</label>
                                    </div>
                                    <div class="flex items-center pl-4 border border-gray-200 rounded">
                                        <input id="payment_method-2" type="radio" value="Cash On Delivery"
                                            name="payment_method"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2"
                                            required>
                                        <label for="payment_method-2"
                                            class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash
                                            On Delivery</label>
                                    </div>
                                </div>
                            </div>
                            <h2 class="block md:hidden" id="accordion-flush-heading-2">
                                <button type="button"
                                    class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 "
                                    data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                    aria-controls="accordion-flush-body-2">
                                    <h1 class="text-xl font-bold tracking-wide mb-5">Order Overview</h1>
                                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-2" class="hidden md:hidden"
                                aria-labelledby="accordion-flush-heading-2">
                                <div class="bg-white rounded-2xl shadow-xl p-7">
                                    <div class="grid grid-cols-3 gap-10">
                                        <div class="w-28 h-28 rounded-md overflow-hidden">
                                            <img class="bg-cover" src="{{ $shoes[0]['shoes_image'] }}" alt="">
                                        </div>
                                        <div class="col-span-2">
                                            <h1 class="text-sm text-gray-800 font-semibold">{{ $shoes[0]["shoes_name"]
                                                }}</h1>
                                            <h1 class="text-sm text-red-700"><span class="text-xs">Rp</span>{{
                                                str_replace(',','.', number_format($shoes[0]['shoes_price'])) }}
                                            </h1>
                                        </div>
                                    </div>
                                    <hr class="mt-4 mb-7">
                                    <div class="flex justify-between mb-4">
                                        <h1 class="text-gray-500">Subtotal</h1>
                                        <h1 class="text-gray-700"><span class="text-sm">Rp</span>{{ str_replace(',','.',
                                            number_format($shoes[0]['shoes_price'])) }}</h1>
                                    </div>
                                    <div class="flex justify-between mb-4">
                                        <h1 class="text-gray-500">Shipping</h1>
                                        <h1 class="text-gray-700"><span class="text-sm">Rp</span>79.000</h1>
                                    </div>
                                    <hr class="mt-4 mb-7">
                                    <div class="flex justify-between mb-4">
                                        <h1 class="text-gray-700">Total</h1>
                                        <h1 class="text-xl text-gray-700 font-bold"><span class="text-sm">Rp
                                            </span>{{ str_replace(',','.', number_format(($shoes[0]['shoes_price'] +
                                            79000))) }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block md:hidden mt-7 mb-2">
                            <button type="submit" id="checkout-btn"
                                class="w-full text-white focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="bg-white rounded-2xl shadow-xl p-7">
                    <h1 class="text-xl text-gray-800 font-bold tracking-wide mb-5">Order Overview</h1>
                    <div class="grid grid-cols-3">
                        <div class="w-28 h-28 rounded-md overflow-hidden">
                            <img class="bg-cover" src="{{ $shoes[0]['shoes_image'] }}" alt="">
                        </div>
                        <div class="col-span-2">
                            <h1 class="text-sm text-gray-800 font-semibold">{{ $shoes[0]["shoes_name"] }}
                            </h1>
                            <h1 class="text-sm text-red-700"><span class="text-xs">Rp</span>{{ str_replace(',','.',
                                number_format($shoes[0]['shoes_price'])) }}</h1>
                        </div>
                    </div>
                    <hr class="mt-4 mb-7">
                    <div class="flex justify-between mb-4">
                        <h1 class="text-gray-400">Subtotal</h1>
                        <h1 class="text-gray-700"><span class="text-sm">Rp</span>{{ str_replace(',','.',
                            number_format($shoes[0]['shoes_price'])) }}</h1>
                    </div>
                    <div class="flex justify-between mb-4">
                        <h1 class="text-gray-400">Shipping</h1>
                        <h1 class="text-gray-700"><span class="text-sm">Rp</span>79.000</h1>
                    </div>
                    <hr class="mt-4 mb-7">
                    <div class="flex justify-between mb-4">
                        <h1 class="text-gray-700">Total</h1>
                        <h1 class="text-xl text-gray-700 font-bold"><span class="text-sm">Rp </span>{{
                            str_replace(',','.', number_format(($shoes[0]['shoes_price'] + 79000))) }}</h1>
                    </div>
                    <div class="mb-2">
                        <button type="button" id="checkout-trigger"
                            class="w-full text-white focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900">Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <br><br><br><br>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $('#checkout-trigger').on('click', () => {
            $('#checkout-btn').click();
        });
    </script>
</body>

</html>