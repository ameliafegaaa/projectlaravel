<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-7">
            <div class="h-96 flex justify-center items-center rounded-lg overflow-hidden">
                <img class="h-96 rounded-lg hover:scale-105 duration-100 ease-in" src="{{ $shoes[0]["shoes_image"] }}" alt="Shoes">
            </div>
            <div>
                <div class="flex flex-col space-y-5">
                    <h1 class="text-gray-900 text-4xl">{{ $shoes[0]['shoes_name'] }}</h1>
                    <h1 class="text-red-900 text-2xl font-bold"><span class="text-sm">Rp</span>{{ str_replace(',','.', number_format($shoes[0]['shoes_price'])) }}</h1>
                    <div>
                        <p class="text-justify text-ellipsis overflow-hidden">
                            {{ $shoes[0]['shoes_description'] }}
                        </p>
                    </div>
                    <form action="{{ url('/checkout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="shoes_id" value="{{ $shoes[0]["shoes_id"] }}">
                        <button type="submit" class="text-white focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                        data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Description</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="reviews-tab" data-tabs-target="#reviews" type="button" role="tab"
                        aria-controls="reviews" aria-selected="false">Rating & Reviews</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <p class="text-sm text-gray-700">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit minima id aliquam architecto. Quibusdam asperiores dolorem laboriosam vero ut, excepturi reiciendis est ab eligendi hic velit vel. Impedit, facere a. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates consectetur quos saepe voluptatem tempore cumque eius. Est dolorum exercitationem necessitatibus molestiae beatae quibusdam ducimus, optio vel, aliquid, consectetur sint laborum!</p>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="reviews" role="tabpanel"
                aria-labelledby="reviews-tab">
                <div class="flex gap-3 border-y py-5">
                    <img class="w-8 h-8 flex justify-center items-center rounded-full mt-1" src="https://i.pinimg.com/736x/1d/81/e0/1d81e065de302045e5d8709bef235ac4.jpg" alt="">
                    <div>
                        <h1>John Doe</h1>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-amber-400"></span>
                        <p class="text-sm text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus explicabo nihil illo fugiat ab hic dolor aliquam doloribus, repudiandae quidem harum pariatur quod ullam voluptates alias tempore repellendus maiores. Sapiente?</p>
                    </div>
                </div>
                <div class="flex gap-3 border-y py-5">
                    <img class="w-8 h-8 flex justify-center items-center rounded-full mt-1" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRa7SoxUNZrpxeiBAXITg5_xpoxSmXHclpaIQ&usqp=CAU" alt="">
                    <div>
                        <h1>John Cena</h1>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-amber-400"></span>
                        <span class="fa fa-star text-gray-300"></span>
                        <p class="text-sm text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus explicabo nihil illo fugiat ab hic dolor aliquam doloribus, repudiandae quidem harum pariatur quod ullam voluptates alias tempore repellendus maiores. Sapiente? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus quo inventore accusamus doloribus omnis iusto quaerat tenetur voluptas, laboriosam consequatur neque et minima tempore reiciendis suscipit similique pariatur obcaecati amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-gray-900 mt-28">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="/" class="flex items-center">
                        <span
                            class="self-center text-2xl font-semibold whitespace-nowrap text-white">Shoes Store</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-white">Follow us</h2>
                        <ul class="text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="/" class="hover:underline ">Instagram</a>
                            </li>
                            <li class="mb-4">
                                <a href="/" class="hover:underline">Facebook</a>
                            </li>
                            <li class="mb-4">
                                <a href="/" class="hover:underline">Twitter</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold uppercase text-white">Legal</h2>
                        <ul class="text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm sm:text-center text-gray-400">© 2023 <a
                        href="/" class="hover:underline">Shoes Store</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Instagram page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
</body>

</html>