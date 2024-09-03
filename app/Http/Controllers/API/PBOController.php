<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PBOController extends Controller
{
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis' => 'required|in:makanan,minuman',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
        } else {
            $path = null;
        }
    
        $data = [
            'name' => $request->name,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'image' => $path,
        ];
    
        $create = Barang::create($data);
    
        if ($create) {
            return response()->json($create);
        } 
    }
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis' => 'required|in:makanan,minuman',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);
    
        // Temukan barang berdasarkan ID
        $barang = Barang::findOrFail($id);
    
        // Mengumpulkan data yang telah divalidasi
        $data = [
            'name' => $request->name,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ];
    
        // Simpan gambar baru (jika ada)
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($barang->image) {
                Storage::disk('public')->delete($barang->image);
            }
    
            // Simpan gambar baru
            $path = $request->file('image')->store('image', 'public');
            $data['image'] = $path;
        }
    
        // Perbarui data barang
        $barang->update($data);
    
        return response()->json($data);
    }

    public function destroy($id)
    {
        $barang = Barang::where('id', $id)->delete();

        if ($barang){
            return response()->json('di apus');
        }else{
            return back();
        }
    }
}
