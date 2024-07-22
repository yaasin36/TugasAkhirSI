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
    <title>Edit Kredit</title>

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
                            <h1 class="m-0" style="color: #858796;">Edit Kredit</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Kredit</li>
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
                        <form action="{{ route('updateKredit', ['id' => $kredit->id_kredit]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <!-- Form fields -->
                            <div class="form-group">
                                <label for="nama_kredit">Nama Kredit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                                    </div>
                                    <input type="text" name="nama_kredit" id="nama_kredit" class="form-control" required placeholder="Masukkan Nama Kredit" value="{{ old('nama_kredit', $kredit->nama_kredit) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="awal_kredit">Tanggal Kredit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-calendar3"></i></span>
                                    </div>
                                    <input type="date" name="awal_kredit" id="awal_kredit" class="form-control" required placeholder="Masukkan Tanggal Kredit" onchange="calculateJatuhTempo()" value="{{ old('awal_kredit', $kredit->awal_kredit) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tenor">Tenor</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-clock-history"></i></span>
                                    </div>
                                    <select class="form-control" name="tenor" id="tenor" required onchange="calculateJatuhTempo()">
                                        <option value="1" @if(old('tenor', $kredit->tenor) == '1') selected @endif>1 Bulan</option>
                                        <option value="3" @if(old('tenor', $kredit->tenor) == '3') selected @endif>3 Bulan</option>
                                        <option value="6" @if(old('tenor', $kredit->tenor) == '6') selected @endif>6 Bulan</option>
                                        <option value="12" @if(old('tenor', $kredit->tenor) == '12') selected @endif>12 Bulan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="akhir_kredit">Jatuh Tempo</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    </div>
                                    <input type="date" name="akhir_kredit" id="akhir_kredit" class="form-control" required readonly value="{{ old('akhir_kredit', $kredit->akhir_kredit) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Kredit" value="{{ old('jumlah', $kredit->jumlah) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="bi bi-check2-circle"></i></span>
                                    </div>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="Lunas" @if(old('status', $kredit->status) == 'Lunas') selected @endif>Lunas</option>
                                        <option value="Belum Lunas" @if(old('status', $kredit->status) == 'Belum Lunas') selected @endif>Belum Lunas</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tambahkan Bootstrap CSS dan Icons ke proyek Anda -->
                            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

                            <div class="text-right">
                                <a href="{{ route('daftarKredit') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
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

    <script>
        function calculateJatuhTempo() {
            var awalKredit = document.getElementById("awal_kredit").value;
            var tenor = document.getElementById("tenor").value;
            var jatuhTempo = new Date(awalKredit);
            jatuhTempo.setMonth(jatuhTempo.getMonth() + parseInt(tenor));
            var formattedDate = jatuhTempo.toISOString().split('T')[0];
            document.getElementById("akhir_kredit").value = formattedDate;
        }
    </script>

</body>

</html>
