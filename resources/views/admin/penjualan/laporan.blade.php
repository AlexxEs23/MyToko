<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    @extends('admin.sidebar')
    @section('content')
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <h2 class="text-2xl font-semibold mb-4">Laporan Penjualan</h2>
            
            <div class="mb-6 flex gap-4">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input datepicker datepicker-format="yyyy-mm-dd" name="start_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Tanggal Awal">
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input datepicker datepicker-format="yyyy-mm-dd" name="end_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Tanggal Akhir">
                </div>
                <button id="filterBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Filter</button>
                <button id="printBtn" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Cetak Laporan</button>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">No Nota</th>
                            <th scope="col" class="px-6 py-3">Pelanggan</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody id="reportTable">
                        @foreach($penjualan as $index => $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"> 
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ Carbon\Carbon::parse($item->TanggalPenjualan)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">{{ $item->NoNota }}</td>
                            <td class="px-6 py-4">{{ $item->pelangganRelasi->NamaPelanggan ?? 'Umum' }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($item->TotalHarga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    <script>
        document.getElementById('filterBtn').addEventListener('click', function() {
            const startDate = document.querySelector('input[name="start_date"]').value;
            const endDate = document.querySelector('input[name="end_date"]').value;

            fetch(`/filter-laporan?start_date=${startDate}&end_date=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('reportTable');
                    tableBody.innerHTML = '';

                    data.forEach((item, index) => {
                        const row = `
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">${index + 1}</td>
                                <td class="px-6 py-4">${item.TanggalPenjualan}</td>
                                <td class="px-6 py-4">${item.NoNota}</td>
                                <td class="px-6 py-4">${item.pelanggan_relasi ? item.pelanggan_relasi.NamaPelanggan : 'Umum'}</td>
                                <td class="px-6 py-4">Rp ${new Intl.NumberFormat('id-ID').format(item.TotalHarga)}</td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });
                });
        });

        document.getElementById('printBtn').addEventListener('click', function() {
            const startDate = document.querySelector('input[name="start_date"]').value;
            const endDate = document.querySelector('input[name="end_date"]').value;
            
            const printDiv = document.createElement('div');
            printDiv.id = 'printArea';
            
            // Hitung total dari semua transaksi
            let totalSemuaTransaksi = 0;
            document.querySelectorAll('#reportTable tr').forEach(row => {
                const totalText = row.cells[4].textContent.replace('Rp ', '').replace(/\./g, '');
                totalSemuaTransaksi += parseInt(totalText);
            });
            
            const printStyle = document.createElement('style');
            printStyle.textContent = `
                @media print {
                    body * {
                        visibility: hidden;
                    }
                    #printArea, #printArea * {
                        visibility: visible;
                    }
                    #printArea {
                        position: absolute;
                        left: 0;
                        top: 0;
                        padding: 20px;
                        width: 100%;
                    }
                    @page {
                        size: A4;
                        margin: 1cm;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                }
            `;
            
            const strukContent = `
                <div style="font-family: Arial, sans-serif;">
                    <div style="text-align: center; margin-bottom: 20px;">
                        <h2 style="margin: 0;">TOKO BANGUNAN</h2>
                        <p style="margin: 5px 0;">Jl. Raya Utama No. 123 - Telp. (021) 555-1234</p>
                        <h3 style="margin: 10px 0;">LAPORAN PENJUALAN</h3>
                        <p>Periode: ${startDate || 'Semua'} s/d ${endDate || 'Semua'}</p>
                        <p>Waktu Cetak: ${new Date().toLocaleString('id-ID')}</p>
                    </div>

                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid black; padding: 8px; text-align: center;">No.</th>
                                <th style="border: 1px solid black; padding: 8px;">Tanggal</th>
                                <th style="border: 1px solid black; padding: 8px;">No. Nota</th>
                                <th style="border: 1px solid black; padding: 8px;">Pelanggan</th>
                                <th style="border: 1px solid black; padding: 8px; text-align: right;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${Array.from(document.querySelectorAll('#reportTable tr')).map((row, index) => `
                                <tr>
                                    <td style="border: 1px solid black; padding: 8px; text-align: center;">${index + 1}</td>
                                    <td style="border: 1px solid black; padding: 8px;">${row.cells[1].textContent}</td>
                                    <td style="border: 1px solid black; padding: 8px;">${row.cells[2].textContent}</td>
                                    <td style="border: 1px solid black; padding: 8px;">${row.cells[3].textContent}</td>
                                    <td style="border: 1px solid black; padding: 8px; text-align: right;">${row.cells[4].textContent}</td>
                                </tr>
                            `).join('')}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" style="border: 1px solid black; padding: 8px; text-align: right; font-weight: bold;">Total Transaksi:</td>
                                <td style="border: 1px solid black; padding: 8px; text-align: right;">${document.querySelectorAll('#reportTable tr').length}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="border: 1px solid black; padding: 8px; text-align: right; font-weight: bold;">Total Penjualan:</td>
                                <td style="border: 1px solid black; padding: 8px; text-align: right;">Rp ${new Intl.NumberFormat('id-ID').format(totalSemuaTransaksi)}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div style="margin-top: 50px; display: flex; justify-content: flex-end;">
                        <div style="text-align: center;">
                            <p>Petugas</p>
                            <br><br><br>
                            <p>(_________________)</p>
                        </div>
                    </div>
                </div>
            `;
            
            printDiv.innerHTML = printStyle.outerHTML + strukContent;
            document.body.appendChild(printDiv);
            
            window.print();
            
            document.body.removeChild(printDiv);
        });
    </script>
    @endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</html>