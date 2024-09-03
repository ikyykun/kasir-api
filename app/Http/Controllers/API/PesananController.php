<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{

    public function index()
    {
        $pesanan = Pesanan::with('details.barang')
            ->where('status_pembayaran', 'belum_dibayar')
            ->get();

        return response()->json($pesanan);
    }

    public function bayar(Request $request, $id) {

        // return $request;
        $request->validate([
            'status_pembayaran' => 'required',
        ]);

        $pesanan = Pesanan::findOrFail($id);

        $data = [
            'status_pembayaran' => $request->status_pembayaran,
        ];
        // return json_encode($data);

        $pesanan->update($data);
        return response()->json($data);
    }

    public function store(Request $request)
{
    $request->validate([
        'nomor_meja' => 'required',
        'input_nama' => 'required',
        'cart' => 'required|array',
        'total_harga' => 'required|numeric'
    ]);

    try {
        $pesananId = null; // Variabel untuk menyimpan ID pesanan

        DB::transaction(function () use ($request, &$pesananId) {
            $pesanan = Pesanan::create([
                'nomor_meja' => $request->nomor_meja,
                'nama_pemesan' => $request->input_nama,
                'total_harga' => $request->total_harga,
                'status_pembayaran' => 'belum_dibayar',
            ]);

            $pesananId = $pesanan->id; // Simpan ID pesanan

            foreach ($request->cart as $item) {
                PesananDetail::create([
                    'pesanan_id' => $pesanan->id,
                    'barang_id' => $item['id'],
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $item['subtotal'],
                ]);
            }
        });

        return response()->json([
            'message' => 'Pesanan berhasil dibuat',
            'pesanan_id' => $pesananId,
        ], 201);
    } catch (\Error $e) {
        throw $e;
    }
}


    public function show($id)
    {
        $pesanan = Pesanan::with('details.barang')->find($id);

        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        return response()->json($pesanan, 200);
    }
}
