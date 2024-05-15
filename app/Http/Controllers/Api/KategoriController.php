<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori       = Kategori::all();

        return response()->json([
            'data'      => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|string|unique:kategori,nama'
        ]);


        if ($validator->fails()) {
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ], 422);
        }


        try {
            $data = Kategori::create([
                'nama'          => $request->nama
            ]);
            return response()->json([
                'status'        => 'Kategori berhasil dibuat',
                'data'          => $data
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "could_not_create_category",
                "message" => "Unable to create category"
            ], 400);
        }
    }



    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required|string|unique:kategori,nama,' .  $kategori->id
        ]);


        if ($validator->fails()) {
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ], 422);
        }


        try {
            $kategori->update([
                'nama'          => $request->nama
            ]);

            return response()->json([
                'status'        => 'Kategori berhasil di ubah',
                'data'          => $kategori
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "error"     => "could_not_update_category",
                "message"   => "Unable to update category"
            ], 400);
        }
    }

    public function destroy(Kategori $kategori)
    {
        $status = $kategori->delete();

        if ($status) {
            return response()->json([
                'success' => 'Kategori berhasil di hapus'
            ]);
        } else {
            return response()->json([
                'gagal' => 'Kategori gagal di hapus'
            ]);
        }
    }
}
