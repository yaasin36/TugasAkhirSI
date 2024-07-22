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
    <title>Edit Staff</title>

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
                            <h1 class="m-0">Edit Staff</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Staff</li>
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
                            <form action="{{ route('updateKaryawan', ['id' => $karyawan->id_karyawan]) }}"
                                method="post">
                                @csrf
                                <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id_user }}">
                                <div class="form-group">
                                    <label for="nama">Nama Staff</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        </div>
                                        <input type="text" name="nama" id="nama" class="form-control" required placeholder="Masukkan Nama Staff" value="{{ old('nama', $karyawan->nama) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="npwp">NPWP Staff</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                        </div>
                                        <input type="text" name="npwp" id="npwp" class="form-control" placeholder="Masukkan NPWP Staff" value="{{ old('npwp', $karyawan->npwp) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="posisi">Posisi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                        </div>
                                        <input type="text" name="posisi" id="posisi" class="form-control" required placeholder="Masukkan Posisi Staff" value="{{ old('posisi', $karyawan->posisi) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gaji">Gaji</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="number" name="gaji" id="gaji" class="form-control" required placeholder="Masukkan Gaji Staff" value="{{ old('gaji', $karyawan->gaji) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        </div>
                                        <input type="number" name="umur" id="umur" class="form-control" required placeholder="Masukkan Umur Staff" value="{{ old('umur', $karyawan->umur) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kontak">Kontak</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        </div>
                                        <input type="number" name="kontak" id="kontak" class="form-control" required placeholder="Masukkan Kontak Staff" value="{{ old('kontak', $karyawan->kontak) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="bpjs">Bpjs</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-card-checklist"></i></span>
                                        </div>
                                        <select class="form-control" name="bpjs" id="bpjs" required value="{{ old('bpjs', $karyawan->bpjs) }}">
                                            <option value="memiliki">Memiliki</option>
                                            <option value="tidak-memiliki">Tidak memiliki</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_gajian">Tanggal Gajian</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                        </div>
                                        <input type="date" name="tgl_gajian" id="tgl_gajian" class="form-control" required placeholder="Masukkan Tanggal Gajian" value="{{ old('tgl_gajian', $karyawan->tgl_gajian) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        </div>
                                        <textarea name="alamat" id="alamat" class="form-control" required placeholder="Masukkan Alamat Staff" rows="3">{{ old('alamat', $karyawan->alamat) }}</textarea>
                                    </div>
                                </div>

                                <!-- Tambahkan Bootstrap CSS dan Icons ke proyek Anda -->
                                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

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
