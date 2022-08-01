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
        <div class="p-6">
            <a href="#" class="text-white text-3xl font-semibold hover:text-gray-300">SekolahXYZ</a>
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
            <a href="dafkurikulum" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-book mr-3"></i>
                Kurikulum
            </a>
            <a href="dafextrakulikuler" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Ekstrakulikuler
            </a>
            <a href="dafprestasi" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Prestasi
            </a>
            <a href="dafadministrasi" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Administrasi
            </a>
            <a href="daftartib" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-hand-paper mr-3"></i>
                Tata Tertib
            </a>
        </nav>
    </aside>
    {{-- Akhir Side Bar --}}

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 overflow-hidden focus:outline-none">
                    Admin
                </button>
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
                                        <form action="dafprestasi">
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

                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <!-- /. ROW  -->
                        <!-- Isi -->
                        <br>
                        <!-- Tabel Data -->
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
                                            <table id="tabelNilai"
                                                class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                                <thead
                                                    class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                                                    <tr>
                                                        <th scope="col" class="py-3 px-6">No. KD</th>
                                                        <th scope="col" class="py-3 px-6">SEMESTER</th>
                                                        <th scope="col" class="py-3 px-6">DESKRIPSI</th>
                                                        <th scope="col" class="py-3 px-6">DESKRIPSI RINGKASAN</th>
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
                                                                        3.1</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">GENAP</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Memahami pengetahuan <p>faktual dengan cara mengamati <p>dan menanya berdasarkan rasa ingin tahu <p>tentang dirinya, makhluk <p>ciptaan Tuhan dan kegiatannya, <p>dan benda-benda yang dijumpainya di <p>rumah, di sekolah dan di tempat bermain</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Menyimpulkan informasi <p>berdasarkan teks laporan <p>hasil pengamatan yang <p>didengar dan dibaca</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="">
                                                                <div class="ml-2">
                                                                    <div
                                                                        class="text-sm font-medium leading-5 text-gray-900">
                                                                        3.2</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">GANJIL</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Memahami pengetahuan <p>faktual dengan cara mengamati <p>dan menanya berdasarkan rasa ingin tahu <p>tentang dirinya, makhluk <p>ciptaan Tuhan dan kegiatannya, <p>dan benda-benda yang dijumpainya di <p>rumah, di sekolah dan di tempat bermain</div>
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                            <div class="text-sm leading-5 text-gray-900">Menyimpulkan informasi <p>berdasarkan teks laporan <p>hasil pengamatan yang <p>didengar dan dibaca</div>
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
    <script type="text/javascript">
        $(document).ready(function () {

            getNilai();

            $("#btnTambah").on("click", function (e) {
                $("#tabelTambah").toggle();
            });

            function getNilai() {
                $('#isiTable').html('');
                $.ajax({
                    url: 'http://127.0.0.1:8080/api/kelas6',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        test: 'test data'
                    },
                    success: function (data) {
                        $(data).each(function (i, kelas6) {
                            $('#isiTable').append($("<tr>")
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.nis))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.nama))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.nama_mapel))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.nh1))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.nh2))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.uts))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.uas))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(kelas6.na))
                                .append($(
                                    '<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(
                                    `
                                    <button class="bg-blue-200 hover:bg-blue-e00 hover:text-white text-blue-500 text-center py-1 px-3 rounded btneditNilai" data-tutid="` +
                                    kelas6.nis +
                                    `">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-1 px-3 rounded btndeleteNilai" data-tutid="` +
                                    kelas6
                                    .nis + `">Delete</button>
                                    `)));
                        });
                        loadButtons();
                    }
                })
            }

            function updateData(id) {
                $.ajax({
                    url: 'http://127.0.0.1:8080/api/kelas6/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function (data) {
                        $($("#updateData")[0].nis).val(data.nis);
                        $($("#updateData")[0].updateNis).val(data.nis);
                        $($("#updateData")[0].updateNama).val(data.nama);
                        $($("#updateData")[0].updateNama_mapel).val(data.nama_mapel);
                        $($("#updateData")[0].updateNh1).val(data.nh1);
                        $($("#updateData")[0].updateNh2).val(data.nh2);
                        $($("#updateData")[0].updateUts).val(data.uts);
                        $($("#updateData")[0].updateUas).val(data.uas);
                        $($("#updateData")[0].updateNa).val(data.na);
                        $("#updateData").show();
                    }
                });
            }

            $("#submitData").on("click", function (e) {
                let data = {
                    nis: $($("#tabelTambah")[0].nis).val(),
                    nama: $($("#tabelTambah")[0].nama).val(),
                    nama_mapel: $($("#tabelTambah")[0].nama_mapel).val(),
                    nh1: $($("#tabelTambah")[0].nh1).val(),
                    nh2: $($("#tabelTambah")[0].nh2).val(),
                    uts: $($("#tabelTambah")[0].uts).val(),
                    uas: $($("#tabelTambah")[0].uas).val(),
                    na: $($("#tabelTambah")[0].na).val()
                }

                postData(data);
                $("#tabelTambah").trigger("reset");
                $("#tabelTambah").toggle();
                e.preventDefault();

            });

            function postData(data) {
                $.ajax({
                    url: 'http://127.0.0.1:8080/api/kelas6',
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getNilai();
                    }
                });
            }

            function loadButtons() {
                $(".btneditNilai").click(function (e) {
                    updateData($($(this)[0]).data("tutid"));
                    e.preventDefault();
                });

                $(".btndeleteNilai").click(function (e) {
                    deleteNilai($($(this)[0]).data("tutid"));
                    e.preventDefault();
                })
            }

            function putData(id, data) {
                $.ajax({
                    url: 'http://127.0.0.1:8080/api/kelas6/' + id,
                    method: 'PUT',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getNilai();
                    }
                });
            }

            $("#btnUpdateData").on("click", function (e) {
                let data = {
                    nis: $($("#updateData")[0].updateNis).val(),
                    nama: $($("#updateData")[0].updateNama).val(),
                    nama_mapel: $($("#updateData")[0].updateNama_mapel).val(),
                    nh1: $($("#updateData")[0].updateNh1).val(),
                    nh2: $($("#updateData")[0].updateNh2).val(),
                    uts: $($("#updateData")[0].updateUts).val(),
                    uas: $($("#updateData")[0].updateUas).val(),
                    na: $($("#updateData")[0].updateNa).val()
                }

                putData($($("#updateData")[0].nis).val(), data);
                $("#updateData").trigger("reset");
                $("#updateData").toggle();
                e.preventDefault();

            });

            function deleteNilai(id) {
                $.ajax({
                    url: 'http://127.0.0.1:8080/api/kelas6/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        getNilai();
                    }
                });
            }

        });
    </script>
</body>

</html>