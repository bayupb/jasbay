<nav class="bg-white md:px-0 px-5 py-4 w-full sticky top-0 z-10 shadow-md">
    <div class="max-w-6xl container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="{{asset('logo-jasbay.svg')}}" class="mr-3 h-6 sm:h-10" alt="Jasbay" />
        </a>
        <button data-collapse-toggle="mobile-menu" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
            <ul class="flex flex-col md:items-center mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="{{route('dashboard')}}"
                        class=" {{ (request()->is('/dashboard')) ? 'text-blue-800 font-bold' : 'text-black hover:text-blue-500' }} block py-1 px-2 rounded  md:p-0"
                        aria-current="page">Dashboard</a>
                </li>
                <li>
                    <a href="{{route('paket')}}"
                        class=" {{ (request()->is('/paket')) ? 'text-blue-800 font-bold' : 'text-black hover:text-blue-500' }} block py-1 px-2 rounded  md:p-0"
                        aria-current="page">Paket</a>
                </li>
                <li>
                    <a href="{{route('harga-paket')}}"
                        class=" {{ (request()->is('/harga-paket')) ? 'text-blue-800 font-bold' : 'text-black hover:text-blue-500' }} block py-1 px-2 rounded  md:p-0"
                        aria-current="page">Fitur Harga Paket</a>
                </li>
                <li>
                    <a href="{{route('fitur')}}"
                        class=" {{ (request()->is('fitur')) ? 'text-blue-800 font-bold' : 'text-black hover:text-blue-500' }} block py-1 px-2 rounded  md:p-0"
                        aria-current="page">Fitur Paket</a>
                </li>
                <li>
                    <a href="{{route('keunggulan')}}"
                        class=" {{ (request()->is('keunggulan')) ? 'text-blue-800 font-bold' : 'text-black hover:text-blue-500' }} block py-1 px-2 rounded  md:p-0"
                        aria-current="page">Keunggulan</a>
                </li>
                <li>
                    <a href="{{route('cara-pemesanan')}}"
                        class=" {{ (request()->is('/cara-pemesanan')) ? 'text-blue-800 font-bold' : 'text-black hover:text-blue-500' }} block py-1 px-2 rounded  md:p-0"
                        aria-current="page">Cara Pemesanan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
