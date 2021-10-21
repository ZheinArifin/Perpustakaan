<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $primaryKey = "kd_buku";
    protected $fillable = ['kd_buku','judul_buku','tahun_terbit','penulis','stok'];
}
