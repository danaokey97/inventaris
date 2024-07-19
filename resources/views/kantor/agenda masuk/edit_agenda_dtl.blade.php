<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum=1.0" />
    <title>Dashboard - Kantor</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('partials.aside')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Modal Tambah Barang -->
                        <div tabindex="-1" aria-labelledby="modalTambahBarangLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="modal-body">
                                        <form action="{{ route('agendadtls.update', $agendadtl->id ) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <!-- Input untuk nama barang -->
                                            <input type="hidden" name="id_agenda" id="" value="{{ old('id_agenda')">
                                            <!-- Input untuk Lokasi -->
                                            <div class="mb-3">
                                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" 
                                                        placeholder="Nama Barang" value="{{ old('agenda_masuk_detail', $agendadtl->nama_barang) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="merk" class="form-label">Merk</label>
                                                        <input type="text" class="form-control" id="merk" name="merk"
                                                            placeholder="Merk" value="{{ old('agenda_masuk_detail', $agendadtl->merk) }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="tipe" class="form-label">Tipe</label>
                                                        <input type="text" class="form-control" id="tipe" name="tipe"
                                                            placeholder="Tipe" value="{{ old('agenda_masuk_detail', $agendadtl->tipe) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="satuan" class="form-label">Jumlah Barang</label>
                                                <input type="text" class="form-control" id="satuan" name="satuan"
                                                    placeholder="Jumlah Barang" value="{{ old('agenda_masuk_detail', $agendadtl->satuan) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="harga_satuan" class="form-label">Harga
                                                            Satuan</label>
                                                        <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" 
                                                                placeholder="Harga Satuan" value="{{ old('agenda_masuk_detail', $agendadtl->harga_satuan) }}" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="biaya_atribusi" class="form-label">Biaya
                                                            Atribusi</label>
                                                        <input type="number" class="form-control" id="biaya_atribusi" name="biaya_atribusi" 
                                                                placeholder="Biaya Atribusi" value="{{ old('agenda_masuk_detail', $agendadtl->biaya_atribusi) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Tombol untuk menyimpan data -->
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

        <!-- Vendors JS -->
        <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <!-- Page JS -->
        <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>