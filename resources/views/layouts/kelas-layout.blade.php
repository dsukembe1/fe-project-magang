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
            <a href="dafrapot" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-file mr-3"></i>
                Rapot
            </a>
            <a href="dafkelas" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fab fa-slideshare mr-3"></i>
                Kelas
            </a>
        </nav>
    </aside>

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
                {{-- Search Bar --}}
                <div class="lg:flex justify-between items-center mb-6">
                    <p class="text-2xl font-semibold mb-2 lg:mb-0">Data Kelas 6</p>
                    <div>
                        <div>
                            <div>
                                <div class="flex items-left">
                                    <div class="mt-2">
                                        <form action="dafkelas">
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
                {{-- End Search Bar --}}

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
                                                <button id="btnTambah"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">
                                                    <svg class="fill-current w-4 h-4 mr-2"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z">
                                                        </path>
                                                    </svg>
                                                    <span>Tambah Data</span>
                                                </button>
                                            </div>
                                            <div class="flex items-center">
                                                <button
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">
                                                    <svg class="fill-current w-4 h-4 mr-2"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" /></svg>
                                                    <span>Download</span>
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
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Wali Kelas</th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Konseling</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Jumlah Murid
                                                </th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd"></th>
                                            </tr>
                                        </thead>
                                        <tbody align="center" class="bg-white">
                                            <td class="px-4 py-2 whitespace-nowrap">Kelas 6</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">Heru</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">Budi</td>
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

                {{-- Search Bar --}}
                <div>
                    <div class="mt-8">
                        <div class="mt-4">
                            <div class="flex px-4 py-4 space-x-4 overflow-x-auto bg-white rounded-md">
                                <span>
                                    <h3>Cari NIS</h3>
                                    <div class="flex items-left"><button
                                            class="text-gray-500 focus:outline-none lg:hidden">
                                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></button>

                                        <div class="relative mx-4 lg:mx-0"><span
                                                class="absolute inset-y-0 left-0 flex items-left pl-3"></span><input
                                                class="w-32 pl-10 pr-4 text-indigo-600 border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                                type="text" placeholder="Search">
                                        </div>
                                    </div>
                                </span>
                                <span>
                                    <h3>Jenis Kelamin</h3>
                                    <div class="flex items-left"><button
                                            class="text-gray-500 focus:outline-none lg:hidden"></button>

                                        <div class="relative mx-4 lg:mx-0"><span
                                                class="absolute inset-y-0 left-0 flex items-left pl-3"></span>
                                            <select
                                                class="text-black border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                                                <option>Search</option>
                                                <option>Laki - Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </span>
                                <span>
                                    <h3>Agama</h3>
                                    <div class="flex items-left"><button
                                            class="text-gray-500 focus:outline-none lg:hidden"></button>

                                        <div class="relative mx-4 lg:mx-0"><span
                                                class="absolute inset-y-0 left-0 flex items-left pl-3"></span>
                                            <select
                                                class="text-black border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                                                <option>Search</option>
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Budha</option>
                                            </select>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Search Bar --}}

                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <!-- /. ROW  -->
                        <!-- Isi -->
                        <br>
                        <!-- Tabel Data -->
                        <div id="page-wrapper">
                            <div id="w-full max-w-xs">
                                <div class="flex flex-col">
                                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                        <div
                                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                            <table id="tabelNilai"
                                                class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                                <thead
                                                    class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                                                    <tr>
                                                        <th scope="col" class="py-3 px-6">No.</th>
                                                        <th scope="col" class="py-3 px-6">NAMA</th>
                                                        <th scope="col" class="py-3 px-6">NIS</th>
                                                        <th scope="col" class="py-3 px-6">NISN</th>
                                                        <th scope="col" class="py-3 px-6">TAHUN MASUK</th>
                                                        <th scope="col" class="py-3 px-6">JENIS KELAMIN</th>
                                                        <th scope="col" class="py-3 px-6">AGAMA</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="">
                                                                <div class="ml-2">
                                                                    <div
                                                                        class="text-sm font-medium leading-5 text-gray-900">
                                                                        1.</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Ahmad</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">99901</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">00012301</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            2019
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Laki - Laki
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Islam
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="">
                                                                <div class="ml-2">
                                                                    <div
                                                                        class="text-sm font-medium leading-5 text-gray-900">
                                                                        2.</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Dandi</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">99902</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">00012302</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            2019
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Laki - Laki
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Islam
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="">
                                                                <div class="ml-2">
                                                                    <div
                                                                        class="text-sm font-medium leading-5 text-gray-900">
                                                                        3.</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Joshua</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">99903</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">00012303</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            2019
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Laki - Laki
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Kristen
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="">
                                                                <div class="ml-2">
                                                                    <div
                                                                        class="text-sm font-medium leading-5 text-gray-900">
                                                                        4.</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Fika</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">99904</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">00012304</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            2019
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Perempuan
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                            Islam
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /. ROW  -->
                    </div>
                    <!-- /. PAGE INNER  -->
                </div>
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