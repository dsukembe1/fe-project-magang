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
            <a href="/dashboard" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
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
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 overflow-hidden focus:outline-none mr-1">
                    {{ Auth::user()->name }}
                </button>
                <i class="fas fa-user-circle mt-4"></i>
                <button x-show="isOpen" @click="isOpen = false"
                    class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    {{-- <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a> --}}
                    {{-- <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class=""><i class="fas fa-sign-out-alt fa-fw"></i> Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <!-- Isi -->
                        <div>
                            <h3 class="text-3xl font-medium text-gray-700">Dashboard</h3>
                            <h5>Tahun Ajaran : 20xx/20xx Semester x</h5>
                            <div class="mt-4">
                                <div class="flex flex-wrap -mx-3">
                                    <div class="w-1/2 xl:w-1/3 px-3">
                                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                                            <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                                                <svg class="w-8 h-8 text-white" viewBox="0 0 28 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>

                                            <div class="mx-5">
                                                <h4 class="text-2xl font-semibold text-gray-700">461</h4>
                                                <div class="text-gray-500">Total Guru</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-1/2 xl:w-1/3 px-3">
                                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                                            <div class="p-3 bg-blue-600 bg-opacity-75 rounded-full">
                                                <svg class="w-8 h-8 text-white" viewBox="0 0 28 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>

                                            <div class="mx-5">
                                                <h4 class="text-2xl font-semibold text-gray-700">2,521</h4>
                                                <div class="text-gray-500">Total Siswa</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-1/2 xl:w-1/3 px-3">
                                        <div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
                                            <div class="p-3 bg-red-600 bg-opacity-75 rounded-full">
                                                <svg class="w-8 h-8 text-white" viewBox="0 0 28 30" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>

                                            <div class="mx-5">
                                                <h4 class="text-2xl font-semibold text-gray-700">125</h4>
                                                <div class="text-gray-500">Total Ruangan</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col mt-8">
                            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Nama Guru </th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Mata Pelajaran </th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Status </th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Roles </th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            <tr>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                                Bu Deti</div>
                                                            <div class="text-sm leading-5 text-gray-500">
                                                                deti@gmail.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                    <div class="text-sm leading-5 text-gray-900">Bahasa Indonesia</div>
                                                    <div class="text-sm leading-5 text-gray-500">Kelas 6</div>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"><span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                    Guru</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                                Bu Deti</div>
                                                            <div class="text-sm leading-5 text-gray-500">
                                                                deti@gmail.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                    <div class="text-sm leading-5 text-gray-900">Bahasa Indonesia</div>
                                                    <div class="text-sm leading-5 text-gray-500">Kelas 5</div>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"><span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                    Guru</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                                Bu Deti</div>
                                                            <div class="text-sm leading-5 text-gray-500">
                                                                deti@gmail.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                                    <div class="text-sm leading-5 text-gray-900">Bahasa Indonesia</div>
                                                    <div class="text-sm leading-5 text-gray-500">Kelas 4</div>
                                                </td>
                                                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"><span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                                                    Guru</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Isi  -->
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
</body>

</html>