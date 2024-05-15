<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function import()
    {
        // $kategori = [];
        $kategori = Http::get('https://59d6d71c-72ab-4f4d-a6b6-e1c21a3031f3.mock.pstmn.io/api/kategori')->json();
        return view('import.index', [
            'kategori' => $kategori
        ]);
    }

    public function import_kategori()
    {

        $kategori = Http::get('https://59d6d71c-72ab-4f4d-a6b6-e1c21a3031f3.mock.pstmn.io/api/kategori')->json();

        foreach ($kategori['data'] as $index => $data) {
            Kategori::create([
                'nama'  => $data['nama'],
            ]);
        }

        return redirect(url('/import'))->withSuccess('Data kategori berhasil di import');
    }
}
