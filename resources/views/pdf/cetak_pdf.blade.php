<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Keuangan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Transaksi</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($pemasukans as $pemasukan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pemasukan->tgl_pemasukan)->format('d-m-y') }}</td>
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
                                            <td>{{ $no++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($pengeluaran->tgl_pengeluaran)->format('d-m-y') }}</td>
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
                                            <td>{{ $no++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($tagihan->akhir_tagihan)->format('d-m-y') }}</td>
                                            <td>{{ $tagihan->nama_tagihan }}</td>
                                            <td>Pengeluaran</td>
                                            <td>Rp.{{ number_format($tagihan->jumlah) }}</td>
                                        </tr>
                                    @endforeach
                                    @foreach ($kredits as $kredit)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ \Carbon\Carbon::parse($kredit->akhir_kredit)->format('d-m-y') }}</td>
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
                                        <td style="text-align: end;">Rp.{{ number_format($totalPemasukan) }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="background-color: rgb(224, 30, 46); color:white;">
                                            Total Pengeluaran
                                        </th>
                                        <td style="text-align: end;">Rp.{{ number_format($totalPengeluaran) }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="background-color: rgb(224, 30, 46); color:white;">
                                            Sisa Uang
                                        </th>
                                        <td style="text-align: end;">Rp.{{ number_format($sisaUang) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
