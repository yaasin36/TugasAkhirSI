<?php

namespace App\Http\Controllers;

use App\Models\TagihanB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanBController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $tagihans = TagihanB::where('id_user', $userId)->get();

        return view('tagihanBulanan.index', compact('tagihans'));
    }

    public function create()
    {
        return view('tagihanBulanan.create');
    }

    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'id_user' => 'required|integer',
            'nama_tagihan' => 'required|string|max:255',
            'awal_tagihan' => 'required|date',
            'akhir_tagihan' => 'required|date',
            'jumlah' => 'required|integer',
            'status' => 'required|string|max:255',
        ])->validate();

        $tagihan = new TagihanB($validatedData);
        $tagihan->save();

        return redirect(route('daftarTagihan'))->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit(string $id)
    {
        $tagihan = TagihanB::findOrFail($id);
        return view('tagihanBulanan.edit', [
            'tagihan' => $tagihan
        ]);
    }
    public function update(Request $request, $id)
    {
        //
        $validatedData = validator($request->all(), [
            'id_user' => 'required|integer',
            'nama_tagihan' => 'required|string|max:255',
            'awal_tagihan' => 'required|date',
            'akhir_tagihan' => 'required|date',
            'jumlah' => 'required|integer',
            'status' => 'required|string|max:255',
        ])->validate();

        $tagihan = TagihanB::findOrFail($id);
        // Update the record with the validated data
        $tagihan->update($validatedData);

        $tagihan->update([
            'id_user' => $request->id_user,
            'nama_tagihan' => $request->nama_tagihan,
            'awal_tagihan' => $request->awal_tagihan,
            'akhir_tagihan' => $request->akhir_tagihan,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
        ]);
        return redirect(route('daftarTagihan'))->with('success', 'Data Berhasil DiUpdate');
    }

    public function destroy(string $id)
    {
        //
        $tagihan = TagihanB::findOrFail($id);
        $tagihan->delete();
        return redirect(route('daftarTagihan'))->with('success', 'Data Berhasil Dihapus');
    }
}
