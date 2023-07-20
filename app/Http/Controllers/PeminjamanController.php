<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\PeminjamanResource;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function index()
    {
        // $data_awal = Peminjaman::with('books')->get();
        // $data = PeminjamanResource::collection($data_awal);
        $data = Peminjaman::all();
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $data = Peminjaman::where('id', $id)->with('books')->first();
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'nama' => 'required|min:5',
            'email' => 'required|min:5',
            'no_tlp' => 'required|min:5',
            'alamat' => 'required|min:5'
        ]);
        if($validate->fails()){
            return $validate->errors();
        }
        $data = Peminjaman::create($request->all());
        return response()->json([
            'pesan'=>'Data buku berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = Peminjaman::where('id', $id)->first();

        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'email' => 'required|min:5',
            'no_tlp' => 'required|min:5',
            'alamat' => 'required|min:5'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan perubahan data
        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }

    public function destroy($id)
    {
        $data = Peminjaman::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data buku tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }
}
