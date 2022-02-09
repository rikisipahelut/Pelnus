<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //ini untuk query builder

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function cari(Request $request){
        $request->validate([
            'cari'=>'required'
        ]);

        $tb_join=DB::table('kontener')
                    ->join('kapal','kontener.KD_KAPAL','=','kapal.KD_KAPAL')
                    ->join('pemilik','kontener.KD_PEMILIK','=','pemilik.KD_PEMILIK')
                    ->join('bill_of_lading','kontener.NO_BL','=','bill_of_lading.NO_BL')
                    ->join('laporan','kontener.KD_KONTENER','=','laporan.KD_KONTENER')
                    ->select('kapal.NAMA_KAPAL','kapal.TANGGAL_KEDATANGAN','kontener.NO_BL','kontener.NO_KONTENER','laporan.TANGGAL_MULAI_BONGKAR_MUAT','pemilik.NAMA_PEMILIK')
                    ->where('kontener.NO_BL','=',$request->cari)
                    ->orderByRaw('kapal.TANGGAL_KEDATANGAN DESC')
                    ->get();
        if(empty($tb_join[0])){
            return redirect('/');
        }
        return view('/found')->with(['tb_join'=>$tb_join]);
    }
   
}
