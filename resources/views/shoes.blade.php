<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard - Shoes</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <nav class="bg-white fixed w-full z-50 top-0 left-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/dashboard" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap ">Dashboard</span>
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

        <nav class="flex mb-7" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600  ">
                        <i class="fa fa-home mr-1"></i>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="#"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2  ">Shoes</a>
                    </div>
                </li>
            </ol>
        </nav>

        <button type="button" data-modal-target="modal-add-shoes" data-modal-toggle="modal-add-shoes"
            class=" text-white focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-900"><i
                class="fa fa-plus"></i>&nbsp;New Shoes</button>


        <div id="modal-add-shoes" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Add Product
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="modal-add-shoes">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ url('dashboard/shoes/insert') }}" method="post">
                        @csrf
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                <input type="text" name="shoes_name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    placeholder="Type product name" required>
                            </div>
                            <div>
                                <label for="brand"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Brand</label>
                                <input type="text" name="shoes_brand" id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    placeholder="Product brand" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                <input type="number" name="shoes_price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    placeholder="Price" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="link"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Image
                                    Link</label>
                                <textarea id="link" rows="2" name="shoes_image"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                    placeholder="Product Image Link"></textarea>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                <textarea id="description" rows="4" name="shoes_description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                    placeholder="Write product description here"></textarea>
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs uppercase bg-gray-800 text-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Brand
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shoes as $i => $item)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $i+1 }}
                        </th>
                        <td class="px-6 py-4">
                            <img class="w-16 rounded-xl" src="{{ $item->shoes_image }}" alt="">
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->shoes_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->shoes_brand }}
                        </td>
                        <td class="px-6 py-4">
                            Rp {{ str_replace(',', '.', number_format($item->shoes_price)) }}
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" data-modal-target="delete-modal-{{ $item->shoes_id }}"
                                data-modal-toggle="delete-modal-{{ $item->shoes_id }}"
                                class=" text-white focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900">Delete</button>

                            <div id="delete-modal-{{ $item->shoes_id }}" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="delete-modal-{{ $item->shoes_id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <form action="{{ url('dashboard/shoes/delete') }}" method="POST"
                                            class="p-6 text-center">
                                            @csrf
                                            <input type="hidden" name="shoes_id" value="{{ $item->shoes_id }}">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500">Are
                                                you sure you want to delete this Product?</h3>
                                            <button data-modal-hide="delete-modal-{{ $item->shoes_id }}" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="delete-modal-{{ $item->shoes_id }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                                cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <button type="button" data-modal-target="update-modal-{{ $item->shoes_id }}"
                                data-modal-toggle="update-modal-{{ $item->shoes_id }}"
                                class=" text-white focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-900">Update</button>

                            <div id="update-modal-{{ $item->shoes_id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                    <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                                        <div
                                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                Update Product
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                data-modal-toggle="update-modal-{{ $item->shoes_id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('dashboard/shoes/update') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="shoes_id" value="{{ $item->shoes_id }}">
                                            <div class="grid gap-4 mb-7 sm:grid-cols-2">
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                                                    <input type="text" name="shoes_name" id="name" value="{{ $item->shoes_name }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                                        placeholder="Type product name" required>
                                                </div>
                                                <div>
                                                    <label for="brand"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Brand</label>
                                                    <input type="text" name="shoes_brand" id="brand" value="{{ $item->shoes_brand }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                                        placeholder="Product brand" required>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <label for="price"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                                                    <input type="number" name="shoes_price" id="price" value="{{ $item->shoes_price }}"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                                        placeholder="Price" required>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <label for="link"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Image
                                                        Link</label>
                                                    <textarea id="link" rows="2" name="shoes_image"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                        placeholder="Product Image Link">{{ $item->shoes_image }}</textarea>
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <label for="description"
                                                        class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                                                    <textarea id="description" rows="5" name="shoes_description"
                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                                        placeholder="Write product description here">{{ $item->shoes_description }}</textarea>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                Update
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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