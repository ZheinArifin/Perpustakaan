<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;


class BukuController extends Controller
{
    public function edit_buku(Request $request, $id){
        $buku = Buku::find($id);
        return view('Page.edit-buku')
        ->with("buku",$buku)
        ->with("id",$id);
    }

    public function update_buku(Request $request, $id){
        $buku = Buku::find($id);
        try{
            $buku->judul_buku = $request->judul_buku;
            $buku->tahun_terbit = $request->tahun_terbit;
            $buku->penulis = $request->penulis;
            $buku->stok = $request->stok;
            $buku->save();
            $message = 'Data Buku Berhasil Diperbaharui!!';
            $cek = "Berhasil";
            $edit = 'Berhasil';
        }
        catch (exteption $e){
            $message = 'Data Buku Gagal Diperbaharui!!';
            $cek = "Gagal";
            $edit = 'Gagal';
        }

        $href = "/books";
        return redirect()->back()
            ->with("edit",$edit)
            ->with("href",$href)
            ->with("message",$message)
            ->with("cek",$cek);
    }

    public function save_buku(Request $request){
        try{
            Buku::create([
                'kd_buku' => $request->kd_buku,
                'judul_buku' => $request->judul_buku,
                'tahun_terbit' => $request->tahun_terbit,
                'penulis' => $request->penulis,
                'stok' => $request->stok,
            ]);
            $message = 'Data Buku Berhasil Disimpan!!';
            $cek = "Berhasil";
        }
        catch (exteption $e){
            $message = 'Data Buku Gagal Disimpan!!';
            $cek = "Gagal";
        }

        return redirect()->back()
            ->with("message",$message)
            ->with("cek",$cek);
    }

    public function delete_buku($id){
        $buku = Buku::find($id);
        try{
            $buku->delete();
            $message = 'Data Buku Berhasil Dihapus!!';
            $cek = "Berhasil";
        }
        catch (exteption $e){
            $message = 'Data Buku Gagal Dihapus!!';
            $cek = "Gagal";
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil'
        ], 200);

       
    }
}
