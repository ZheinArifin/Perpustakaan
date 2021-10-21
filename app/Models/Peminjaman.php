<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $guarded = "id";
    protected $primaryKey = "id";
    protected $fillable = ['id','id_anggota','kd_buku','tgl_pinjam','tgl_pengembalian','status'];
}
