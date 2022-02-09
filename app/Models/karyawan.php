<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $table='karyawan';
    protected $fillable=['NAMA_KARYAWAN','TANGGAL_LAHIR','ALAMAT_KARYAWAN','NO_HP_KARYAWAN','JABATAN'];
    public $timestamps=false;
    protected $primaryKey='KD_KARYAWAN';
}
// protected $table ='kapal'; untuk memanggil tabel yang dituju
// protected $fillable =[ ] ; untuk mengijinkan hanya kolom tersebut yang dapat diisi
// public $timestamps = false; untuk menonaktifkan colom create at dan updated at