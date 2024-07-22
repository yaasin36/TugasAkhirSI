
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/img/uang.png') }}">
    <title>Laporan</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #data-table,
            #data-table * {
                visibility: visible;
            }

            #data-table {
                position: absolute;
                left: 0;
                top: 0;
            }
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .btn {
            transition: transform 0.2s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .table {
            animation: slideInUp 0.8s ease-in-out;
        }

        .card-header .btn-success {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .card-header .btn-success:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .table-bg {
            position: relative;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #333;
            color: white;
        }

        .table-bg::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, rgba(78, 115, 223, 0.1), rgba(28, 200, 138, 0.1));
            z-index: -1;
            border-radius: 15px;
            filter: blur(15px);
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

        .content-header {
            animation: fadeInDown 0.8s ease-in-out;
        }

        @keyframes fadeInDown {
            from {
                transform: translateY(-20%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body id="page-top">

    @include('layouts.sidebar')
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

    <div id="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="m-0">Laporan </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <form action="{{ route('downloadLaporan') }}" method="GET" class="form-inline">
                                <div class="form-group mr-2">
                                    <label for="start_date" class="mr-2">Mulai Tanggal:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control"
                                        value="{{ request('start_date') }}">
                                </div>
                                <div class="form-group mr-2">
                                    <label for="end_date" class="mr-2">Sampai Tanggal:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control"
                                        value="{{ request('end_date') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                            <div>
                                <a href="#" class="btn btn-primary"
                                    onclick="printDataTable(); return false;">Cetak Laporan</a>
                            </div>
                            <script>
                                function printDataTable() {
                                    var table = document.getElementById('data-table');

                                    // Simpan gaya asli tabel
                                    var originalStyle = table.getAttribute('style');

                                    // Tambahkan gaya garis tabel
                                    table.style.border = '1px solid #000';
                                    table.style.borderCollapse = 'collapse';

                                    var content = table.outerHTML;
                                    var printWindow = window.open('', '', 'height=400,width=800');
                                    printWindow.document.write('<html><head><title>#</title>');
                                    printWindow.document.write(
                                        '<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #000; padding: 8px; text-align: left; }</style>'
                                        );
                                    printWindow.document.write('</head><body>');
                                    printWindow.document.write('<h1>Laporan Transaksi Keuangan</h1>');
                                    printWindow.document.write(content);
                                    printWindow.document.write('</body></html>');
                                    printWindow.document.close();
                                    printWindow.print();

                                    // Kembalikan gaya asli tabel setelah mencetak
                                    table.setAttribute('style', originalStyle);
                                }
                            </script>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="data-table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <td>Tanggal</td>
                                            <th>Nama Transaksi</th>
                                            <th>Jenis Transaksi</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemasukans as $pemasukan)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pemasukan->tgl_pemasukan)->format('d-m-y') }}
                                                </td>
                                                <td>
                                                    @isset($pemasukan->sumber)
                                                        {{ $pemasukan->sumber->nama_sumber }}
                                                    @else
                                                        Sumber tidak tersedia
                                                    @endisset
                                                </td>
                                                <td>Pendapatan</td>
                                                <td>Rp.{{ number_format($pemasukan->jumlah) }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($pengeluarans as $pengeluaran)
                                            <tr>
                                                <td>{{ $loop->index + 1 + count($pemasukans) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pengeluaran->tgl_pengeluaran)->format('d-m-y') }}
                                                </td>
                                                <td>
                                                    @isset($pengeluaran->sumber)
                                                        {{ $pengeluaran->sumber->nama_sumber }}
                                                    @else
                                                        Sumber tidak tersedia
                                                    @endisset
                                                </td>
                                                <td>Pengeluaran</td>
                                                <td>Rp.{{ number_format($pengeluaran->jumlah) }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($tagihans as $tagihan)
                                            <tr>
                                                <td>{{ $loop->index + 1 + count($pemasukans) + count($pengeluarans) }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($tagihan->akhir_tagihan)->format('d-m-y') }}
                                                </td>
                                                <td>{{ $tagihan->nama_tagihan }}</td>
                                                <td>Pengeluaran</td>
                                                <td>Rp.{{ number_format($tagihan->jumlah) }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($kredits as $kredit)
                                            <tr>
                                                <td>{{ $loop->index + 1 + count($pemasukans) + count($pengeluarans) + count($tagihans) }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($kredit->akhir_kredit)->format('d-m-y') }}
                                                </td>
                                                <td>{{ $kredit->nama_kredit }}</td>
                                                <td>Pengeluaran</td>
                                                <td>Rp.{{ number_format($kredit->jumlah) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" style="background-color: rgb(224, 30, 46); color:white;">
                                                Total Pemasukan
                                            </th>
                                            <td colspan="4" style="text-align: end;">
                                                Rp.{{ number_format($totalPemasukan) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="background-color: rgb(224, 30, 46); color:white;">
                                                Total Pengeluaran
                                            </th>
                                            <td colspan="4" style="text-align: end;">
                                                Rp.{{ number_format($totalPengeluaran) }}
                                            </td>
                                        </tr>
                                        <th></th>
                                        <tr>
                                            <th colspan="4" style="background-color: rgb(0, 255, 0); color:white;">
                                                Sisa Uang
                                            </th>
                                            <td colspan="4" style="text-align: end;">
                                                Rp.{{ number_format($sisaUang) }}
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white" style="border-top: 3px solid #6777ef; background-color: #ffffff;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Marabunta Team</span>
            </div>
        </div>
    </footer><!-- End of Footer -->

    </div><!-- End of Content Wrapper -->

    </div><!-- End of Page Wrapper -->

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
