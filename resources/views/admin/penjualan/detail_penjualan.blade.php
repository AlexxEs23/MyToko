<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Penjualan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <style>
        @media print {
            body * {
                visibility: hidden; /* Sembunyikan semua elemen */
            }
            #printableArea, #printableArea * {
                visibility: visible; /* Tampilkan hanya area yang ingin dicetak */
            }
            #printableArea {
                position: absolute; /* Mengatur posisi agar area cetak tidak terpengaruh */
                left: 12%;
                top: 0;
            }
        }
    </style>
</head>
<body>
    @extends('admin.sidebar')
    @section('content')
    <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md inline-block mr-2 mb-6">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z"/>
            <path d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z"/>
        </svg>
    </button>
    <div id="printableArea">
        <div class="text-center mb-6">
            <h1 class="text-4xl font-semibold text-gray-800">Detail Transaksi</h1>
            <p class="text-gray-600 mt-2">No. Nota: {{ $detail[0]->penjualanRelasi->NoNota }}</p>
            <p class="text-gray-600">Tanggal: {{ \Carbon\Carbon::parse($detail[0]->penjualanRelasi->TanggalPenjualan)->format('d-m-Y') }}</p>
            <p class="text-gray-600">Pelanggan: {{ $detail[0]->penjualanRelasi->pelangganRelasi ? $detail[0]->penjualanRelasi->pelangganRelasi->NamaPelanggan : 'Umum' }}</p>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-lg">
            <table class="min-w-full divide-y divide-gray-300 bg-white text-sm">
                <thead class="bg-indigo-100 text-gray-800">
                    <tr>
                        <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">No</th>
                        <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Nama Produk</th>
                        <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Jumlah</th>
                        <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Harga Satuan</th>
                        <th class="whitespace-nowrap px-6 py-3 font-semibold text-center">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($detail as $index => $d)
                        <tr class="hover:bg-gray-50 transition-all">
                            <td class="text-center px-6 py-3 text-gray-700">{{ $index + 1 }}</td>
                            <td class="text-center px-6 py-3 text-gray-700">{{ $d->produkRelasi->NamaProduk }}</td>
                            <td class="text-center px-6 py-3 text-gray-700">{{ $d->JumlahProduk }}</td>
                            <td class="text-center px-6 py-3 text-gray-700">Rp {{ number_format($d->Subtotal / $d->JumlahProduk, 0, ',', '.') }}</td>
                            <td class="text-center px-6 py-3 text-gray-700">Rp {{ number_format($d->Subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-indigo-50">
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-right font-semibold">Subtotal:</td>
                        <td class="px-6 py-3 text-center font-semibold">
                            Rp {{ number_format(collect($detail)->sum('Subtotal'), 0, ',', '.') }}
                        </td>
                    </tr>
                    @if($detail[0]->penjualanRelasi->pelangganRelasi)
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-right font-semibold">Diskon Member (5%):</td>
                        <td class="px-6 py-3 text-center font-semibold text-green-600">
                            - Rp {{ number_format(collect($detail)->sum('Subtotal') * 0.05, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="4" class="px-6 py-3 text-right font-semibold">Total Akhir:</td>
                        <td class="px-6 py-3 text-center font-semibold">
                            Rp {{ number_format($detail[0]->penjualanRelasi->TotalHarga, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="mt-6 text-center">
      
        <a href="{{ url('/penjualan') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md inline-block">
            Kembali
        </a>
    </div>
    @endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>
