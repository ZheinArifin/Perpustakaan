<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class ApiController extends Controller
{
    public function get_all_book(Request $request){
        return response()->json(Buku::all(), 200);
    }

    public function edit_book(Request $request, $id){
        return response()->json(Buku::find($id), 200);
    }

    public function update_book(Request $request, $id){
        $buku = Buku::find($id);
        if($buku){
            try{
                $buku->judul_buku = $request->judul_buku;
                $buku->tahun_terbit = $request->tahun_terbit;
                $buku->penulis = $request->penulis;
                $buku->stok = $request->stok;
                $buku->save();
                $message = 'Data Buku Berhasil Dirubah!!';
                $cek = "Berhasil";
                $edit = 'Berhasil';
            }
            catch (exteption $e){
                $message = 'Data Buku Gagal Dirubah!!';
                $cek = "Gagal";
                $edit = 'Gagal';
                
            }
            return response()->json([
                'success' => true,
                'message' => $message
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Kode Buku Tidak Ditemukan"
            ], 404);
        }

        
    }

    public function save_book(Request $request){
            $buku = new Buku;
               $buku->kd_buku = $request->kd_buku;
               $buku->judul_buku = $request->judul_buku;
               $buku->tahun_terbit = $request->tahun_terbit;
               $buku->penulis = $request->penulis;
               $buku->stok = $request->stok;
               $buku->save();
            $message = 'Data Buku Berhasil Disimpan!!';
        

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $buku,
        ], 200);
    }

    public function delete_book($id){
        $buku = Buku::find($id);
        if($buku){
            try{
                $buku->delete();
                $message = 'Data Buku Berhasil Dihapus!!';
            }
            catch (exteption $e){
                $message = 'Data Buku Gagal Dihapus!!';
            }
            return response()->json([
                'success' => true,
                'message' => $message
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => "Kode Buku Tidak Ditemukan"
            ], 404);
        }
        try{
            $message = 'Data Buku Berhasil Dihapus!!';
            $cek = "Berhasil";
        }
        catch (exteption $e){
            $message = 'Data Buku Gagal Dihapus!!';
            $cek = "Gagal";
        }

    }
    
}
