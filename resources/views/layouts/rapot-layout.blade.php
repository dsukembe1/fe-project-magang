<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- AJAX --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script src="mainAjax.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('mainAjax.js') }}" defer></script> --}}

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }

        #tabelTambah {
            display: none;
        }

        #updateData {
            display: none;
        }
    </style>

</head>
<?php
$mapel = "";
?>

<body class="bg-gray-100 font-family-karla flex">

    {{-- Side Bar --}}
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-2">
            <center><img width="90" src="img/sekolahxyz2.png"></center>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="/dashboard" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="dafnilai" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-list-alt mr-3"></i>
                Nilai
            </a>
            <a href="dafkurikulum" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-book mr-3"></i>
                Kurikulum
            </a>
            <a href="dafextrakulikuler"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Ekstrakulikuler
            </a>
            <a href="dafprestasi" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Prestasi
            </a>
            <a href="dafadministrasi"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Administrasi
            </a>
            <a href="daftartib" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-hand-paper mr-3"></i>
                Tata Tertib
            </a>
            <a href="dafrapot" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-file mr-3"></i>
                Rapot
            </a>
            <a href="dafkelas" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fab fa-slideshare mr-3"></i>
                Kelas
            </a>
        </nav>
    </aside>
    {{-- Akhir Side Bar --}}

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <p class="mt-3 mr-1">Welcome,</p>
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 overflow-hidden focus:outline-none mr-1">
                    {{ Auth::user()->name }}
                </button>
                <i class="fas fa-user-circle mt-4"></i>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class=""><i class="fas fa-sign-out-alt fa-fw"></i> Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">

                {{-- Header Kiri --}}
                <div class="lg:flex justify-between items-center mb-6">
                    <p class="text-2xl font-semibold mb-2 lg:mb-0">Catatan Rapot : Bahasa Indonesia ( Kelas 6 )</p>
                    <div>
                        <div>
                            <div>
                                <div class="flex items-left">
                                    <div class="mt-2">
                                        <form action="dafrapot">
                                            <button class="btn btn-circle btn-outline">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Akhir Header Kiri --}}

                {{-- Button Kanan --}}
                <div class="lg:flex justify-between items-center mb-6">
                    <p class="text-2xl font-semibold mb-2 lg:mb-0"></p>
                    <div>
                        <div>
                            <div>
                                <div class="flex items-left">
                                    <div class="mt-2">
                                        <div class="flex px-4 py-4 space-x-4 overflow-x-auto bg-white rounded-md">
                                            <div class="flex items-center">
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">
                                                    <svg class="fill-current w-4 h-4 mr-2"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" /></svg>
                                                    <span>Nilai UTS</span>
                                                </button>
                                            </div>
                                            <div class="flex items-center">
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">
                                                    <svg class="fill-current w-4 h-4 mr-2"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" /></svg>
                                                    <span>Nilai UAS</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Search Bar --}}
                    </div>
                </div>
                {{-- Akhir Button Kanan --}}

                {{-- Tabel Guru --}}
                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <div class="flex flex-col mt-8">
                            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                    <table>
                                        <thead
                                            class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400 bg-white"
                                            align="center">
                                            <tr>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Kelas</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Mata Pelajaran
                                                </th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Wali Kelas</th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Konseling</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Jumlah Murid
                                                </th>
                                                <th scope="col" class="py-3 px-6"></th>
                                            </tr>
                                        </thead>
                                        <tbody align="center" class="bg-white">
                                            <td class="px-4 py-2 whitespace-nowrap">Kelas 6</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">Bahasa Indonesia</td>
                                            <td class="px-4 py-2 whitespace-nowrap">Heru</td>
                                            <td class="px-4 py-2 whitespace-nowrap">Budi</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">29</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Akhir Tabel Guru --}}
                <br>

                {{-- Tabel Keterangan --}}
                <div class="flex flex-wrap -mx-3">
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <div class="text-gray-700">
                                <h2 style="color: #0038fd">Sikap Spiritual</h2>
                                <p>1. Konsisten Menjalankan Agama Yang Dianut.</p>
                                <p>2. Sikap Rendah Hati.</p>
                                <p>3. Sikap Jujur Setiap Saat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <div class="text-gray-700">
                                <h2 style="color: #0038fd">Sikap Sosial</h2>
                                <p>1. Hormat Kepada Guru dan Tidak Membedakan - Bedakan Teman.</p>
                                <p>2. Empati Terhadap Lingkungan.</p>
                                <p>3. Toleransi Terhadap Sesama.</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Akhir Tabel Keterangan --}}

                {{-- Isi Tabel --}}
                <div class="flex flex-col mt-8">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Identitas</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Kehadiran</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Nilai Sikap</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                                        </th>
                                    </tr>
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            No.</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Nama</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            NIS</th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Sakit
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Izin
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Tanpa Keterangan
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Total
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            1
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            2
                                        </th>
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            3
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="">
                                                <div class="ml-2">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        1.</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">Ahmad</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">99901</div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            0
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="">
                                                <div class="ml-2">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        2.</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">Dandi</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">99902</div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            2
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            2
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="">
                                                <div class="ml-2">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        3.</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">Dika</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">99903</div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            1
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            1
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="">
                                                <div class="ml-2">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                                        4.</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">Andi</div>
                                        </td>
                                        <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                            <div class="text-sm leading-5 text-gray-900">99904</div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            0
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                            A
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Akhir Isi Tabel --}}
                </div>
                <!-- Akhir Isi  -->
            </main>
        </div>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>