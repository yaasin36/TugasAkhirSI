<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/uang.png') }}">
    <title>Sumber</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
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

        @section('addCss')
            <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
        @endsection
        @section('addJavascript')
            <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
            <script>
                $(function() {
                    $("#data-table").DataTable();
                })
            </script>
            <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
            <script>
                confirmDelete = function(button) {
                    var url = $(button).data('url');
                    swal({
                        'title': 'Konfirmasi Hapus',
                        'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                        'dangermode': true,
                        'buttons': true
                    }).then(function(value) {
                        if (value) {
                            window.location = url;
                        }
                    })
                }
            </script>
        @endsection
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Sumber Pendapatan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 ">
                            <a href="{{ route('daftarPemasukan') }}"
                                class="btn m-0 mx-3 px-3 float-sm-right bg-primary text-white" role="button">
                                <span class="icon text-white-50 ps-5">
                                    <i class="text-white fas fa-arrow-left"></i>
                                </span>
                                <span>
                                    Kembali
                                </span>
                            </a>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="col-lg">
                        <!-- Main content -->
                        <div class="content">
                            <div class="container mt-5">
                                <div class="card">
                                    <div class="card-header text-right">
                                        <a href="{{ route('createSumberPemasukan') }}"
                                            class="btn btn-blue btn-icon-split" style="background-color: #6777ef"
                                            role="button">
                                            <span class="icon text-white-50">
                                                <i class="text-white fas fa-plus"></i>
                                            </span>
                                            <span class="text">Tambah Sumber Pendapatan</span></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-hover table-bordered text-center" id="data-table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Sumber</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sumbers as $sumber)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $sumber->nama_sumber }}</td>
                                                        <td>
                                                            <a href="{{ route('editSumberPemasukan', ['id' => $sumber->id_sumber]) }}"
                                                                class="btn btn-warning btn-sm">Edit</a>
                                                            <a onclick="confirmDelete(this)"
                                                                data-url="{{ route('deleteSumberPemasukan', ['id' => $sumber->id_sumber]) }}"class="btn btn-danger btn-sm text-white "
                                                                style="cursor:pointer; z-index:999">Hapus</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.content -->
                    </div>




                </div><!-- /.container-fluid -->
            </div><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white" style="border-top: 3px solid #6777ef;background-color: #ffffff;">
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

    {{-- include sweetalert --}}
    @include('sweetalert::alert')

    @yield('addJavascript')
    @yield('addCss')

</body>

</html>
