<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;
use App\Models\Sumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PemasukanController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Mengambil ID pengguna yang sedang login
        $pemasukans = Pemasukan::where('id_user', $userId)->get(); // Mengambil data pemasukan berdasarkan id_user
        $sumbers = Sumber::where('tipe_sumber', 'pemasukan')->paginate(5)->onEachSide(1); // Mengambil semua data sumber pemasukan dengan tipe 'pemasukan'

        $totalPemasukan = Pemasukan::where('id_user', $userId)->sum('jumlah');

        return view('pemasukan.index', compact('pemasukans', 'sumbers', 'totalPemasukan'));
    }

    public function create()
    {
        $sumbers = Sumber::where('tipe_sumber', 'pemasukan')->get();
        return view('pemasukan.create', ['sumbers' => $sumbers]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_sumber' => 'required|integer',
            'tgl_pemasukan' => 'required|date',
            'jumlah' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pemasukan = new Pemasukan();
        $pemasukan->id_user = $request->id_user;
        $pemasukan->id_sumber = $request->id_sumber;
        $pemasukan->tgl_pemasukan = $request->tgl_pemasukan;
        $pemasukan->jumlah = $request->jumlah;
        $pemasukan->save();

        return redirect(route('daftarPemasukan'))->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(string $id)
    {
        $sumbers = Sumber::where('tipe_sumber', 'pemasukan')->get();
        $pemasukan = Pemasukan::findOrFail($id); // Ambil data pemasukan berdasarkan ID
        return view('pemasukan.edit', [
            'pemasukan' => $pemasukan, // Melewatkan data pemasukan ke view
            'sumbers' => $sumbers
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_sumber' => 'required|integer',
            'tgl_pemasukan' => 'required|date',
            'jumlah' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->id_user = $request->id_user;
        $pemasukan->id_sumber = $request->id_sumber;
        $pemasukan->tgl_pemasukan = $request->tgl_pemasukan;
        $pemasukan->jumlah = $request->jumlah;
        $pemasukan->save();

        return redirect(route('daftarPemasukan'))->with('success', 'Data Berhasil Diperbarui');
    }

    public function destroy(string $id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();
        return redirect(route('daftarPemasukan'))->with('success', 'Data Berhasil Dihapus');
    }
    public function data()
    {
        $userId = Auth::id();
        $currentMonth = date('m'); // Mendapatkan bulan saat ini
        $currentYear = date('Y'); // Mendapatkan tahun saat ini

        $pemasukans = Pemasukan::where('id_user', $userId)
            ->whereMonth('tgl_pemasukan', $currentMonth)
            ->whereYear('tgl_pemasukan', $currentYear)
            ->selectRaw('DATE(tgl_pemasukan) as date, SUM(jumlah) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($pemasukans);
    }
}
