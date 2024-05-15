<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Keuangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangan   = Keuangan::all();
        return view('keuangan.index', compact('keuangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('keuangan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_kategori'      => 'required',
            'jumlah'           => 'required',
            'descripsi'        => 'required',
            'jenis'            => 'required'
        ]);

        Keuangan::create([
            'id_kategori'      => $request->id_kategori,
            'id_pengguna'      => Auth::user()->id,
            'jumlah'           => $request->jumlah,
            'tanggal'          =>  Carbon::now(),
            'descripsi'        =>  $request->descripsi,
            'jenis'            =>  $request->jenis
        ]);

        return redirect(route('keuangan.index'))->withsuccess('Data keeuangan barru berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        $kategori  =  Kategori::all();

        return view('keuangan.edit', compact('keuangan', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'id_kategori'      => 'required',
            'jumlah'           => 'required',
            'descripsi'        => 'required',
            'jenis'            => 'required'
        ]);

        $keuangan->update([
            'id_kategori'      => $request->id_kategori,
            'id_pengguna'      => Auth::user()->id,
            'descripsi'        =>  $request->descripsi,
            'jenis'            =>  $request->jenis
        ]);

        return redirect(route('keuangan.index'))->withsuccess('Data keeuangan barru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect(route('keuangan.index'))->withsuccess('Data keeuangan barru berhasil di hapus');
    }
}
