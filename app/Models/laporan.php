<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $table='laporan';
    protected $fillable=['KD_KONTENER','KD_KARYAWAN','TANGGAL_MULAI_BONGKAR_MUAT','TANGGAL_SELESAI_BONGKAR_MUAT','FOTO','KETERANGAN'];
    protected $primaryKey='KD_LAPORAN';
    public $timestamps=false;
}
// protected $table ='kapal'; untuk memanggil tabel yang dituju
// protected $fillable =[ ] ; untuk mengijinkan hanya kolom tersebut yang dapat diisi
// public $timestamps = false; untuk menonaktifkan colom create at dan updated at
