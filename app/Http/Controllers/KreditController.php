<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kredit;
use App\Models\Sumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;


class KreditController extends Controller
{


    public function index()
    {
        $userId = Auth::id();
        $kredits = Kredit::where('id_user', $userId)->get();
        // Tenggat waktu adalah besok
        $tenggatWaktu = Carbon::tomorrow();

        // Tanggal pengingat adalah sehari sebelumnya
        $tanggalPengingat = $tenggatWaktu->subDay();

        // Ambil kredit yang jatuh tempo pada tanggal pengingat
        $kreditBelumLunas = Kredit::where('id_user', $userId)
            ->where('status', 'belum Lunas')
            ->where('akhir_kredit', $tanggalPengingat)
            ->get();

        return view('kredit.index', compact('kredits', 'kreditBelumLunas', 'tenggatWaktu', 'tanggalPengingat'));
    }

    public function create()
    {
        return view('kredit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kredit' => 'required|string|max:255',
            'awal_kredit' => 'required|date',
            'tenor' => 'required|integer',
            'akhir_kredit' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required|string',
        ]);
    
        $kredit = new Kredit();
        $kredit->id_user = $request->id_user;
        $kredit->nama_kredit = $request->nama_kredit;
        $kredit->awal_kredit = $request->awal_kredit;
        $kredit->tenor = $request->tenor;
        $kredit->akhir_kredit = $request->akhir_kredit;
        $kredit->jumlah = $request->jumlah;
        $kredit->status = $request->status;
        $kredit->save();
    
        return redirect()->route('daftarKredit')->with('success', 'Kredit berhasil ditambahkan.');
    }
    

    public function edit(string $id)
    {
        $kredit = Kredit::findOrFail($id);
        return view('kredit.edit', [
            'kredit' => $kredit
        ]);
    }
    public function update(Request $request, $id)
    {
        $kredit = Kredit::find($id);
        // Validasi dan update data
        $kredit->nama_kredit = $request->nama_kredit;
        $kredit->awal_kredit = $request->awal_kredit;
        $kredit->tenor = $request->tenor;
        $kredit->akhir_kredit = $request->akhir_kredit;
        $kredit->jumlah = $request->jumlah;
        $kredit->status = $request->status;
        $kredit->save();
        
        return redirect()->route('daftarKredit');
    }



    public function destroy(string $id)
    {
        //
        $kredit = Kredit::findOrFail($id);
        $kredit->delete();
        return redirect(route('daftarKredit'))->with('success', 'Data Berhasil Dihapus');
    }
}
