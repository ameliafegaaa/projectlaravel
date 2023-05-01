<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-50 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/dashboard" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Dashboard</span>
            </a>
            <div class="flex md:order-2 space-x-3">
                <button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                    aria-controls="drawer-navigation" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-50 bg-red-600 rounded-lg focus:outline-none focus:ring-2 hover:bg-red-700 focus:ring-red-600"
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
        </div>
    </nav>


    <!-- drawer component -->
    <div id="drawer-navigation"
        class="fixed top-0 left-0 z-50 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white"
        tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase">Menu
        </h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
            <i class="fa fa-times text-xl px-1.5"></i>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fa fa-dashboard text-gray-500 text-lg"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/users" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fa fa-user text-gray-500 text-lg"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/shoes" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fa fa-shopping-bag text-gray-500 text-lg"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Shoes</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/sales" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fa fa-money text-gray-500 text-lg"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Sales</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                        <i class="fa fa-sign-out text-gray-500 text-lg"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <section class="container mx-auto mt-28 mb-6 px-4 md:px-12">

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <i class="fa fa-home mr-1"></i>
                        Home
                    </a>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-5">
            <div class="flex items-center justify-between bg-gradient-to-br from-red-600 to-red-900 px-5 py-7 rounded-xl shadow-md text-slate-50">
                <div>
                    <i class="fa fa-users text-7xl"></i>
                </div>
                <div>
                    <h1 class="text-7xl text-right">{{ count($users) }}</h1>
                    <h1 class="text-right">Users</h1>
                </div>
            </div>

            <div class="flex items-center justify-between bg-gradient-to-br from-green-600 to-green-900 px-5 py-7 rounded-xl shadow-md text-slate-50">
                <div>
                    <i class="fa fa-archive text-7xl"></i>
                </div>
                <div>
                    <h1 class="text-7xl text-right">{{ count($shoes) }}</h1>
                    <h1 class="text-right">Shoes</h1>
                </div>
            </div>

            <div class="flex items-center justify-between bg-gradient-to-br from-blue-600 to-blue-900 px-5 py-7 rounded-xl shadow-md text-slate-50">
                <div>
                    <i class="fa fa-money text-7xl"></i>
                </div>
                <div>
                    <h1 class="text-5xl text-right">{{ str_replace(',','.', number_format($sales)) }}</h1>
                    <h1 class="text-right">Revenue</h1>
                </div>
            </div>
        </div>

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