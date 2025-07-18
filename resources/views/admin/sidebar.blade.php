<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 rounded-lg shadow-lg"
        aria-label="Sidebar">
        <!-- Background -->
        <div class="h-full px-3 py-4 overflow-y-auto bg-purple-800 rounded-lg">
            <!-- Logo and Brand -->
            <div class="flex items-center justify-center mb-8 pt-4">
                <span class="text-2xl text-center font-bold text-white">Hallo!
                    @if (auth()->check())
                       {{ auth()->user()->name }}</span>
                    @endif
            </div>

            <ul class="space-y-3">
                <!-- Dashboard -->
                <li>
                    <a href="{{ url('/transaksi') }}"
                        class="flex items-center p-3 rounded-lg group transition-all duration-200 ease-in-out
                    {{ Request::is('transaksi') ? 'bg-purple-600 text-white shadow-lg scale-105' : 'text-gray-100 hover:bg-purple-500 hover:text-white' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09v.58c0 .55-.45 1-1 1s-1-.45-1-1v-.63c-1.11-.25-2.05-.88-2.12-2.12 0-.28.22-.5.5-.5h.02c.25 0 .45.18.49.42.23.87.89 1.38 1.87 1.38 1.31 0 1.93-.75 1.93-1.47 0-.79-.45-1.45-2.12-1.87-1.87-.44-3.12-1.3-3.12-3.13 0-1.31.94-2.28 2.12-2.59V5.5c0-.55.45-1 1-1s1 .45 1 1v.58c1.11.25 1.63.89 1.69 1.66.03.28-.2.5-.48.5h-.04c-.25 0-.45-.18-.49-.42-.09-.56-.45-1.03-1.45-1.03-1.09 0-1.72.64-1.72 1.4 0 .77.41 1.22 2.12 1.66 1.87.48 3.12 1.22 3.12 3.17 0 1.39-1.03 2.38-2.12 2.67z" />
                        </svg>
                        <span class="ms-3 font-medium">Transaksi</span>
                        @if (Request::is('transaksi'))
                            <span class="ms-auto bg-purple-500 text-xs font-medium px-2 py-0.5 rounded-full">Active</span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{ url('/pelanggan') }}"
                        class="flex items-center p-3 rounded-lg group transition-all duration-200 ease-in-out
        {{ Request::is('pelanggan') ? 'bg-purple-600 text-white shadow-lg scale-105' : 'text-gray-100 hover:bg-purple-500 hover:text-white' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="ms-3 font-medium">Pelanggan</span>
                        @if (Request::is('pelanggan'))
                            <span class="ms-auto bg-purple-500 text-xs font-medium px-2 py-0.5 rounded-full">Active</span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{ url('/penjualan') }}"
                        class="flex items-center p-3 rounded-lg group transition-all duration-200 ease-in-out
        {{ Request::is('penjualan') ? 'bg-purple-600 text-white shadow-lg scale-105' : 'text-gray-100 hover:bg-purple-500 hover:text-white' }}">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-white" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                            <path
                                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                        </svg>
                        <span class="ms-3 font-medium">Penjualan</span>
                        @if (Request::is('penjualan'))
                            <span class="ms-auto bg-purple-500 text-xs font-medium px-2 py-0.5 rounded-full">Active</span>
                        @endif
                    </a>
                </li>
                @if(auth()->user()->role == 'admin')
                    <li>
                        <a href="{{ url('/pengguna') }}"
                            class="flex items-center p-3 rounded-lg group transition-all duration-200 ease-in-out
                    {{ Request::is('pengguna') ? 'bg-purple-600 text-white shadow-lg scale-105' : 'text-gray-100 hover:bg-purple-500 hover:text-white' }}">
                            <svg class="w-5 h-5 transition duration-75 group-hover:text-white" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 10a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 2c-4 0-7 2-7 4v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1c0-2-3-4-7-4Z" />
                            </svg>
                            <span class="ms-3 font-medium">Pengguna</span>
                            @if (Request::is('pengguna'))
                                <span
                                    class="ms-auto bg-purple-500 text-xs font-medium px-2 py-0.5 rounded-full">Active</span>
                            @endif
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/produk') }}"
                            class="flex items-center p-3 rounded-lg group transition-all duration-200 ease-in-out
        {{ Request::is('produk') ? 'bg-purple-600 text-white shadow-lg scale-105' : 'text-gray-100 hover:bg-purple-500 hover:text-white' }}">
                            <svg class="w-5 h-5 transition duration-75 group-hover:text-white" fill="currentColor"
                                viewBox="0 0 18 20">
                                <path
                                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="ms-3 font-medium">Produk</span>
                            @if (Request::is('produk'))
                                <span
                                    class="ms-auto bg-purple-500 text-xs font-medium px-2 py-0.5 rounded-full">Active</span>
                            @endif
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ url('/laporan') }}"
                            class="flex items-center p-3 rounded-lg group transition-all duration-200 ease-in-out
        {{ Request::is('laporan') ? 'bg-purple-600 text-white shadow-lg scale-105' : 'text-gray-100 hover:bg-purple-500 hover:text-white' }}">
                            <svg class="w-5 h-5 transition duration-75 group-hover:text-white" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M4 2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4zm0 2h12v12H4V4z" />
                                <path d="M8 4h4v2H8V4z" />
                            </svg>
                            <span class="ms-3 font-medium">Laporan</span>
                            @if (Request::is('laporan'))
                                <span
                                    class="ms-auto bg-purple-500 text-xs font-medium px-2 py-0.5 rounded-full">Active</span>
                            @endif
                        </a>
                    </li>
                @endif
                <!-- Logout -->
                <li>
                    <a href="{{ url('/logout') }}"
                        class="flex items-center p-3 rounded-lg group transition-all duration-200 ease-in-out text-red-500 hover:bg-red-600 hover:text-white">
                        <svg class="w-5 h-5 transition duration-75 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 18 16">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="ms-3 font-medium">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>