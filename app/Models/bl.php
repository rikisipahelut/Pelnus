<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bl extends Model
{
    use HasFactory;
    protected $table='bill_of_lading';
    protected $fillable=['NO_BL','KD_PEMILIK','KD_KAPAL','MEREK','EKSPEDISI_PENGIRIM','BONGKARAN_MUATAN'];
    public $timestamps=false;
    protected $primaryKey = 'NO_BL';
    public $incrementing = false;
}

// protected $table ='kapal'; untuk memanggil tabel yang dituju
// protected $fillable =[ ] ; untuk mengijinkan hanya kolom tersebut yang dapat diisi
// public $timestamps = false; untuk menonaktifkan colom create at dan updated at
// protected $primaryKey = 'NO_BL' ; untuk memberi tau primary keynya karena defaulnya adalah ID
// public $incrementing = false; untuk memberi tau primary keynya tidak integer dan increment
