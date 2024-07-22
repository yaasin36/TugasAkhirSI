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
    <title>Pengeluaran</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        .text-pink {
            color: rgba(255, 99, 132, 0.2);
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
                            <h1 class="m-0">Pengeluaran </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right mt-1">
                            <a href="{{ route('daftarSumberPengeluaran') }}"
                                class="btn m-0 font-weight-bold btn-blue text-white">
                                <i class="fas fa-chart-line"></i> Buat Sumber Pengeluaran Disini!!
                            </a>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-lg-6 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4 pb-5">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-white">Sumber Pengeluaran</h6>
                                </div>

                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($sumbers as $key => $sumber)
                                            <li class="list-group-item">{{ $sumbers->firstItem() + $key }}.
                                                {{ $sumber->nama_sumber }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                 <!-- Pagination -->
                                 <div class="d-flex justify-content-center mt-3">
                                    {{ $sumbers->links() }}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-white">Diagram Pengeluaran</h6>
                                </div>
                                <div class="card-body">
                                    {{-- diagram --}}
                                    <div class="chart-bar pt-4 pb-2">
                                        <canvas id="chartBar"></canvas>
                                    </div>

                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-pink"></i> Pengeluaran
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->

                    {{-- Tabel pemasukan start --}}
                    <div class="row">
                        <div class="col-lg">
                            <!-- Main content -->
                            <div class="content">
                                <div class="container mt-3">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="m-0">Daftar Pengeluaran</h5>
                                            <a href="{{ route('createPengeluaran') }}"
                                                class="btn btn-blue btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="text-white fas fa-plus"></i>
                                                </span>
                                                <span class="text">Tambah pengeluaran</span>
                                            </a>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-hover table-bordered text-center" id="data-table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Jumlah</th>
                                                        <th>Sumber</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($pengeluarans as $pengeluaran)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $pengeluaran->tgl_pengeluaran }}</td>
                                                            <td>Rp.{{ number_format($pengeluaran->jumlah) }}</td>
                                                            <td>
                                                                @isset($pengeluaran->sumber)
                                                                    {{ $pengeluaran->sumber->nama_sumber }}
                                                                @else
                                                                    Sumber tidak tersedia
                                                                @endisset
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('editPengeluaran', ['id' => $pengeluaran->id_pengeluaran]) }}"
                                                                    class="btn btn-warning btn-sm">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                    Edit
                                                                </a>
                                                                <a onclick="confirmDelete(this)"
                                                                    data-url="{{ route('deletePengeluaran', ['id' => $pengeluaran->id_pengeluaran]) }}"
                                                                    class="btn btn-danger btn-sm text-white"
                                                                    style="cursor:pointer; z-index:999">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                    Hapus</a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">Data kosong</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.content -->
                        </div>
                    </div>
                    {{-- Tabel pemasukan end --}}
                </div><!-- /.container-fluid -->
            </div><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white mt-5"
        style="border-top: 3px solid #6777ef;background-color: #ffffff;">
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

    {{-- dougnut chart --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('pengeluaran.data') }}')
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(entry => entry.date);
                    const values = data.map(entry => entry.total);

                    const ctx = document.getElementById('chartBar').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Pengeluaran',
                                data: values,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            scales: {
                                x: {
                                    type: 'time',
                                    time: {
                                        unit: 'day',
                                        tooltipFormat: 'DD-MM-YYYY'
                                    },
                                    title: {
                                        display: true,
                                        text: 'Tanggal'
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah (Rp)'
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return 'Rp' + value.toLocaleString();
                                        }
                                    }
                                }
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return 'Rp' + tooltipItem.yLabel.toLocaleString();
                                    }
                                },
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false
                            },
                        }
                    });
                });
        });
</script>
    {{-- dougnut chart --}}

    {{-- include sweetalert --}}
    @include('sweetalert::alert')

    @yield('addJavascript')

    @yield('addCss')

</body>

</html>
