<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function edit_anggota(Request $request, $id){
        $anggota = Anggota::find($id);
        return view('Page.Anggota.edit-anggota')
        ->with("buku",$anggota)
        ->with("id",$id);
    }

    public function update_anggota(Request $request, $id){
        $anggota = Anggota::find($id);
        try{
            if(!empty($request->password)){
                $anggota->password = md5($request->password);
            }
            $anggota->nama = $request->nama;
            $anggota->email = $request->email;
            $anggota->save();

            $message = 'Data Anggota Berhasil Diperbaharui!!';
            $cek = "Berhasil";
            $edit = 'Berhasil';
        }
        catch (exteption $e){
            $message = 'Data Anggota Gagal Diperbaharui!!';
            $cek = "Gagal";
            $edit = 'Gagal';
        }

        $href = "/anggota";
        return redirect()->back()
            ->with("edit",$edit)
            ->with("href",$href)
            ->with("message",$message)
            ->with("cek",$cek);
    }

    public function save_anggota(Request $request){
        try{
            Anggota::create([
                'id' => $request->id,
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => md5($request->password),
            ]);
            $message = 'Data Anggota Berhasil Disimpan!!';
            $cek = "Berhasil";
        }
        catch (exteption $e){
            $message = 'Data Anggota Gagal Disimpan!!';
            $cek = "Gagal";
        }

        return redirect()->back()
            ->with("message",$message)
            ->with("cek",$cek);
    }

    public function delete_anggota($id){
        $anggota = Anggota::find($id);
        try{
            $anggota->delete();
            $message = 'Data Anggota Berhasil Dihapus!!';
            $cek = "Berhasil";
        }
        catch (exteption $e){
            $message = 'Data Anggota Gagal Dihapus!!';
            $cek = "Gagal";
        }

        return response()->json([
            'success' => true,
            'message' => 'Berhasil'
        ], 200);

       
    }
}
