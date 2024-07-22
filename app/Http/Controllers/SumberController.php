<?php

namespace App\Http\Controllers;

use App\Models\Sumber;
use Illuminate\Http\Request;

class SumberController extends Controller
{
    //
    public function indexPemasukan()
    {
        $sumbers = Sumber::where('tipe_sumber', 'pemasukan')->get();
        return view('sumber.indexPemasukan', [
            'sumbers' => $sumbers
        ]);
    }

    public function createPemasukan()
    {
        //
        return view('sumber.createPemasukan');
    }
    public function storePemasukan(Request $request)
    {
        //
        $validatedData = validator($request->all(), [
            'nama_sumber' => 'required|string|max:255',
            'tipe_sumber' => 'required|in:pemasukan,pengeluaran',
        ])->validate();

        $sumber = new Sumber($validatedData);
        $sumber->save();

        return redirect(route('daftarSumberPemasukan'))->with('success', 'Data Berhasil Di Simpan');
    }


    /**
     * Display the specified resource.
     */
    public function showPemasukan(Sumber $sumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPemasukan(string $id)
    {
        //
        $sumber = Sumber::findOrFail($id);
        return view('sumber.editPemasukan', [
            'sumber' => $sumber
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePemasukan(Request $request, $id)
    {
        //
        $validatedData = validator($request->all(), [
            'nama_sumber' => 'required|string|max:255',
            'tipe_sumber' => 'required|in:pemasukan,pengeluaran',
        ])->validate();

        $sumber = Sumber::findOrFail($id);

        $sumber->update([
            'nama_sumber' => $request->nama_sumber,
            'tipe_sumber' => $request->tipe_sumber,
        ]);
        return redirect(route('daftarSumberPemasukan'))->with('success', 'Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPemasukan(string $id)
    {
        //
        $sumber = Sumber::findOrFail($id);
        $sumber->delete();
        return redirect(route('daftarSumberPemasukan'))->with('success', 'Data Berhasil Dihapus');
    }

    //////////////////////////////////////////////////////////////

    // kode sumber pengeluaran
    public function indexPengeluaran()
    {
        $sumbers = Sumber::where('tipe_sumber', 'pengeluaran')->get();
        return view('sumber.indexPengeluaran', [
            'sumbers' => $sumbers
        ]);
    }

    public function createPengeluaran()
    {
        //
        return view('sumber.createPengeluaran');
    }
    public function storePengeluaran(Request $request)
    {
        //
        $validatedData = validator($request->all(), [
            'nama_sumber' => 'required|string|max:255',
            'tipe_sumber' => 'required|in:pemasukan,pengeluaran',
        ])->validate();

        $sumber = new Sumber($validatedData);
        $sumber->save();

        return redirect(route('daftarSumberPengeluaran'))->with('success', 'Data Berhasil Di Simpan');
    }


    /**
     * Display the specified resource.
     */
    public function showPengeluaran(Sumber $sumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPengeluaran(string $id)
    {
        //
        $sumber = Sumber::findOrFail($id);
        return view('sumber.editPengeluaran', [
            'sumber' => $sumber
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePengeluaran(Request $request, $id)
    {
        //
        $validatedData = validator($request->all(), [
            'nama_sumber' => 'required|string|max:255',
            'tipe_sumber' => 'required|in:pemasukan,pengeluaran',
        ])->validate();

        $sumber = Sumber::findOrFail($id);

        $sumber->update([
            'nama_sumber' => $request->nama_sumber,
            'tipe_sumber' => $request->tipe_sumber,
        ]);
        return redirect(route('daftarSumberPengeluaran'))->with('success', 'Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPengeluaran(string $id)
    {
        //
        $sumber = Sumber::findOrFail($id);
        $sumber->delete();
        return redirect(route('daftarSumberPengeluaran'))->with('success', 'Data Berhasil Dihapus');
    }
}
