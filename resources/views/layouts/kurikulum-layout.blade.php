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

        #updateKurikulum {
            display: none;
        }

        #tampilKurikulum {
            display: none;
        }

        #btnCloseKurikulum {
            display: block;
        }

        input[type=text]:disabled {
            background: #dddddd;
        }     
        
        select:disabled {
            background: #dddddd;
        }

        textarea:disabled {
            background: #dddddd;
        }
    </style>

</head>
<?php
$sm = "";
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
            <a href="dafkurikulum" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
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

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                {{-- Header Kiri --}}
                <div class="lg:flex justify-between items-center mb-6">
                    <p class="text-2xl font-semibold mb-2 lg:mb-0">Mata Pelajaran : Bahasa Indonesia ( Kelas 6 )</p>
                    <div>
                        <div>
                            <div>
                                <div class="flex items-left">
                                    <div class="mt-2">
                                        <form action="dafkurikulum">
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

                {{-- Button Data & Download --}}
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
                                                    <span>Tambah Kopetensi</span>
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

                    </div>
                </div>
                {{-- Akhir Button Data & Download --}}

                <!-- Tambah Data -->
                <form id="tabelTambah" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <h2 class="intro-y text-lg font-medium mr-auto mt-2">Tambah Kopetensi</h2><br>
                    <div class="mb-4">
                        <label for="no_kd" class="block text-gray-700 text-sm font-bold mb-2">No Kopetensi</label>
                        <div class="col-sm-10">
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="no_kd" placeholder="No Kopetensi">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="semester" class="block text-gray-700 text-sm font-bold mb-2">Semester</label>
                        <div class="col-sm-10">
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="semester" id="semester">
                                <option value="">- Pilih -</option>
                                <option value="GENAP" <?php if ($sm == "GENAP") echo "selected" ?>>GENAP
                                </option>
                                <option value="GANJIL"
                                    <?php if ($sm == "GANJIL") echo "selected" ?>>GANJIL
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="desk" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" id="desk" placeholder="Deskripsi"></textarea>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="desk_ringkasan" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Ringkasan</label>
                        <div class="col-sm-10">
                            <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" id="desk_ringkasan" placeholder="Deskripsi Ringkasan"></textarea>
                        </div>
                    </div>

                    <button id="submitData" type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">Tambah</button>
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
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Nama Mata
                                                    Pelajaran</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Kode Mapel</th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Program</th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Kelompok</th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6"></th>
                                                <th scope="col" class="py-3 px-6" style="color: #0038fd">Mapel Induk
                                                </th>
                                                <th scope="col" class="py-3 px-6"></th>
                                            </tr>
                                        </thead>
                                        <tbody align="center" class="bg-white">
                                            <td class="px-4 py-2 whitespace-nowrap">Bahasa Indonesia</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">BI</td>
                                            <td class="px-4 py-2 whitespace-nowrap">Umum</td>
                                            <td class="px-4 py-2 whitespace-nowrap">Wajib</td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap"></td>
                                            <td class="px-4 py-2 whitespace-nowrap">Bahasa Indonesia</td>
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
                                <h2 style="color: #0038fd">Ketuntasan Minimal</h2>
                                <p>Kelas</p>
                                <p class="font-semibold text-3xl">Kelas 6</p>
                            </div>
                            <div class="text-gray-700">
                                <br>
                                <p>KKM</p>
                                <p class="font-semibold text-3xl">75</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <div class="text-gray-700">
                                <h2 style="color: #0038fd">Pengetahuan</h2>
                                <p class="font-semibold">A : 91 - 100</p>
                                <p class="font-semibold">B : 80 - 90</p>
                                <p class="font-semibold">C : 70 - 79</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2 xl:w-1/3 px-3">
                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                            <div class="text-gray-700">
                                <h2 style="color: #0038fd">Keterampilan</h2>
                                <p class="font-semibold">A : 91 - 100</p>
                                <p class="font-semibold">B : 80 - 90</p>
                                <p class="font-semibold">C : 70 - 79</p>
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
                                <span>
                                    <h3>Kopetensi Dasar</h3>
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
                                    <h3>Semester</h3>
                                    <div class="flex items-left"><button
                                            class="text-gray-500 focus:outline-none lg:hidden"></button>

                                        <div class="relative mx-4 lg:mx-0"><span
                                                class="absolute inset-y-0 left-0 flex items-left pl-3"></span>
                                            <select
                                                class="text-black border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500">
                                                <option>Search</option>
                                                <option>GENAP</option>
                                                <option>GANJIL</option>
                                            </select>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Search Bar --}}
                <br>

                <!-- Update Data -->
                <div id="updateDataDiv">
                    <form id="updateKurikulum" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <h2 class="intro-y text-lg font-medium mr-auto mt-2">Edit Kopetensi</h2>
                        <div class="mb-4">
                            <div class="col-sm-10">
                                <input type="hidden"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="no_kd">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updateNo_kd"
                                class="block text-gray-700 text-sm font-bold mb-2">No Kopetensi</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="updateNo_kd" placeholder="No Kopetensi">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updateSemester"
                                class="block text-gray-700 text-sm font-bold mb-2">Semester</label>
                            <div class="col-sm-10">
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="updateSemester" id="updateSemester">
                                    <option value="">- Pilih -</option>
                                <option value="GENAP" <?php if ($sm == "GENAP") echo "selected" ?>>GENAP
                                </option>
                                <option value="GANJIL"
                                    <?php if ($sm == "GANJIL") echo "selected" ?>>GANJIL
                                </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updateDesk" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" id="updateDesk" placeholder="Deskripsi"></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="updateDesk_ringkasan" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Ringkasan</label>
                            <div class="col-sm-10">
                                <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" id="updateDesk_ringkasan" placeholder="Deskripsi Ringkasan"></textarea>
                            </div>
                        </div>

                        <button id="btnUpdateKurikulum" type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">UPDATE</button>
                    </form>
                </div>
                <!-- Akhir Update Data -->

                <!-- Tampil Data -->
                <div id="tampilDataDiv">
                    <form id="tampilKurikulum" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <h2 class="intro-y text-lg font-medium mr-auto mt-2">Data Kopetensi</h2>
                        <div class="mb-4">
                            <div class="col-sm-10">
                                <input type="hidden"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="no_kd">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tampilNo_kd"
                                class="block text-gray-700 text-sm font-bold mb-2">No Kopetensi</label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="tampilNo_kd" placeholder="No Kopetensi" disabled="disabled">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tampilSemester"
                                class="block text-gray-700 text-sm font-bold mb-2">Semester</label>
                            <div class="col-sm-10">
                                <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="tampilSemester" id="tampilSemester" disabled="disabled">
                                    <option value="">- Pilih -</option>
                                <option value="GENAP" <?php if ($sm == "GENAP") echo "selected" ?>>GENAP
                                </option>
                                <option value="GANJIL"
                                    <?php if ($sm == "GANJIL") echo "selected" ?>>GANJIL
                                </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tampilDesk" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" id="tampilDesk" placeholder="Deskripsi" disabled="disabled"></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="tampilDesk_ringkasan" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Ringkasan</label>
                            <div class="col-sm-10">
                                <textarea
                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                rows="3" id="tampilDesk_ringkasan" placeholder="Deskripsi Ringkasan" disabled="disabled"></textarea>
                            </div>
                        </div>
                        <button id="btnCloseKurikulum" type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">Close</button>
                    </form>
                </div>
                <!-- Akhir Tampil Data -->

                <!-- Tabel Data -->
                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <!-- /. ROW  -->
                        <!-- Isi -->
                        <br>
                        <div class="flex px-4 py-4 space-x-4 bg-white rounded-md mb-3">
                            <div class="flex items-center">
                                <h1 class="ml-3 font-bold">KD Pengetahuan : 12 Kopetensi</h1><br>
                            </div>
                        </div>

                        <div id="page-wrapper">
                            <div id="w-full max-w-xs">
                                <div class="flex flex-col">
                                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                        <div
                                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                            <table id="tabelKurikulum"
                                                class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                                <thead
                                                    class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                                                    <tr>
                                                        <th scope="col" class="py-3 px-6">No. KD</th>
                                                        <th scope="col" class="py-3 px-6">SEMESTER</th>
                                                        <th scope="col" class="py-3 px-6">DESKRIPSI</th>
                                                        <th scope="col" class="py-3 px-6">DESKRIPSI RINGKASAN</th>
                                                        <th scope="col" class="py-3 px-6">ACTION</th>
                                                    </tr>
                                                </thead>
                                                    <tbody id="isiKurikulum" class="bg-white">
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
    
            getKurikulum();
    
            $("#btnTambah").on("click", function (e) {
                $("#tabelTambah").toggle();
            });
    
            function getKurikulum() {
                $('#isiKurikulum').html('');
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/kurikulum',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        test: 'test data'
                    },
                    success: function (data) {
                        $(data).each(function (i, kurikulum) {
                            $('#isiKurikulum').append($("<tr>")
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(kurikulum.no_kd))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis text-green-700">').append(kurikulum.semester))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(kurikulum.desk))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(kurikulum.desk_ringkasan))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(`
                                    <button class="bg-green-200 hover:bg-green-e00 hover:text-white text-green-500 text-center py-1 px-3 rounded btntampilKurikulum" data-tutid="` 
                                    + kurikulum.no_kd +`">Detail</button>
                                    <button class="bg-blue-200 hover:bg-blue-e00 hover:text-white text-blue-500 text-center py-1 px-3 rounded btneditKurikulum" data-tutid="` 
                                    + kurikulum.no_kd +`">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-1 px-3 rounded btndeleteKurikulum" data-tutid="` 
                                    + kurikulum.no_kd +`">Delete</button>
                                    `)));
                        });
                        loadButtonss();
                    }
                })
            }
    
            function updateKurikulum(id){
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/kurikulum/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $($("#updateKurikulum")[0].no_kd).val(data.no_kd);
                        $($("#updateKurikulum")[0].updateNo_kd).val(data.no_kd);
                        $($("#updateKurikulum")[0].updateSemester).val(data.semester);
                        $($("#updateKurikulum")[0].updateDesk).val(data.desk);
                        $($("#updateKurikulum")[0].updateDesk_ringkasan).val(data.desk_ringkasan);
                        $("#updateKurikulum").show();
                    }
                });
            }

            function tampilKurikulum(id){
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/kurikulum/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $($("#tampilKurikulum")[0].no_kd).val(data.no_kd);;
                        $($("#tampilKurikulum")[0].tampilNo_kd).val(data.no_kd);
                        $($("#tampilKurikulum")[0].tampilSemester).val(data.semester);
                        $($("#tampilKurikulum")[0].tampilDesk).val(data.desk);
                        $($("#tampilKurikulum")[0].tampilDesk_ringkasan).val(data.desk_ringkasan);
                        $("#tampilKurikulum").show();
                    }
                });
            }
    
            $("#submitData").on("click", function (e) {
                let data = {
                    no_kd: $($("#tabelTambah")[0].no_kd).val(),
                    semester: $($("#tabelTambah")[0].semester).val(),
                    desk: $($("#tabelTambah")[0].desk).val(),
                    desk_ringkasan: $($("#tabelTambah")[0].desk_ringkasan).val()
                }
    
                postData(data);
                $("#tabelTambah").trigger("reset");
                $("#tabelTambah").toggle();
                e.preventDefault();
    
            });
    
            function postData(data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/kurikulum',
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getKurikulum();
                    }
                });
            }
    
            function loadButtonss() {
                $(".btneditKurikulum").click(function (e) {
                    updateKurikulum($($(this)[0]).data("tutid"));
                    e.preventDefault();
                });

                $(".btntampilKurikulum").click(function (e) {
                    tampilKurikulum($($(this)[0]).data("tutid"));
                    e.preventDefault();
                });
    
                $(".btndeleteKurikulum").click(function (e) {
                    deleteKurikulum($($(this)[0]).data("tutid"));
                    e.preventDefault();
                })
            }
    
            function putData(id, data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/kurikulum/' + id,
                    method: 'PUT',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getKurikulum();
                    }
                });
            }
    
            $("#btnUpdateKurikulum").on("click", function (e) {
                let data = {
                    no_kd: $($("#updateKurikulum")[0].updateNo_kd).val(),
                    semester: $($("#updateKurikulum")[0].updateSemester).val(),
                    desk: $($("#updateKurikulum")[0].updateDesk).val(),
                    desk_ringkasan: $($("#updateKurikulum")[0].updateDesk_ringkasan).val()
                }
    
                putData($($("#updateKurikulum")[0].no_kd).val(), data);
                $("#updateKurikulum").trigger("reset");
                $("#updateKurikulum").toggle();
                e.preventDefault();
    
            });
    
            function deleteKurikulum(id) {
                var API ='{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/kurikulum/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        getKurikulum();
                    }
                });
            }
    
        });
    </script>

    {{-- Akhir Connect API --}}
</body>

</html>