<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Keuangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $uang_masuk         = Keuangan::where('jenis', 0)->sum('jumlah');
        $uang_keluar        = Keuangan::where('jenis', 1)->sum('jumlah');
        $kategori           = Kategori::count();
        $pengguna           = User::count();


        $pie_label = [];
        $pie_data = [];
        $pie_color = [];


        foreach (Kategori::all() as $data) {
            $jumlah_data = Keuangan::where('id_kategori', $data->id)->count();

            array_push($pie_data, $jumlah_data);
            array_push($pie_label, $data->nama);
            array_push($pie_color,  '#' . dechex(rand(0, 10000000)));
        }


        $area_data = [];
        for ($i = 1; $i <= 12; $i++) {
            $jumlah_data = Keuangan::where('jenis', 0)->whereYear('tanggal', Carbon::now()->format('Y'))->whereMonth('tanggal', $i)->sum('jumlah');

            array_push($area_data, $jumlah_data);
        }


        return view('dashboard.index', compact(
            'uang_masuk',
            'uang_keluar',
            'kategori',
            'pengguna',
            'pie_label',
            'pie_data',
            'pie_color',
            'area_data'
        ));
    }
}
