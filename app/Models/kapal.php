<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kapal extends Model
{
    use HasFactory;
    protected $table ='kapal'; 
    protected $fillable = ['NAMA_KAPAL','TANGGAL_KEDATANGAN','TANGGAL_BERANGKAT','PELAYARAN','IJIN_KEGIATAN'];
    public $timestamps = false;
    protected $primaryKey ='KD_KAPAL';
}

// protected $table ='kapal'; untuk memanggil tabel yang dituju
// protected $fillable =[ ] ; untuk mengijinkan hanya kolom tersebut yang dapat diisi
// public $timestamps = false; untuk menonaktifkan colom create at dan updated at
