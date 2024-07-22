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
    <title>Kredit</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

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
                            <h1 class="m-0" style="color: #858796;">Tambah Tagihan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Tagihan</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('updateTagihan', ['id' => $tagihan->id_tB]) }}" method="post">
                                @csrf
                                <div>
                                    <input type="hidden" name="id_user" id="id_user"
                                        value="{{ Auth::user()->id_user }}">
                                </div>
                                <div class="form-group">
                                    <label for="nama_tagihan">Nama Tagihan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                                        </div>
                                        <input type="text" name="nama_tagihan" id="nama_tagihan" class="form-control" required placeholder="Masukkan Nama Tagihan" value="{{ old('nama_tagihan', $tagihan->nama_tagihan) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="awal_tagihan">Tanggal Tagihan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                        </div>
                                        <input type="date" name="awal_tagihan" id="awal_tagihan" class="form-control" required placeholder="Masukkan Tanggal Tagihan" value="{{ old('awal_tagihan', $tagihan->awal_tagihan) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="akhir_tagihan">Jatuh Tempo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                        </div>
                                        <input type="date" name="akhir_tagihan" id="akhir_tagihan" class="form-control" readonly placeholder="Masukkan Jatuh Tempo" value="{{ old('akhir_tagihan', $tagihan->akhir_tagihan) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="jumlah" id="jumlah" class="form-control" required placeholder="Masukkan Jumlah Tagihan" value="{{ old('jumlah', $tagihan->jumlah) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status Tagihan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                                        </div>
                                        <select class="form-control" name="status" id="status" required value="{{ old('status', $tagihan->status) }}">
                                            <option value="Sudah Bayar" {{ old('status', $tagihan->status) == 'Sudah Bayar' ? 'selected' : '' }}>Sudah Bayar</option>
                                            <option value="Belum Bayar" {{ old('status', $tagihan->status) == 'Belum Bayar' ? 'selected' : '' }}>Belum Bayar</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tambahkan Bootstrap CSS dan Icons ke proyek Anda -->
                                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">


                                <div class="text-right">
                                    <a href="{{ route('daftarTagihan') }}" class="btn btn-outline-secondary mr-2"
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
