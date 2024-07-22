{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/uang.png') }}">
    <title>Tambah Staff</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
        <style>
            /* Add your custom styles here */
            .table-responsive {
                overflow-x: auto;
            }

            .btn {
                transition: all 0.3s ease;
            }

            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            /* Custom styles for the table header */
            table thead {
                background-color: #333;
                color: white;
            }

            /* Custom styles for the header */
            .card-header {
                background-color: #333;
                color: white;
            }

            .card-header a.btn-success,
            .card-header a.btn-primary {
                color: white;
            }

            /* Custom styles for sections */
            .card-body-white {
                background-color: white;
                color: black;
            }

            /* Custom styles for buttons */
            .btn-blue {
                background-color: #6777ef;
                border-color: #6777ef;
                color: white;
            }

            .btn-blue:hover {
                background-color: #3d4bb7;
                border-color: #3d4bb7;
                color: #ffffff;
            }

            /* Custom styles for text */
            .text-white {
                color: white !important;
            }

            /* Animation styles */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            @keyframes slideInUp {
                from {
                    transform: translateY(100%);
                    opacity: 0;
                }

                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            @keyframes bounceIn {

                from,
                20%,
                40%,
                60%,
                80%,
                to {
                    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                }

                0% {
                    opacity: 0;
                    transform: scale3d(0.3, 0.3, 0.3);
                }

                20% {
                    transform: scale3d(1.1, 1.1, 1.1);
                }

                40% {
                    transform: scale3d(0.9, 0.9, 0.9);
                }

                60% {
                    opacity: 1;
                    transform: scale3d(1.03, 1.03, 1.03);
                }

                80% {
                    transform: scale3d(0.97, 0.97, 0.97);
                }

                to {
                    opacity: 1;
                    transform: scale3d(1, 1, 1);
                }
            }

            .content-header {
                animation: fadeIn 0.8s ease-in-out;
            }

            .content {
                animation: fadeIn 1s ease-in-out;
            }
        </style>

</head>

<body id="page-top">

    @include('layouts.sidebar')

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tambah Staff</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Staff</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container mt-5 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('storeKaryawan') }}" method="post">
                                @csrf
                                <div class="">
                                    <input type="hidden" name="id_user" id="id_user"
                                        value="{{ Auth::user()->id_user }}">
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Staff</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        </div>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            required placeholder="Masukkan Nama Staff">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="npwp">NPWP Staff</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i
                                                    class="bi bi-file-earmark-text"></i></span>
                                        </div>
                                        <input type="text" name="npwp" id="npwp" class="form-control"
                                            placeholder="Masukkan NPWP Staff">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posisi">Posisi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                        </div>
                                        <input type="text" name="posisi" id="posisi" class="form-control"
                                            required placeholder="Masukkan Posisi Staff">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gaji">Gaji</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="gaji" id="gaji" class="form-control"
                                            required placeholder="Masukkan Gaji Staff">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        </div>
                                        <input type="number" name="umur" id="umur" class="form-control"
                                            required placeholder="Masukkan Umur Staff">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        </div>
                                        <input type="text" name="kontak" id="kontak" class="form-control"
                                            required placeholder="Masukkan Kontak Staff">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bpjs">Bpjs</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-card-checklist"></i></span>
                                        </div>
                                        <select class="form-control" name="bpjs" id="bpjs" required>
                                            <option value="memiliki" selected>Memiliki</option>
                                            <option value="tidak-memiliki">Tidak memiliki</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_gajian">Tanggal Gajian</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        </div>
                                        <input type="date" name="tgl_gajian" id="tgl_gajian" class="form-control"
                                            required placeholder="Masukkan Tanggal Gajian">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        </div>
                                    <textarea name="alamat" id="alamat" class="form-control" required placeholder="Masukkan Alamat Staff"
                                        rows="3"></textarea>
                                </div>
                                </div>

                                <div class="text-right">
                                    <a href="{{ route('daftarKaryawan') }}" class="btn btn-outline-secondary mr-2"
                                        role="button">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->




    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white" style="border-top: 3px solid #6777ef; background-color: #ffffff;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Marabunta Team</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layouts.logoutModal')

    <!-- Bootstrap core JavaScript-->
    {{-- @include('sweetalert::alert') --}}
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
