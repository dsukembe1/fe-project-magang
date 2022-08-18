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

        /* #tabelTambah {
            display: none;
        }

        #updateData {
            display: none;
        } */

        #btnPengumuman{
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
            <a href="dafprestasi" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Prestasi
            </a>
            <a href="dafadministrasi" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
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
    {{-- Akhir Menu --}}

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-left bg-white py-2 px-6 hidden sm:flex">
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
        
        <div class="w-full overflow-x-hidden border-t flex flex-col p-2">
            <main class="h-full overflow-y-auto bg-white">
                <div class="container px-6 mx-auto grid">

                    <div class="lg:flex justify-between items-center mb-6">
                        <p class="text-2xl font-semibold mb-2 lg:mb-0">Pengumuman Baru</p>
                        <div>
                            <div>
                                <div>
                                    <div class="flex items-left">
                                        <div class="mt-2">
                                            <form action="dafadministrasi">
                                                <button class="btn btn-circle btn-outline">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                                  </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Search Bar --}}
                        </div>
                    </div>

                    <!-- General elements -->
                    <form id="tabelTambah">
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md bg-white">
                            <label for="judul" class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Judul Pengumuman</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    id="judul" placeholder="Pengumuman">
                            </label>
    
                            <div class="mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Tujuan Pengumuman
                                </span>
                                <div class="col-sm-10">
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="tujuan" id="tujuan">
                                        <option value="">- Pilih -</option>
                                        <option value="Seluruh Warga Sekolah" <?php if ($kl == "Seluruh Warga Sekolah") echo "selected" ?>>Seluruh Warga Sekolah
                                        </option>
                                        <option value="Seluruh Guru" <?php if ($kl == "Seluruh Guru") echo "selected" ?>>Seluruh Guru
                                        </option>
                                        <option value="Seluruh Siswa - Siswi" <?php if ($kl == "Seluruh Siswa - Siswi") echo "selected" ?>>Seluruh Siswa - Siswi
                                        </option>
                                        <option value="Extrakulikuler" <?php if ($kl == "Extrakulikuler") echo "selected" ?>>Extrakulikuler
                                        </option>
                                        <option value="Orang Tua Murid" <?php if ($kl == "Orang Tua Murid") echo "selected" ?>>Orang Tua Murid
                                        </option>
                                        <option value="Umum" <?php if ($kl == "Umum") echo "selected" ?>>Umum
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <label for="isi" class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Isi Pengumuman</span>
                                <textarea
                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                    id="isi" rows="3" placeholder="Isi Pengumuman"></textarea>
                            </label>
                            <br>
                        </div>
                    </form>
                        <button id="btnPengumuman"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">Simpan
                    </button>
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
    
            getPengumuman();
    
            function getPengumuman() {
                $('#isiPengumuman').html('');
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/pengumuman',
                    method: 'get',
                    dataType: 'json',
                    data: {
                        test: 'test data'
                    },
                    success: function (data) {
                        $(data).each(function (i, pengumuman) {
                            $('#isiPengumuman').append($("<tr>")
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">').append(pengumuman.judul))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(pengumuman.tujuan))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap ellipsis">').append(pengumuman.isi))
                                .append($('<td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">'
                                ).append(`
                                    <button class="bg-blue-200 hover:bg-blue-e00 hover:text-white text-blue-500 text-center py-1 px-3 rounded btneditPengumuman" data-tutid="` 
                                    + pengumuman.id +`">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-1 px-3 rounded btndeletePengumuman" data-tutid="` 
                                    + pengumuman.id +`">Delete</button>
                                    `)));
                        });
                        loadButtonss();
                    }
                })
            }
    
            function updatePengumuman(id){
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/pengumuman/' + id,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $($("#updatePengumuman")[0].id).val(data.id);
                        $($("#updatePengumuman")[0].updateJudul).val(data.judul);
                        $($("#updatePengumuman")[0].updateTujuan).val(data.tujuan);
                        $($("#updatePengumuman")[0].updateIsi).val(data.isi);
                        $("#updatePengumuman").show();
                    }
                });
            }
    
            $("#btnPengumuman").on("click", function (e) {
                let data = {
                    judul: $($("#tabelTambah")[0].judul).val(),
                    tujuan: $($("#tabelTambah")[0].tujuan).val(),
                    isi: $($("#tabelTambah")[0].isi).val()
                }
    
                postData(data);
                $("#tabelTambah").trigger("reset");
                e.preventDefault();
    
            });
    
            function postData(data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/pengumuman',
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getPengumuman();;
                    }
                });
            }
    
            function loadButtonss() {
                $(".btneditPengumuman").click(function (e) {
                    updatePengumuman($($(this)[0]).data("tutid"));
                    e.preventDefault();
                });
    
                $(".btndeletePengumuman").click(function (e) {
                    deletePengumuman($($(this)[0]).data("tutid"));
                    e.preventDefault();
                })
            }
    
            function putData(id, data) {
                var API = '{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/pengumuman/' + id,
                    method: 'PUT',
                    dataType: 'json',
                    data: data,
                    success: function (data) {
                        console.log(data);
                        getPengumuman();
                    }
                });
            }
    
            $("#btnUpdatePengumuman").on("click", function (e) {
                let data = {
                    judul: $($("#updatePengumuman")[0].updateJudul).val(),
                    tujuan: $($("#updatePengumuman")[0].updateTujuan).val(),
                    isi: $($("#updatePengumuman")[0].updateIsi).val()
                }
    
                putData($($("#updatePengumuman")[0].id).val(), data);
                $("#updatePengumuman").trigger("reset");
                $("#updatePengumuman").toggle();
                e.preventDefault();
    
            });
    
            function deletePengumuman(id) {
                var API ='{{env('API_KEY')}}';
                request = $.ajax({
                    url: API+'/api/pengumuman/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        getPengumuman();
                    }
                });
            }
        });
    </script>
</body>

</html>