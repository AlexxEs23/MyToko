<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-to-r from-blue-50 to-purple-50">
    @extends('admin.sidebar')
    @section('content')
        <div class="container mx-auto px-6 py-8">
            <!-- Title (Centered with Gradient Text) -->
            <h1 class="text-4xl font-bold text-center bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-8">
                Data Pengguna
            </h1>

            <!-- Add Button with Icon -->
            <div class="mb-6">
                <a href="{{ url('/tambah_pengguna') }}"
                    class="inline-flex items-center rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2 text-sm font-medium text-white hover:from-indigo-700 hover:to-purple-700 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Tambah Pengguna
                </a>
            </div>

            <!-- User Table in a Card -->
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-indigo-600 to-purple-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Role</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-white uppercase tracking-wider">Opsi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($user as $usr)
                            <tr class="hover:bg-gray-50 transition-all">
                                <td class="px-6 py-4 text-gray-700">{{ $usr->name }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $usr->email }}</td>
                                <td class="px-6 py-4 text-gray-700">{{ $usr->role }}</td>
                                <td class="px-6 py-4 text-gray-700">
                                    <!-- Delete Button with Icon -->
                                    <form action="{{ url('/hapus_pengguna') }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id_user" value="{{ $usr->id_user }}">
                                        <button type="submit"
                                            class="inline-flex items-center justify-center rounded-full bg-red-500 p-2 text-white hover:bg-red-600 focus:outline-none transition-all"
                                            title="Delete User"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</html>