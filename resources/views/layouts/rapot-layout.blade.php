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

        #updateRapot {
            display: none;
        }

        #submitData{
            float: right;
            margin-bottom: 2%;
        }

        #btnUpdateRapot{
            float: right;
            margin-bottom: 2%;
        }
    </style>

</head>
<?php
$s1 = "";
$s2 = "";
$s3 = "";
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
                                                    <span>Nilai</span>
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

                <!-- Tambah Data -->
                <form id="tabelTambah" class="mt-4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="intro-y text-lg font-medium mr-auto mt-2">Tambah Data Rapot</h2><br>
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
                        <label for="nis"
                            class="block text-gray-700 text-sm font-bold mb-2">NIS</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="nis" placeholder="NIS">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="sakit"
                            class="block text-gray-700 text-sm font-bold mb-2">Sakit</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="sakit" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="izin"
                            class="block text-gray-700 text-sm font-bold mb-2">Izin</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="izin" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alpha"
                            class="block text-gray-700 text-sm font-bold mb-2">Alpha</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="alpha" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="total"
                            class="block text-gray-700 text-sm font-bold mb-2">Total</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="total" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="ns1" class="block text-gray-700 text-sm font-bold mb-2">Nilai Sikap 1</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="ns1" id="ns1">
                                <option value="">- Pilih -</option>
                                <option value="A" <?php if ($s1 == "A") echo "selected" ?>>A
                                </option>
                                <option value="AB" <?php if ($s1 == "AB") echo "selected" ?>>AB
                                </option>
                                <option value="B" <?php if ($s1 == "B") echo "selected" ?>>B
                                </option>
                                <option value="BC" <?php if ($s1 == "BC") echo "selected" ?>>BC
                                </option>
                                <option value="C" <?php if ($s1 == "C") echo "selected" ?>>C
                                </option>
                                <option value="D" <?php if ($s1 == "D") echo "selected" ?>>D
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="ns2" class="block text-gray-700 text-sm font-bold mb-2">Nilai Sikap 2</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="ns2" id="ns2">
                                <option value="">- Pilih -</option>
                                <option value="A" <?php if ($s2 == "A") echo "selected" ?>>A
                                </option>
                                <option value="AB" <?php if ($s2 == "AB") echo "selected" ?>>AB
                                </option>
                                <option value="B" <?php if ($s2 == "B") echo "selected" ?>>B
                                </option>
                                <option value="BC" <?php if ($s2 == "BC") echo "selected" ?>>BC
                                </option>
                                <option value="C" <?php if ($s2 == "C") echo "selected" ?>>C
                                </option>
                                <option value="D" <?php if ($s2 == "D") echo "selected" ?>>D
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="ns3" class="block text-gray-700 text-sm font-bold mb-2">Nilai Sikap 3</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="ns3" id="ns3">
                                <option value="">- Pilih -</option>
                                <option value="A" <?php if ($s3 == "A") echo "selected" ?>>A
                                </option>
                                <option value="AB" <?php if ($s3 == "AB") echo "selected" ?>>AB
                                </option>
                                <option value="B" <?php if ($s3 == "B") echo "selected" ?>>B
                                </option>
                                <option value="BC" <?php if ($s3 == "BC") echo "selected" ?>>BC
                                </option>
                                <option value="C" <?php if ($s3 == "C") echo "selected" ?>>C
                                </option>
                                <option value="D" <?php if ($s3 == "D") echo "selected" ?>>D
                                </option>
                            </select>
                        </div>
                    </div>

                    <button id="submitData"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">Tambah</button>
                    <br>
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

                <!-- Update Data -->
                <form id="updateRapot" class="mt-4 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="intro-y text-lg font-medium mr-auto mt-2">Tambah Data Rapot</h2><br>
                    <div class="mb-4">
                        <div class="col-sm-10">
                            <input type="hidden"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="id">
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
                        <label for="updateNis"
                            class="block text-gray-700 text-sm font-bold mb-2">NIS</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="updateNis" placeholder="NIS">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="updateSakit"
                            class="block text-gray-700 text-sm font-bold mb-2">Sakit</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="updateSakit" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="updateIzin"
                            class="block text-gray-700 text-sm font-bold mb-2">Izin</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="updateIzin" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="updateAlpha"
                            class="block text-gray-700 text-sm font-bold mb-2">Alpha</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="updateAlpha" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="updateTotal"
                            class="block text-gray-700 text-sm font-bold mb-2">Total</label>
                            <span><small>*Tidak Boleh Kosong</small></span>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="updateTotal" placeholder="0 / Total Hari">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="updateNs1" class="block text-gray-700 text-sm font-bold mb-2">Nilai Sikap 1</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="updateNs1" id="updateNs1">
                                <option value="">- Pilih -</option>
                                <option value="A" <?php if ($s1 == "A") echo "selected" ?>>A
                                </option>
                                <option value="AB" <?php if ($s1 == "AB") echo "selected" ?>>AB
                                </option>
                                <option value="B" <?php if ($s1 == "B") echo "selected" ?>>B
                                </option>
                                <option value="BC" <?php if ($s1 == "BC") echo "selected" ?>>BC
                                </option>
                                <option value="C" <?php if ($s1 == "C") echo "selected" ?>>C
                                </option>
                                <option value="D" <?php if ($s1 == "D") echo "selected" ?>>D
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="updateNs2" class="block text-gray-700 text-sm font-bold mb-2">Nilai Sikap 2</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="updateNs2" id="updateNs2">
                                <option value="">- Pilih -</option>
                                <option value="A" <?php if ($s2 == "A") echo "selected" ?>>A
                                </option>
                                <option value="AB" <?php if ($s2 == "AB") echo "selected" ?>>AB
                                </option>
                                <option value="B" <?php if ($s2 == "B") echo "selected" ?>>B
                                </option>
                                <option value="BC" <?php if ($s2 == "BC") echo "selected" ?>>BC
                                </option>
                                <option value="C" <?php if ($s2 == "C") echo "selected" ?>>C
                                </option>
                                <option value="D" <?php if ($s2 == "D") echo "selected" ?>>D
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="updateNs3" class="block text-gray-700 text-sm font-bold mb-2">Nilai Sikap 3</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="updateNs3" id="updateNs3">
                                <option value="">- Pilih -</option>
                                <option value="A" <?php if ($s3 == "A") echo "selected" ?>>A
                                </option>
                                <option value="AB" <?php if ($s3 == "AB") echo "selected" ?>>AB
                                </option>
                                <option value="B" <?php if ($s3 == "B") echo "selected" ?>>B
                                </option>
                                <option value="BC" <?php if ($s3 == "BC") echo "selected" ?>>BC
                                </option>
                                <option value="C" <?php if ($s3 == "C") echo "selected" ?>>C
                                </option>
                                <option value="D" <?php if ($s3 == "D") echo "selected" ?>>D
                                </option>
                            </select>
                        </div>
                    </div>

                    <button id="btnUpdateRapot"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded">Simpan</button>
                    <br>
                </form>
                <!-- Akhir Update Data -->

                {{-- Isi Tabel --}}
                <div class="flex flex-col mt-8">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            <table id="tabelRapot" class="min-w-full">
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
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Action
                                        </th>
                                    </tr>
                                    <tr>
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
                                            Alpha
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
                                        <th
                                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="isiRapot" class="bg-white">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Akhir Isi Tabel --}}
                </div>
                {{-- Akhir Isi Tabel --}}

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

    {{-- Connect API --}}
    <script type="text/javascript">
        $(document).ready(function () {
    
            getRapot();

            $("#btnTambah").on("click", function (e) {
                $("#tabelTambah").toggle();
            });
    
            function getRapot() {
                $('#isiRapot').html('');
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/rapot',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        test: 'test data'
                    },
                    success: function (data) {
                        $(data).each(function (i, rapot) {
                            $('#isiRapot').append($("<tr>")
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(rapot.nama))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(rapot.nis))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(rapot.sakit))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(rapot.izin))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(rapot.alpha))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(rapot.total))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(rapot.ns1))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(rapot.ns2))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(rapot.ns3))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(`
                                    <button class="bg-blue-200 hover:bg-blue-e00 hover:text-white text-blue-500 text-center py-1 px-3 rounded btneditRapot" data-tutid="` 
                                    + rapot.id +`">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-1 px-3 rounded btndeleteRapot" data-tutid="` 
                                    + rapot.id +`">Delete</button>
                                    `)));
                        });
                        loadButtonss();
                    }
                })
            }
    
            function updateRapot(id){
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/rapot/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $($("#updateRapot")[0].id).val(data.id);
                        $($("#updateRapot")[0].updateNama).val(data.nama);
                        $($("#updateRapot")[0].updateNis).val(data.nis);
                        $($("#updateRapot")[0].updateSakit).val(data.sakit);
                        $($("#updateRapot")[0].updateIzin).val(data.izin);
                        $($("#updateRapot")[0].updateAlpha).val(data.alpha);
                        $($("#updateRapot")[0].updateTotal).val(data.total);
                        $($("#updateRapot")[0].updateNs1).val(data.ns1);
                        $($("#updateRapot")[0].updateNs2).val(data.ns2);
                        $($("#updateRapot")[0].updateNs3).val(data.ns3);
                        $("#updateRapot").show();
                    }
                });
            }
    
            $("#submitData").on("click", function (e) {
                let data = {
                    nama: $($("#tabelTambah")[0].nama).val(),
                    nis: $($("#tabelTambah")[0].nis).val(),
                    sakit: $($("#tabelTambah")[0].sakit).val(),
                    izin: $($("#tabelTambah")[0].izin).val(),
                    alpha: $($("#tabelTambah")[0].alpha).val(),
                    total: $($("#tabelTambah")[0].total).val(),
                    ns1: $($("#tabelTambah")[0].ns1).val(),
                    ns2: $($("#tabelTambah")[0].ns2).val(),
                    ns3: $($("#tabelTambah")[0].ns3).val()
                }
    
                postData(data);
                $("#tabelTambah").trigger("reset");
                $("#tabelTambah").toggle();
                e.preventDefault();
    
            });
    
            function postData(data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/rapot',
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getRapot();;
                    }
                });
            }
    
            function loadButtonss() {
                $(".btneditRapot").click(function (e) {
                    updateRapot($($(this)[0]).data("tutid"));
                    e.preventDefault();
                });
    
                $(".btndeleteRapot").click(function (e) {
                    deleteRapot($($(this)[0]).data("tutid"));
                    e.preventDefault();
                })
            }
    
            function putData(id, data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/rapot/' + id,
                    method: 'PUT',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getRapot();
                    }
                });
            }
    
            $("#btnUpdateRapot").on("click", function (e) {
                let data = {
                    nama: $($("#updateRapot")[0].updateNama).val(),
                    nis: $($("#updateRapot")[0].updateNis).val(),
                    sakit: $($("#updateRapot")[0].updateSakit).val(),
                    izin: $($("#updateRapot")[0].updateIzin).val(),
                    alpha: $($("#updateRapot")[0].updateAlpha).val(),
                    total: $($("#updateRapot")[0].updateTotal).val(),
                    ns1: $($("#updateRapot")[0].updateNs1).val(),
                    ns2: $($("#updateRapot")[0].updateNs2).val(),
                    ns3: $($("#updateRapot")[0].updateNs3).val()
                }
    
                putData($($("#updateRapot")[0].id).val(), data);
                $("#updateRapot").trigger("reset");
                $("#updateRapot").toggle();
                e.preventDefault();
    
            });
    
            function deleteRapot(id) {
                var API ='{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/rapot/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        getRapot();
                    }
                });
            }
        });
    </script>
</body>
</html>