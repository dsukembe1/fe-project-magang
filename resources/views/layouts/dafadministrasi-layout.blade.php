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

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-left bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 overflow-hidden focus:outline-none">
                    Admin
                </button>
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
                <h1 class="text-3xl text-black">Administrasi</h1>
                <h5>Tahun Ajaran : 20xx/20xx Semester x</h5>

                    {{-- Button Kanan --}}
                    <div class="lg:flex items-center mb-6">
                        <p class="text-2xl font-semibold mb-2 lg:mb-0"></p>
                        <div>
                            <div>
                                <div>
                                    <div class="flex items-right">
                                        <div class="mt-2">
                                            <div class="flex px-4 py-4 space-x-4 overflow-x-auto bg-white rounded-md">
                                                <div class="flex items-center">
                                                        <div class="flex ml-2 mb-5 space-x-4 overflow-x-auto bg-white rounded-md">
                                                            <span>
                                                                <h3>Cari Pengumuman</h3>
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
                                                        </div>
                                                    <span>
                                                        <form action="pengumuman">
                                                            <button id="btnTambah"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 inline-flex rounded ml-4 mt-1">
                                                            <svg class="fill-current w-4 h-4 mr-2"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z">
                                                                </path>
                                                            </svg>
                                                            <span>Tambah Pengumuman</span>
                                                        </button>
                                                        </form>
                                                    </span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Akhir Button Kanan --}}

                <div class="container mx-auto px-3 py-4">
                    <div>
                        <div>
                            <h2>Pengumuman</h2>
                            <div class="w-full max-w-sm mt-6 lg:max-w-full lg:flex">
                                <div class="flex-none h-48 overflow-hidden text-center bg-cover rounded-t lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l"
                                    style="background-image:url('https://padiumkm.id/public/products/11043/572586/dua-futsal1.1646119622.png');"
                                    title="Woman holding a mug"></div>
                                <div
                                    class="flex flex-col justify-between p-4 leading-normal bg-white border-b border-l border-r border-gray-200 rounded-b lg:border-l-0 lg:border-t lg:border-gray-200 lg:rounded-b-none lg:rounded-r">
                                    <div class="mb-8">
                                        <p class="flex items-center text-sm text-gray-600">
                                            <div class="mb-2 text-xl font-bold text-gray-900"> Pengumuman Perlombaan
                                                Futsal</div>
                                            <p class="text-base text-gray-700"> Perlombaan Futsal Antar Kelas Akan
                                                Dilaksankan Pada 1 - 8 Agustus 20xx. Persiapkan Team Anda Untuk
                                                Mengikuti Perlombaan Ini.
                                                Hadiah Berupa Uang Tunai. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    {{-- <script type="text/javascript">
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
                                .append($("<td>").append(kelas6.nis))
                                .append($("<td>").append(kelas6.nama))
                                .append($("<td>").append(kelas6.nama_mapel))
                                .append($("<td>").append(kelas6.nh1))
                                .append($("<td>").append(kelas6.nh2))
                                .append($("<td>").append(kelas6.uts))
                                .append($("<td>").append(kelas6.uas))
                                .append($("<td>").append(kelas6.na))
                                .append($("<td>").append(
                                    `
                                    <button class="bg-blue-200 hover:bg-blue-500 hover:text-white text-blue-500 text-center py-2 px-4 rounded btneditNilai" data-tutid="` +
                                    kelas6.nis +
                                    `">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-2 px-4 rounded btndeleteNilai" data-tutid="` +
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
    </script> --}}
</body>

</html>