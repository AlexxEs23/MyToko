<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    @extends('admin.sidebar')
    @section('content')
    <div class="text-center mb-6">
        <h1 class="text-4xl font-semibold text-gray-800">Penjualan</h1>
    </div>
    

 


    <!-- Table Container -->
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-lg">
        <table class="min-w-full divide-y divide-gray-300 bg-white text-sm">
            <thead class="bg-indigo-100 text-gray-800">
                <tr>
                    <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Kode Transaksi</th>
                    <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Tanggal</th>
                    <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Pelanggan</th>
                    <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Total Bayar</th>
                    <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Opsi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($penjualan as $p)
                    <tr class="hover:bg-gray-50 transition-all">
                        <td class="text-center px-6 py-3 text-gray-700">{{ $p->NoNota }}</td>
                        <td class="text-center px-6 py-3 text-gray-700">{{ Carbon\Carbon::parse($p->TanggalPenjualan)->format('d-m-Y') }}</td>
                        <td class="text-center px-6 py-3 text-gray-700">{{ $p->pelangganRelasi ? $p->pelangganRelasi->NamaPelanggan : 'Umum' }}</td>
                        <td class="text-center px-6 py-3 text-gray-700">{{ $p->TotalHarga }}</td>
                        <td class="text-center px-6 py-3 text-gray-700">
                            <div class="flex justify-center space-x-4">
                                <!-- Edit Button -->
                                <a href="{{ url('detail_penjualan/' . $p->PenjualanID) }}"
                                    class="inline-flex items-center justify-center rounded-full bg-blue-500 p-3 text-white hover:bg-blue-400 focus:outline-none transition-all"
                                    title="Detail Penjualan">
                                    <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-4"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                    />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  </svg>
                                  Detail
                                </a>


                                <!-- Delete Button -->
                                <form action="{{ url('/hapus_penjualan') }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="penjualan_id" value="{{ $p->PenjualanID }}">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center rounded-full bg-red-500 p-3 text-white hover:bg-red-600 focus:outline-none transition-all"
                                        title="Delete pelanggan"
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>