<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

        #updatePrestasii {
            display: none;
        }

        #submitData {
            float: right;
        }

        #btnUpdatePrestasi{
            float: right;
        }
    </style>

</head>
<?php
$kl = "";
?>

<body class="bg-gray-100 font-family-karla flex">

    {{-- Menu --}}
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
            <a href="dafprestasi" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Prestasi
            </a>
            <!-- <a href="dafadministrasi"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Administrasi
            </a>
            <a href="daftartib" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-hand-paper mr-3"></i>
                Tata Tertib
            </a> -->
            <a href="dafrapot" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-file mr-3"></i>
                Rapot
            </a>
            <!-- <a href="dafkelas" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fab fa-slideshare mr-3"></i>
                Kelas
            </a> -->
        </nav>
    </aside>
    {{-- Akhir Menu --}}

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
                {{-- Atas --}}
                <div class="lg:flex justify-between items-center mb-6">
                    <p class="text-2xl font-semibold mb-2 lg:mb-0">Rekapitulasi Prestasi : Ahmad</p>
                    <div>
                        <div>
                            <div>
                                <div class="flex items-left">
                                    <div class="mt-2">
                                        <form action="dafprestasi">
                                            <button class="btn btn-circle btn-outline">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                              </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                                    <span>Tambah</span>
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

                <!-- Tambah Data -->
                <form id="tabelTambah" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="intro-y text-lg font-medium mr-auto mt-2">Tambah Data Prestasi</h2><br>
                    <div class="mb-4">
                        <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pelaksanaan
                            <p><small class="text-muted">Hari - Bulan - Tanggal</small></p>
                        </label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="tanggal" placeholder="Hari - Bulan - Tanggal">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="prestasi" class="block text-gray-700 text-sm font-bold mb-2">Prestasi</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="prestasi" placeholder="Prestasi">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="kegiatan" class="block text-gray-700 text-sm font-bold mb-2">Kegiatan</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="kegiatan" placeholder="Kegiatan">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="capaian" class="block text-gray-700 text-sm font-bold mb-2">Capaian</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="capaian" placeholder="Capaian">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="point" class="block text-gray-700 text-sm font-bold mb-2">Point yang Didapat</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="point" id="point">
                                <option value="">- Pilih -</option>
                                <option value="0" <?php if ($kl == "0") echo "selected" ?>>0
                                </option>
                                <option value="3" <?php if ($kl == "3") echo "selected" ?>>3
                                </option>
                                <option value="5" <?php if ($kl == "5") echo "selected" ?>>5
                                </option>
                                <option value="10" <?php if ($kl == "10") echo "selected" ?>>10
                                </option>
                                <option value="15" <?php if ($kl == "15") echo "selected" ?>>15
                                </option>
                                <option value="20" <?php if ($kl == "20") echo "selected" ?>>20
                                </option>
                                <option value="25" <?php if ($kl == "25") echo "selected" ?>>25
                                </option>
                            </select>
                            <br><br>
                            <button id="submitData"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">Tambah</button>
                        </div>
                    </div>
                </form>
                <!-- Akhir Tambah Data -->

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
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Nama
                                                    / NIS</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Poin</th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Kelas</th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Wali Kelas</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Konseling</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd"></th>
                                            </tr>
                                        </thead>
                                        <tbody align="center" class="bg-white">
                                            <td class="px-4 py-2 whitespace-nowrap">Ahmad</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">25</td>
                                            <td class="px-4 py-2 whitespace-nowrap">Kelas 6</td>
                                            <td class="px-4 py-2 whitespace-nowrap">Pak Heru</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">Budi</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
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
                                    <h2 style="color: #0038fd">Point Prestasi</h2>
                                    <p>Masa Studi</p>
                                    <p class="font-semibold text-3xl">25</p>
                                </div>
                                <div class="text-gray-700">
                                    <br>
                                    <p>Semester Ini</p>
                                    <p class="font-semibold text-3xl">25</p>
                                </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                                <div class="text-gray-700">
                                    <h2 style="color: #0038fd">Jumlah Point</h2>
                                    <p>Akademik</p>
                                    <p class="font-semibold text-3xl">0</p>
                                </div>
                                <div class="text-gray-700">
                                    <br>
                                    <p>Extrakulikuler</p>
                                    <p class="font-semibold text-3xl">0</p>
                                </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                                <div class="text-gray-700">
                                    <h2 style="color: #0038fd">Jumlah Point</h2>
                                    <p>Lomba</p>
                                    <p class="font-semibold text-3xl">25</p>
                                </div>
                                <div class="text-gray-700">
                                    <br>
                                    <p></p>
                                    <p class="font-semibold text-3xl"></p>
                                </div>
                        </div>
                    </div>
                </div>
                {{-- Akhir Tabel Keterangan --}}

                {{-- Search Bar --}}
                <div>
                    <div class="mt-8">
                        <div class="mt-4">
                                <div class="flex px-4 py-4 space-x-4 overflow-x-auto bg-white rounded-md">
                                    <span><h3>Nama Kegiatan</h3>
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
                                    </div></span>
                                    <span><h3>Jenis Prestasi</h3>
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
                                        </div></span>
                                </div>
                        </div>
                    </div>
                </div>
                {{-- End Search Bar --}}
                <br>

                <!-- Update Data -->
                <div id="updateDataDiv">
                    <form id="updatePrestasii" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <h2 class="intro-y text-lg font-medium mr-auto mt-2">Update Data</h2>
                        <div class="mb-4">
                            <div class="col-sm-10">
                                <input type="hidden"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="id">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updateTanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pelaksanaan
                                <p><small class="text-muted">Hari - Bulan - Tanggal</small></p>
                            </label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="updateTanggal" placeholder="Hari - Bulan - Tanggal">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updatePrestasi"
                                class="block text-gray-700 text-sm font-bold mb-2">Prestasi</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="updatePrestasi" placeholder="Prestasi">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updateKegiatan"
                                class="block text-gray-700 text-sm font-bold mb-2">Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="updateKegiatan" placeholder="Kegiatan">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updateCapaian"
                                class="block text-gray-700 text-sm font-bold mb-2">Capaian</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="updateCapaian" placeholder="Capaian">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updatePoint"
                                class="block text-gray-700 text-sm font-bold mb-2">Point yang Didapat</label>
                            <div class="col-sm-10">
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="updatePoint" id="updatePoint">
                                    <option value="">- Pilih -</option>
                                    <option value="0" <?php if ($kl == "0") echo "selected" ?>>0
                                    </option>
                                    <option value="3" <?php if ($kl == "3") echo "selected" ?>>3
                                    </option>
                                    <option value="5" <?php if ($kl == "5") echo "selected" ?>>5
                                    </option>
                                    <option value="10" <?php if ($kl == "10") echo "selected" ?>>10
                                    </option>
                                    <option value="15" <?php if ($kl == "15") echo "selected" ?>>15
                                    </option>
                                    <option value="20" <?php if ($kl == "20") echo "selected" ?>>20
                                    </option>
                                    <option value="25" <?php if ($kl == "25") echo "selected" ?>>25
                                    </option>
                                </select>
                                <br><br>
                                <button id="btnUpdatePrestasi"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Akhir Update Data -->

                <!-- Tabel Data -->
                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <!-- /. ROW  -->
                        <!-- Isi -->
                        <br>
                        <div id="page-wrapper">
                            <div id="w-full max-w-xs">
                                <div class="flex flex-col">
                                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                        <div
                                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                            <table id="tabelPrestasi"
                                                class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                                <thead
                                                    class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                                                    <tr>
                                                        <th scope="col" class="py-3 px-6">TANGGAL</th>
                                                        <th scope="col" class="py-3 px-6">PRESTASI</th>
                                                        <th scope="col" class="py-3 px-6">KEGIATAN</th>
                                                        <th scope="col" class="py-3 px-6">CAPAIAN</th>
                                                        <th scope="col" class="py-3 px-6">POINT</th>
                                                        <th scope="col" class="py-3 px-6">ACTION</th>
                                                    </tr>
                                                </thead>
                                                    <tbody id="isiPrestasi" class="bg-white">
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
    
            getPrestasi();
    
            $("#btnTambah").on("click", function (e) {
                $("#tabelTambah").toggle();
            });
    
            function getPrestasi() {
                $('#isiPrestasi').html('');
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/prestasi',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        test: 'test data'
                    },
                    success: function (data) {
                        $(data).each(function (i, prestasi) {
                            $('#isiPrestasi').append($("<tr>")
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(prestasi.tanggal))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(prestasi.prestasi))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(prestasi.kegiatan))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(prestasi.capaian))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(prestasi.point))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(`
                                    <button class="bg-blue-200 hover:bg-blue-e00 hover:text-white text-blue-500 text-center py-1 px-3 rounded btneditPrestasi" data-tutid="` 
                                    + prestasi.id +`">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-1 px-3 rounded btndeletePrestasi" data-tutid="` 
                                    + prestasi.id +`">Delete</button>
                                    `)));
                        });
                        loadButtonss();
                    }
                })
            }
    
            function updatePrestasi(id){
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/prestasi/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $($("#updatePrestasii")[0].id).val(data.id);
                        $($("#updatePrestasii")[0].updateTanggal).val(data.tanggal);
                        $($("#updatePrestasii")[0].updatePrestasi).val(data.prestasi);
                        $($("#updatePrestasii")[0].updateKegiatan).val(data.kegiatan);
                        $($("#updatePrestasii")[0].updateCapaian).val(data.capaian);
                        $($("#updatePrestasii")[0].updatePoint).val(data.point);
                        $("#updatePrestasii").show();
                    }
                });
            }
    
            $("#submitData").on("click", function (e) {
                let data = {
                    tanggal: $($("#tabelTambah")[0].tanggal).val(),
                    prestasi: $($("#tabelTambah")[0].prestasi).val(),
                    kegiatan: $($("#tabelTambah")[0].kegiatan).val(),
                    capaian: $($("#tabelTambah")[0].capaian).val(),
                    point: $($("#tabelTambah")[0].point).val()
                }
    
                postData(data);
                $("#tabelTambah").trigger("reset");
                $("#tabelTambah").toggle();
                e.preventDefault();
    
            });
    
            function postData(data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/prestasi',
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getPrestasi();;
                    }
                });
            }
    
            function loadButtonss() {
                $(".btneditPrestasi").click(function (e) {
                    updatePrestasi($($(this)[0]).data("tutid"));
                    e.preventDefault();
                });
    
                $(".btndeletePrestasi").click(function (e) {
                    deletePrestasi($($(this)[0]).data("tutid"));
                    e.preventDefault();
                })
            }
    
            function putData(id, data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/prestasi/' + id,
                    method: 'PUT',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getPrestasi();
                    }
                });
            }
    
            $("#btnUpdatePrestasi").on("click", function (e) {
                let data = {
                    tanggal: $($("#updatePrestasii")[0].updateTanggal).val(),
                    prestasi: $($("#updatePrestasii")[0].updatePrestasi).val(),
                    kegiatan: $($("#updatePrestasii")[0].updateKegiatan).val(),
                    capaian: $($("#updatePrestasii")[0].updateCapaian).val(),
                    point: $($("#updatePrestasii")[0].updatePoint).val()
                }
    
                putData($($("#updatePrestasii")[0].id).val(), data);
                $("#updatePrestasii").trigger("reset");
                $("#updatePrestasii").toggle();
                e.preventDefault();
    
            });
    
            function deletePrestasi(id) {
                var API ='{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/prestasi/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        getPrestasi();
                    }
                });
            }
        });
    </script>
</body>
</html>