<?php

namespace App\Http\Controllers;

use App\Models\Kredit;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\TagihanB;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class LaporanKeuanganController extends Controller
{
        public function Laporan(Request $request)
        {
            $userId = Auth::id();

            $month = $request->input('month');
            $year = $request->input('year');

            $pemasukansQuery = Pemasukan::where('id_user', $userId);
            $pengeluaransQuery = Pengeluaran::where('id_user', $userId);
            $tagihansQuery = TagihanB::where('id_user', $userId)->where('status', 'Sudah Bayar');
            $kreditsQuery = Kredit::where('id_user', $userId)->where('status', 'lunas');

            if ($month && $year) {
                $pemasukansQuery->whereMonth('tgl_pemasukan', $month)->whereYear('tgl_pemasukan', $year);
                $pengeluaransQuery->whereMonth('tgl_pengeluaran', $month)->whereYear('tgl_pengeluaran', $year);
                $tagihansQuery->whereMonth('akhir_tagihan', $month)->whereYear('akhir_tagihan', $year);
                $kreditsQuery->whereMonth('akhir_kredit', $month)->whereYear('akhir_kredit', $year);
            }

            $pemasukans = $pemasukansQuery->get();
            $pengeluarans = $pengeluaransQuery->get();
            $tagihans = $tagihansQuery->get();
            $kredits = $kreditsQuery->get();

            $totalPengeluaran = $pengeluarans->sum('jumlah');
            $totalPemasukan = $pemasukans->sum('jumlah');
            $totalTagihan = $tagihans->sum('jumlah');
            $totalKredit = $kredits->sum('jumlah');

            $sisaUang = $totalPemasukan - $totalPengeluaran - $totalTagihan - $totalKredit;

            return view('pdf.laporan_pdf', compact('pemasukans', 'pengeluarans', 'totalPengeluaran', 'totalPemasukan', 'sisaUang', 'tagihans', 'totalTagihan', 'kredits', 'totalKredit', 'month', 'year'));
        }

        public function Cetak(Request $request)
        {
            $userId = Auth::id();

            $month = $request->input('month');
            $year = $request->input('year');

            $pemasukans = Pemasukan::where('id_user', $userId)
                ->when($month && $year, function ($query) use ($month, $year) {
                    return $query->whereMonth('tgl_pemasukan', $month)->whereYear('tgl_pemasukan', $year);
                })
                ->get();

            $pengeluarans = Pengeluaran::where('id_user', $userId)
                ->when($month && $year, function ($query) use ($month, $year) {
                    return $query->whereMonth('tgl_pengeluaran', $month)->whereYear('tgl_pengeluaran', $year);
                })
                ->get();

            $tagihans = TagihanB::where('id_user', $userId)
                ->where('status', 'Sudah Bayar')
                ->when($month && $year, function ($query) use ($month, $year) {
                    return $query->whereMonth('akhir_tagihan', $month)->whereYear('akhir_tagihan', $year);
                })
                ->get();

            $kredits = Kredit::where('id_user', $userId)
                ->where('status', 'lunas')
                ->when($month && $year, function ($query) use ($month, $year) {
                    return $query->whereMonth('akhir_kredit', $month)->whereYear('akhir_kredit', $year);
                })
                ->get();

            $totalPemasukan = $pemasukans->sum('jumlah');
            $totalPengeluaran = $pengeluarans->sum('jumlah');
            $totalTagihan = $tagihans->sum('jumlah');
            $totalKredit = $kredits->sum('jumlah');

            $sisaUang = $totalPemasukan - $totalPengeluaran - $totalTagihan - $totalKredit;

            return view('pdf.cetak_pdf', compact('pemasukans', 'pengeluarans', 'totalPengeluaran', 'totalPemasukan', 'sisaUang', 'tagihans', 'totalTagihan', 'kredits', 'totalKredit', 'month', 'year'));
        }
}
