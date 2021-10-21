<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function peminjaman (Request $request){
        $buku = Buku::where('stok', ">=", "1")->get();
        return view('Page.Peminjaman.peminjaman')
        ->with("buku",$buku);
    }

    public function save_peminjaman(Request $request){
        try{
            Peminjaman::create([
                'id' => $request->id,
                'id_anggota' => $request->id_anggota,
                'kd_buku' => $request->buku,
                'tgl_pinjam' => $request->peminjaman,
                'tgl_pengembalian' => $request->pengembalian,
                'status' => "Menunggu Persetujuan",
            ]);
            $message = 'Peminjaman Berhasil Dilakukan!!';
            $cek = "Berhasil";
        }
        catch (exteption $e){
            $message = 'Peminjaman Gagal Dilakukan!!';
            $cek = "Gagal";
        }

        return redirect()->back()
            ->with("message",$message)
            ->with("cek",$cek);
    }
}
