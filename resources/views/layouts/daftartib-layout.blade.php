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

        #updateTartib {
            display: none;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        #submitData{
            float: right;
            margin-bottom: 2%;
        }

        #btnUpdateTartib{
            float: right;
            margin-bottom: 2%;
        }
    </style>

</head>
<?php
$kl = "";
$jn = "";
?>

<body class="bg-gray-100 font-family-karla flex">

    {{-- Side Bar --}}
    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-2">
            <center><img width="90" src="img/sekolahxyz2.png"></center>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="dashboard" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
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
            <a href="daftartib" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-hand-paper mr-3"></i>
                Tata Tertib
            </a>
            <a href="dafrapot" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
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
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 overflow-hidden focus:outline-none mr-1">
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
        <!-- Akhir Desktop Header -->

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <!-- Isi -->
                        <h3 class="text-3xl font-medium text-gray-700">Rekapitulasi Tata Tertib</h3>
                        <h5>Tahun Ajaran : 20xx/20xx Semester x</h5>

                        {{-- Button Kanan --}}
                        <div class="lg:flex items-center mb-6">
                            <p class="text-2xl font-semibold mb-2 lg:mb-0"></p>
                            <div>
                                <div>
                                    <div>
                                        <div class="flex items-right">
                                            <div class="mt-2">
                                                <div
                                                    class="flex px-4 py-4 space-x-4 overflow-x-auto bg-white rounded-md">
                                                    <div class="flex items-center">
                                                        <button id="btnTambah"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">
                                                            <svg class="fill-current w-4 h-4 mr-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z">
                                                                </path>
                                                            </svg>
                                                            <span>Tambah Tata Tertib</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Akhir Button Kanan --}}

                        {{-- Search Bar --}}
                        <div>
                            <div class="mt-8">
                                <div class="mt-4">
                                    <div class="flex px-4 py-4 space-x-4 overflow-x-auto bg-white rounded-md">
                                        <span>
                                            <h3>Cari Nama/NIS</h3>
                                            <div class="flex items-left"><button
                                                    class="text-gray-500 focus:outline-none lg:hidden">
                                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg></button>

                                                <div class="relative mx-4 lg:mx-0"><span
                                                        class="absolute inset-y-0 left-0 flex items-left pl-3"></span><input
                                                        class="w-32 pl-10 pr-4 text-indigo-600 border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                                                        type="text" placeholder="Search">
                                                </div>
                                            </div>
                                        </span>
                                        <span>
                                            <h3>Cari Kelas</h3>
                                            <div class="flex items-left"><button
                                                    class="text-gray-500 focus:outline-none lg:hidden"></button>

                                                <div class="relative mx-4 lg:mx-0"><span
                                                        class="absolute inset-y-0 left-0 flex items-left pl-3"></span>
                                                    <select
                                                        class="text-black border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                                                        <option>Search</option>
                                                        <option>Kelas 6</option>
                                                        <option>Kelas 5</option>
                                                        <option>Kelas 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </span>
                                        <span>
                                            <h3>Jenis Pelanggan</h3>
                                            <div class="flex items-left"><button
                                                    class="text-gray-500 focus:outline-none lg:hidden"></button>

                                                <div class="relative mx-4 lg:mx-0"><span
                                                        class="absolute inset-y-0 left-0 flex items-left pl-3"></span>
                                                    <select
                                                        class="text-black border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                                                        <option>Search</option>
                                                        <option>Sakit</option>
                                                        <option>Alpha</option>
                                                        <option>Dispensasi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Search Bar --}}

                        <!-- Update Data -->
                        <form id="updateTartib" class="mt-4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <h2 class="intro-y text-lg font-medium mr-auto mt-2">Tambah Data Tata Tertib</h2><br>
                            <div class="mb-4">
                                <div class="col-sm-10">
                                    <input type="hidden"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="id">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="updateNis"
                                    class="block text-gray-700 text-sm font-bold mb-2">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="updateNis" placeholder="NIS">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="updateNama"
                                    class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="updateNama" placeholder="Nama">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="updateKelas" class="block text-gray-700 text-sm font-bold mb-2">Kelas</label>
                                <div class="col-sm-10">
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="updateKelas" id="updateKelas">
                                        <option value="">- Pilih -</option>
                                        <option value="Kelas 4" <?php if ($kl == "Kelas 4") echo "selected" ?>>Kelas 4
                                        </option>
                                        <option value="Kelas 5" <?php if ($kl == "Kelas 5") echo "selected" ?>>Kelas 5
                                        </option>
                                        <option value="Kelas 6" <?php if ($kl == "Kelas 6") echo "selected" ?>>Kelas 6
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="updateTanggal"
                                    class="block text-gray-700 text-sm font-bold mb-2">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="updateTanggal" placeholder="Tanggal - Bulan - Tahun">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="updateJenis" class="block text-gray-700 text-sm font-bold mb-2">Jenis Pelanggaran</label>
                                <div class="col-sm-10">
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="updateJenis" id="updateJenis">
                                        <option value="">- Pilih -</option>
                                        <option value="Sakit" <?php if ($jn == "Sakit") echo "selected" ?>>Sakit
                                        </option>
                                        <option value="Alpha" <?php if ($jn == "Alpha") echo "selected" ?>>Alpha
                                        </option>
                                        <option value="Dispensasi" <?php if ($jn == "Dispensasi") echo "selected" ?>>Dispensasi
                                        </option>
                                        <option value="Lain - Lain" <?php if ($jn == "Lain - Lain") echo "selected" ?>>Lain - Lain
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="updateKeterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan Pelanggaran</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="updateKeterangan" placeholder="Keterangan">
                                </div>
                            </div>
                            <button id="btnUpdateTartib"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">Tambah</button>
                            <br>
                        </form>
                        <!-- Akhir Update Data -->

                        <!-- Tambah Data -->
                        <form id="tabelTambah" class="mt-4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <h2 class="intro-y text-lg font-medium mr-auto mt-2">Tambah Data Tata Tertib</h2><br>
                            <div class="mb-4">
                                <label for="nis"
                                    class="block text-gray-700 text-sm font-bold mb-2">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="nis" placeholder="NIS">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="nama"
                                    class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="nama" placeholder="Nama">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="kelas" class="block text-gray-700 text-sm font-bold mb-2">Kelas</label>
                                <div class="col-sm-10">
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="kelas" id="kelas">
                                        <option value="">- Pilih -</option>
                                        <option value="Kelas 4" <?php if ($kl == "Kelas 4") echo "selected" ?>>Kelas 4
                                        </option>
                                        <option value="Kelas 5" <?php if ($kl == "Kelas 5") echo "selected" ?>>Kelas 5
                                        </option>
                                        <option value="Kelas 6" <?php if ($kl == "Kelas 6") echo "selected" ?>>Kelas 6
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="tanggal"
                                    class="block text-gray-700 text-sm font-bold mb-2">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="tanggal" placeholder="Tanggal - Bulan - Tahun">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="jenis" class="block text-gray-700 text-sm font-bold mb-2">Jenis Pelanggaran</label>
                                <div class="col-sm-10">
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="jenis" id="jenis">
                                        <option value="">- Pilih -</option>
                                        <option value="Sakit" <?php if ($jn == "Sakit") echo "selected" ?>>Sakit
                                        </option>
                                        <option value="Alpha" <?php if ($jn == "Alpha") echo "selected" ?>>Alpha
                                        </option>
                                        <option value="Dispensasi" <?php if ($jn == "Dispensasi") echo "selected" ?>>Dispensasi
                                        </option>
                                        <option value="Lain - Lain" <?php if ($jn == "Lain - Lain") echo "selected" ?>>Lain - Lain
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="keterangan" class="block text-gray-700 text-sm font-bold mb-2">Keterangan Pelanggaran</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="keterangan" placeholder="Keterangan">
                                </div>
                            </div>
                            <button id="submitData"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">Tambah</button>
                            <br>
                        </form>
                        <!-- Akhir Tambah Data -->

                        {{-- Tampil Data --}}
                        <div class="container mx-auto px-3 py-4">
                            <div>
                                <div>
                                    <!-- Tabel Data -->
                                    <div id="page-wrapper">
                                        <div id="w-full max-w-xs">
                                            <!-- /. ROW  -->
                                            <!-- Isi -->
                                            <br>
                                            <div id="page-wrapper">
                                                <div id="w-full max-w-xs">
                                                    <div class="flex flex-col">
                                                        <div
                                                            class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                                            <div
                                                                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                                                <table id="tabelTartib"
                                                                    class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                                                    <thead
                                                                        class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                                                                        <tr>
                                                                            <th scope="col" class="py-3 px-6">NIS</th>
                                                                            <th scope="col" class="py-3 px-6">NAMA</th>
                                                                            <th scope="col" class="py-3 px-6">KELAS</th>
                                                                            <th scope="col" class="py-3 px-6">TANGGAL
                                                                            </th>
                                                                            <th scope="col" class="py-3 px-6">JENIS</th>
                                                                            <th scope="col" class="py-3 px-6">KETERANGAN
                                                                            </th>
                                                                            <th scope="col" class="py-3 px-6">ACTION
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="isiTartib" class="bg-white">
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
                                    <!-- Akhir Tabel Data -->
                                </div>
                            </div>
                        </div>
                        {{-- Akhir Tampil Data --}}
                    </div>
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

    {{-- Connect API --}}
    <script type="text/javascript">
        $(document).ready(function () {
    
            getTartib();

            $("#btnTambah").on("click", function (e) {
                $("#tabelTambah").toggle();
            });
    
            function getTartib() {
                $('#isiTartib').html('');
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/tartib',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        test: 'test data'
                    },
                    success: function (data) {
                        $(data).each(function (i, tartib) {
                            $('#isiTartib').append($("<tr>")
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(tartib.nis))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(tartib.nama))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(tartib.kelas))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(tartib.tanggal))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(tartib.jenis))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(tartib.keterangan))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(`
                                    <button class="bg-blue-200 hover:bg-blue-e00 hover:text-white text-blue-500 text-center py-1 px-3 rounded btneditTartib" data-tutid="` 
                                    + tartib.id +`">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-1 px-3 rounded btndeleteTartib" data-tutid="` 
                                    + tartib.id +`">Delete</button>
                                    `)));
                        });
                        loadButtonss();
                    }
                })
            }
    
            function updateTartib(id){
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/tartib/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $($("#updateTartib")[0].id).val(data.id);
                        $($("#updateTartib")[0].updateNis).val(data.nis);
                        $($("#updateTartib")[0].updateNama).val(data.nama);
                        $($("#updateTartib")[0].updateKelas).val(data.kelas);
                        $($("#updateTartib")[0].updateTanggal).val(data.tanggal);
                        $($("#updateTartib")[0].updateJenis).val(data.jenis);
                        $($("#updateTartib")[0].updateKeterangan).val(data.keterangan);
                        $("#updateTartib").show();
                    }
                });
            }
    
            $("#submitData").on("click", function (e) {
                let data = {
                    nis: $($("#tabelTambah")[0].nis).val(),
                    nama: $($("#tabelTambah")[0].nama).val(),
                    kelas: $($("#tabelTambah")[0].kelas).val(),
                    tanggal: $($("#tabelTambah")[0].tanggal).val(),
                    jenis: $($("#tabelTambah")[0].jenis).val(),
                    keterangan: $($("#tabelTambah")[0].keterangan).val()
                }
    
                postData(data);
                $("#tabelTambah").trigger("reset");
                $("#tabelTambah").toggle();
                e.preventDefault();
    
            });
    
            function postData(data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/tartib',
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getTartib();;
                    }
                });
            }
    
            function loadButtonss() {
                $(".btneditTartib").click(function (e) {
                    updateTartib($($(this)[0]).data("tutid"));
                    e.preventDefault();
                });
    
                $(".btndeleteTartib").click(function (e) {
                    deleteTartib($($(this)[0]).data("tutid"));
                    e.preventDefault();
                })
            }
    
            function putData(id, data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/tartib/' + id,
                    method: 'PUT',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getTartib();
                    }
                });
            }
    
            $("#btnUpdateTartib").on("click", function (e) {
                let data = {
                    nis: $($("#updateTartib")[0].updateNis).val(),
                    nama: $($("#updateTartib")[0].updateNama).val(),
                    kelas: $($("#updateTartib")[0].updateKelas).val(),
                    tanggal: $($("#updateTartib")[0].updateTanggal).val(),
                    jenis: $($("#updateTartib")[0].updateJenis).val(),
                    keterangan: $($("#updateTartib")[0].updateKeterangan).val()
                }
    
                putData($($("#updateTartib")[0].id).val(), data);
                $("#updateTartib").trigger("reset");
                $("#updateTartib").toggle();
                e.preventDefault();
    
            });
    
            function deleteTartib(id) {
                var API ='{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/tartib/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        getTartib();
                    }
                });
            }
        });
    </script>
</body>

</html>