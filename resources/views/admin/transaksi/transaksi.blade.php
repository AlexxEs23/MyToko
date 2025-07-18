<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* ... existing code ... */
    </style>
</head>

<body>
    @extends('admin.sidebar')
    @section('content')
        <div class="p-6">
            <h1 class="mb-6 text-2xl font-bold text-center">Transaksi Penjualan</h1>
            
            <!-- Form Input Section -->
            <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                <div class="flex flex-col">
                    <label for="memberId" class="mb-2 text-sm font-medium text-gray-700">Member ID</label>
                    <input type="number" id="memberId" placeholder="Masukkan ID Member" 
                           class="rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           onchange="checkMember(this)">
                </div>
                <div class="flex items-center">
                    <span class="font-medium text-gray-700 mr-2">Nama Member:</span>
                    <span id="memberName" class="text-green-600 font-medium"></span>
                </div>
                <div class="flex justify-end">
                    <button onclick="emptyCart()" 
                            class="flex items-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Kosongkan
                    </button>
                </div>
            </div>

            <!-- Table Section -->
            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Barang</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items" class="bg-white divide-y divide-gray-200">
                    </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="4" class="px-6 py-3 text-right font-medium">Total Item:</td>
                            <td colspan="2" id="totalItems" class="px-6 py-3">0</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="px-6 py-3 text-right font-medium">Subtotal:</td>
                            <td colspan="2" id="subtotal" class="px-6 py-3">Rp 0</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="px-6 py-3 text-right font-medium">Diskon Member:</td>
                            <td colspan="2" id="memberDiscount" class="px-6 py-3">0%</td>
                        </tr>
                        <tr>
                            <td colspan="4" class="px-6 py-3 text-right font-medium">Total Setelah Diskon:</td>
                            <td colspan="2" id="total" class="px-6 py-3">Rp 0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Button Section -->
            <div class="mt-6 flex justify-center">
                <button onclick="finishTransaction()" 
                        class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                    Selesai Transaksi
                </button>
            </div>
        </div>

        <!-- Modal Section -->
        <!-- ... existing modal code ... -->
        <script src="{{ asset('js/transaksi.js') }}"></script>

    @endsection
</body>
</html>