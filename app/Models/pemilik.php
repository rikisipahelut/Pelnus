<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemilik extends Model
{
    use HasFactory;
    protected $table='pemilik';
    protected $fillable = ['NAMA_PEMILIK','ALAMAT_PEMILIK','NO_HP_PEMILIK'];
    public $timestamps = false;
    protected $primaryKey = 'KD_PEMILIK';
}
