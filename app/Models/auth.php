<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Penambahan untuk Auth
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;


class auth extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $table='akun';
    // protected $fillable=['USERNAME','PASSWORD','HAK_AKSES'];
    public $timestamps=false;
    protected $primaryKey ='ID';

    // penambahan untuk auth
    protected $guard='login';
    protected $guarded =[];
}
