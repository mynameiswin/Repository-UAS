<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $data_awal = Book::with('peminjam')->get();
        $data = BookResource::collection($data_awal);
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $data = Book::where('id', $id)->with('peminjam')->first();
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'judul' => 'required|min:5',
            'pengarang' => 'required|min:5',
            'tgl_terbit' => 'required|date',
            'deskripsi' => 'required|min:5'
        ]);
        if($validate->fails()){
            return $validate->errors();
        }
        $data = Book::create($request->all());
        return response()->json([
            'pesan'=>'Data buku berhasil disimpan',
            'data' => $data
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $data = Book::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data buku tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'judul' => 'required|min:5',
            'pengarang' => 'required|min:5',
            'tgl_terbit' => 'required|date',
            'deskripsi' => 'required|min:5'
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }
    public function destroy($id)
    {
        $data = Book::where('id', $id)->first();
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
