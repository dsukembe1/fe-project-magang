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
            <a href="index.html" class="text-white text-3xl font-semibold hover:text-gray-300">SekolahXYZ</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="index.html" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Nilai
            </a>
            {{-- <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Blank Page
            </a> --}}
            {{-- <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a> --}}
        </nav>
        {{-- <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
                <i class="fas fa-arrow-circle-up mr-3"></i>
                Upgrade to Pro!
            </a> --}}
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen"
                    class="realtive z-10 w-12 h-12 overflow-hidden focus:outline-none">
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
                        <button type="submit"
                            class=""><i
                                class="fas fa-sign-out-alt fa-fw"></i>Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Dashboard Nilai</h1>
                <div id="page-wrapper">
                    <div id="w-full max-w-xs">
                        <!-- /. ROW  -->
                        <!-- Isi -->
                        <button id="btnTambah"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                            Data</button><br />
                        <form id="tabelTambah" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            <div class="mb-4">
                                <label for="nis" class="block text-gray-700 text-sm font-bold mb-2">NIS</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="nis" placeholder="NIS">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="nis" class="block text-gray-700 text-sm font-bold mb-2">NAMA</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="nama" placeholder="NAMA">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="nama_mapel" class="block text-gray-700 text-sm font-bold mb-2">MATA
                                    PELAJARAN</label>
                                <div class="col-sm-10">
                                    <select
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        name="nama_mapel" id="nama_mapel">
                                        <option value="">- Pilih -</option>
                                        <option value="Agama" <?php if ($mapel == "Agama") echo "selected" ?>>Agama
                                        </option>
                                        <option value="Bahasa Indonesia"
                                            <?php if ($mapel == "Bahasa Indonesia") echo "selected" ?>>Bahasa Indonesia
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="nh1" class="block text-gray-700 text-sm font-bold mb-2">NILAI HARIAN
                                    1</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="nh1" placeholder="NILAI HARIAN 1">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="nh2" class="block text-gray-700 text-sm font-bold mb-2">NILAI HARIAN
                                    2</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="nh2" placeholder="NILAI HARIAN 2">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="uts" class="block text-gray-700 text-sm font-bold mb-2">NILAI UTS</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="uts" placeholder="NILAI UTS">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="uas" class="block text-gray-700 text-sm font-bold mb-2">NILAI UAS</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="uas" placeholder="NILAI UAS">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="na" class="block text-gray-700 text-sm font-bold mb-2">NILAI AKHIR</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="na" placeholder="NILAI AKHIR">
                                </div>
                            </div>
                            <button id="submitData" type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">Tambah</button>
                        </form>

                        <!-- Update Data -->
                        <div id="updateDataDiv">
                            <form id="updateData">
                                <div class="mb-4">
                                    <div class="col-sm-10">
                                        <input type="hidden"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="nis">
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
                                        class="block text-gray-700 text-sm font-bold mb-2">NAMA</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="updateNama" placeholder="NAMA">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="updateNama_mapel"
                                        class="block text-gray-700 text-sm font-bold mb-2">MATA PELAJARAN</label>
                                    <div class="col-sm-10">
                                        <select
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name="updateNama_mapel" id="updateNama_mapel">
                                            <option value="">- Pilih -</option>
                                            <option value="Agama" <?php if ($mapel == "Agama") echo "selected" ?>>Agama
                                            </option>
                                            <option value="Bahasa Indonesia"
                                                <?php if ($mapel == "Bahasa Indonesia") echo "selected" ?>>Bahasa
                                                Indonesia
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="updateNh1" class="block text-gray-700 text-sm font-bold mb-2">NILAI
                                        HARIAN 1</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="updateNh1" placeholder="NILAI HARIAN 1">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="updateNh2" class="block text-gray-700 text-sm font-bold mb-2">NILAI
                                        HARIAN 2</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="updateNh2" placeholder="NILAI HARIAN 2">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="updateUts" class="block text-gray-700 text-sm font-bold mb-2">NILAI
                                        UTS</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="updateUts" placeholder="NILAI UTS">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="updateUas" class="block text-gray-700 text-sm font-bold mb-2">NILAI
                                        UAS</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="updateUas" placeholder="NILAI UAS">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="updateNa" cclass="block text-gray-700 text-sm font-bold mb-2">NILAI
                                        AKHIR</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="updateNa" placeholder="NILAI AKHIR">
                                    </div>
                                </div>
                                <button id="btnUpdateData" type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded">UPDATE</button>
                            </form>
                        </div><br>

                        <!-- Tabel Data -->
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table id="tabelNilai" class="w-full text-sm text-left text-black-500 dark:text-black-400">
                                <thead class="text-xs text-black-700 uppercase bg-black-50 dark:bg-black-700 dark:text-black-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">NIS</th>
                                        <th scope="col" class="py-3 px-6">NAMA</th>
                                        <th scope="col" class="py-3 px-6">MATA PELAJARAN</th>
                                        <th scope="col" class="py-3 px-6">NILAI HARIAN 1</th>
                                        <th scope="col" class="py-3 px-6">NILAI HARIAN 2</th>
                                        <th scope="col" class="py-3 px-6">NILAI UTS</th>
                                        <th scope="col" class="py-3 px-6">NILAI UAS</th>
                                        <th scope="col" class="py-3 px-6">NILAI AKHIR</th>
                                        <th scope="col" class="py-3 px-6">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="isiTable">
                                </tbody>
                            </table>
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
                                .append($("<td>").append(kelas6.nis))
                                .append($("<td>").append(kelas6.nama))
                                .append($("<td>").append(kelas6.nama_mapel))
                                .append($("<td>").append(kelas6.nh1))
                                .append($("<td>").append(kelas6.nh2))
                                .append($("<td>").append(kelas6.uts))
                                .append($("<td>").append(kelas6.uas))
                                .append($("<td>").append(kelas6.na))
                                .append($("<td>").append(`
                                    <button class="bg-blue-200 hover:bg-blue-500 hover:text-white text-blue-500 text-center py-2 px-4 rounded btneditNilai" data-tutid="` + kelas6.nis + `">Edit</button> 
                                    <button class="bg-red-200 hover:bg-red-500 hover:text-white text-red-500 text-center py-2 px-4 rounded btndeleteNilai" data-tutid="` + kelas6
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