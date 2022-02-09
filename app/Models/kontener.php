<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontener extends Model
{
    use HasFactory;
    protected $table='kontener';
    protected $fillable=['NO_KONTENER','NO_BL','KD_LAPORAN','KD_KAPAL','KD_PEMILIK','SEAL','TARIKAN','JENIS_BARANG'];
    public $timestamps=false;
    protected $primaryKey='KD_KONTENER';
}

// protected $table ='kapal'; untuk memanggil tabel yang dituju
// protected $fillable =[ ] ; untuk mengijinkan hanya kolom tersebut yang dapat diisi
// public $timestamps = false; untuk menonaktifkan colom create at dan updated at
