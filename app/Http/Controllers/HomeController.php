<?php

namespace App\Http\Controllers;

use App\Models\Kredit;
use App\Models\Sumber;
use App\Models\TagihanB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Karyawan;

class HomeController extends Controller
{
    //
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->userType;
            $userId = Auth::id();

            // Mendapatkan tanggal awal dan akhir bulan ini
            $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
            $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');

            ////////////////////////  Pemasukan
            // Mengambil data pemasukan berdasarkan id_user
            $pemasukan = Pemasukan::where('id_user', $userId)->get();
            // Hitung jumlah pemasukan hari ini
            $pemasukanHariIni = Pemasukan::where('id_user', $userId)
                ->whereDate('tgl_pemasukan', Carbon::today())->sum('jumlah');
            $pemasukanMingguIni = Pemasukan::where('id_user', $userId)
                ->whereBetween('tgl_pemasukan', [$startDate, $endDate])->sum('jumlah');
            $totalPemasukan = Pemasukan::where('id_user', $userId)->sum('jumlah');

            /////////////////// pengeluaran
            // Mengambil data pemasukan berdasarkan id_user
            $pengeluaran = Pengeluaran::where('id_user', $userId)->get();
            // Hitung jumlah Pengeluran hari ini
            $pengeluaranHariIni = Pengeluaran::where('id_user', $userId)
                ->whereDate('tgl_pengeluaran', Carbon::today())->sum('jumlah');
            $pengeluaranMingguIni = Pengeluaran::where('id_user', $userId)
                ->whereBetween('tgl_pengeluaran', [$startDate, $endDate])->sum('jumlah');
            $totalPengeluaran = Pengeluaran::where('id_user', $userId)->sum('jumlah');

            // kredit
            $kredit = Kredit::where('id_user', $userId)->get();

            $kreditHariIni = Kredit::where('id_user', $userId)
                ->where('status', 'lunas')
                ->whereDate('akhir_kredit', Carbon::today())->sum('jumlah');

            $kreditMingguIni = Kredit::where('id_user', $userId)
                ->where('status', 'lunas')
                ->whereBetween('akhir_kredit', [$startDate, $endDate])->sum('jumlah');

            $totalPengeluaranKredit = Kredit::where('id_user', $userId)
                ->where('status', 'lunas')
                ->sum('jumlah');

            // Tagihan
            $tagihan = TagihanB::where('id_user', $userId)->get();

            $tagihanHariIni = TagihanB::where('id_user', $userId)
                ->where('status', 'Sudah Bayar')
                ->whereDate('akhir_tagihan', Carbon::today())->sum('jumlah');

            $tagihanMingguIni = TagihanB::where('id_user', $userId)
                ->where('status', 'Sudah Bayar')
                ->whereBetween('akhir_tagihan', [$startDate, $endDate])->sum('jumlah');

            $totalPengeluaranTagihan = TagihanB::where('id_user', $userId)
                ->where('status', 'Sudah Bayar')
                ->sum('jumlah');

            // Karyawan
            // Mendapatkan tanggal 30 hari yang lalu dari hari ini
            $startgaji = Carbon::now()->subDays(30);
            $karyawan = Karyawan::where('id_user', $userId)->count();

            // Menghitung total gaji dalam 30 hari terakhir
            $totalGaji30Hari = Karyawan::where('id_user', $userId)
                ->whereBetween('tgl_gajian', [$startgaji, Carbon::now()])
                ->sum('gaji');


            $pengeluaranTagihan = $tagihanHariIni + $kreditHariIni + $pengeluaranHariIni;
            $pengeluaranTagihanMingguIni = $tagihanMingguIni + $kreditMingguIni + $pengeluaranMingguIni;

            // Hitung sisa uang
            $sisaUang = $totalPemasukan - $totalPengeluaran - $totalPengeluaranKredit - $totalPengeluaranTagihan;

            // Kueri untuk mengambil data sumbers dengan pagination
           $sumbers = Sumber::where('tipe_sumber', 'pemasukan')->paginate(4)->onEachSide(1); // Ubah angka 10 sesuai dengan jumlah item per halaman yang diinginkan

            // Kueri untuk mengambil data pemasukan per sumber
            $pemasukanPerSumber = Pemasukan::where('id_user', $userId)
                ->select('id_sumber', Sumber::raw('SUM(jumlah) as total_jumlah'))
                ->groupBy('id_sumber')
                ->get()
                ->keyBy('id_sumber');


            if ($usertype == 'user') {
                return view('dashboard.index', compact('totalPemasukan', 'pemasukanHariIni', 'pemasukanMingguIni', 'totalPengeluaran', 'pengeluaranHariIni', 'pengeluaranMingguIni', 'sisaUang', 'karyawan', 'kredit', 'kreditHariIni', 'tagihan', 'tagihanHariIni', 'tagihanMingguIni', 'totalPengeluaranTagihan', 'pengeluaranTagihan', 'pengeluaranTagihanMingguIni', 'totalGaji30Hari', 'sumbers', 'pemasukanPerSumber'));
            } else if ($usertype == 'admin') {
                return view('admin.index', compact('totalPemasukan', 'pemasukanHariIni', 'pemasukanMingguIni', 'totalPengeluaran', 'pengeluaranHariIni', 'pengeluaranMingguIni', 'sisaUang', 'karyawan', 'kredit', 'kreditHariIni', 'tagihan', 'tagihanHariIni', 'tagihanMingguIni', 'totalPengeluaranTagihan', 'pengeluaranTagihan', 'pengeluaranTagihanMingguIni', 'totalGaji30Hari'));
            } else {
                return redirect()->back();
            }

        }
    }
}

