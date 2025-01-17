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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                        <h3> Barang Kegiatan Masuk </h3>
                        <!-- Pencarian -->
                        <div class="row mb-3">
                            <div class="col text-end">
                                <a href="{{ route('agendadtls.create', $agenda->id) }}">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalTambahBarang">Tambah Barang</button></a>
                            </div>
                        </div>

                        <!-- Tabel Barang -->
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped" id='agenda_table'>
                                    <thead>
                                        <tr class="text-center">
                                            <th>Nama Kegiatan</th>
                                            <th>Nama Barang</th>
                                            <th>Gambar</th>
                                            <th>Merk</th>
                                            <th>Tipe</th>
                                            <th>No Rangka</th>
                                            <th>No Mesin</th>
                                            <th>No Polisi</th>
                                            <th>No BPKB</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Lokasi</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit Barang -->
                    <div class="modal fade" id="modalEditBarang" tabindex="-1" aria-labelledby="modalEditBarangLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditBarangLabel">Edit Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editBarangForm" action="" method="POST">
                                        <input type="hidden" id="edit_id_barang" name="id_barang">
                                        <div class="mb-3">
                                            <label for="edit_namaBarang" class="form-label">Nama Barang</label>
                                            <input type="text" class="form-control" id="edit_namaBarang"
                                                name="nama_barang" placeholder="Nama Barang" required>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="edit_kategori" class="form-label">Kategori</label>
                                                <input type="text" class="form-control" id="edit_kategori"
                                                    name="kategori" placeholder="Kategori" required>
                                            </div>
                                            <div class="col">
                                                <label for="edit_lokasi" class="form-label">Lokasi</label>
                                                <input type="text" class="form-control" id="edit_lokasi" name="lokasi"
                                                    placeholder="Lokasi" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Hapus Barang -->
                    <div class="modal fade" id="modalHapusBarang" tabindex="-1" aria-labelledby="modalHapusBarangLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalHapusBarangLabel">Hapus Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin? Semua data yang berhubungan akan ikut terhapus</p>
                                </div>
                                <div class="modal-footer">
                                    <form id="formHapusBarang" action="../../controller/hapus_barang.php" method="POST">
                                        <input type="hidden" id="hapus_id_barang" name="id_barang">
                                        <button type="submit" class="btn btn-danger">Konfirmasi Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- / Content -->

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

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#agenda_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('agendadtls.getData', $agenda->id) }}',
                    type: 'GET'
                },
                columns: [
                    { data: 'nama_agenda', name: 'nama_agenda' },
                    { data: 'nama_barang', name: 'nama_barang' },
                    { data: 'gambar', name: 'gambar', orderable: false, searchable: false },
                    { data: 'merk', name: 'merk' },
                    { data: 'tipe', name: 'tipe' },
                    { data: 'no_rangka', name: 'no_rangka' },
                    { data: 'no_mesin', name: 'no_mesin' },
                    { data: 'no_polisi', name: 'no_polisi' },
                    { data: 'no_bpkb', name: 'no_bpkb' },
                    { data: 'satuan', name: 'satuan' },
                    { data: 'harga_satuan', name: 'harga_satuan' },
                    { data: 'lokasi', name: 'lokasi' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>