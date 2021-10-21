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

    public function pengajuan_peminjaman (Request $request){
        $buku = Buku::where('stok', ">=", "1")->get();
        return view('Page.Peminjaman.pengajuan-pinjaman')
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


    public function setujui_peminjaman(Request $request){
        $pinjaman = Peminjaman::find($request->id);
        $buku = Buku::find($pinjaman->kd_buku);
        try{
            
            $pinjaman->status ="Dipinjam";
            $pinjaman->save();

            // Pengurangan Stok Buku
            $stok = intval($buku->stok) - 1;
            $buku->stok = $stok;
            $buku->save();

            $message = 'Pinjaman Buku Disetujui!!';
        }
        catch (exteption $e){
            $message = 'Pinjaman Buku Gagal Disetujui!!';
            
        }

        return response()->json([
            'success' => true,
            'message' => "Berhasil"
        ], 200);
    }

    public function disagree_peminjaman(Request $request){
        $pinjaman = Peminjaman::find($request->id);
        try{
            $pinjaman->delete();

            $message = 'Pinjaman Buku Tidak Disetujui!!';
            
        }
        catch (exteption $e){
            $message = 'Pinjaman Buku Gagal Disetujui!!';
        }
        return response()->json([
            'success' => true,
            'message' => "Berhasil"
        ], 200);
        
    }

    public function return_peminjaman(Request $request){
        $pinjaman = Peminjaman::find($request->id);
        $buku = Buku::find($pinjaman->kd_buku);
            
            $pinjaman->status ="Dikembalikan";
            $pinjaman->save();

            // Pengurangan Stok Buku
            $stok = intval($buku->stok) + 1;
            $buku->stok = $stok;
            $buku->save();

        return response()->json([
            'success' => true,
            'message' => "Berhasil"
        ], 200);
    }
}
