<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kapal;
use App\Models\bl;
use App\Models\kontener;
use App\Models\laporan;
use App\Models\pemilik;
use App\Models\karyawan;
use App\Models\akun;
use Illuminate\Support\Facades\DB; //ini untuk query builder

class AdminController extends Controller
{
    public function dashboard(){
    	return view('admin/dashboard');
    }
    public function tb_bl(){
        //ini inner join Laporan,kapal,karyawan,Kontener
        $tb_join=DB::table('bill_of_lading')
                    ->join('pemilik','bill_of_lading.KD_PEMILIK','=','pemilik.KD_PEMILIk')
                    ->join('kapal','bill_of_lading.KD_KAPAL','=','kapal.KD_KAPAL')
                    ->select('bill_of_lading.NO_BL','pemilik.NAMA_PEMILIK','kapal.NAMA_KAPAL','bill_of_lading.MEREK','bill_of_lading.EKSPEDISI_PENGIRIM','bill_of_lading.BONGKARAN_MUATAN')
                    ->get();
    	return view('admin.tb_bl')->with(['tb_join'=>$tb_join]);
    }
    public function tb_kapal(){
        $tb_kapal=kapal::all();
    	return view('admin/tb_kapal')->with(['tb_kapal'=>$tb_kapal]);
    }
    public function tb_karyawan(){
        $tb_karyawan=karyawan::all();
    	return view('admin/tb_karyawan')->with(['tb_karyawan'=>$tb_karyawan]);
    }
    public function tb_kontener(){
        $tb_join=DB::table('kontener')
                    ->join('bill_of_lading','bill_of_lading.NO_BL','=','kontener.NO_BL')
                    ->join('kapal','kapal.KD_KAPAL','=','kontener.KD_KAPAL')
                    ->join('pemilik','pemilik.KD_PEMILIK','=','kontener.KD_PEMILIK')
                    ->select('kontener.KD_KONTENER','kontener.NO_KONTENER','bill_of_lading.NO_BL','kapal.NAMA_KAPAL','pemilik.NAMA_PEMILIK','kontener.SEAL','kontener.TARIKAN','kontener.JENIS_BARANG')
                    ->get();
    	return view('admin/tb_kontener')->with(['tb_join'=>$tb_join]);
    }
    public function tb_laporan(){
        // $tb_laporan=laporan::all();
        //ini inner join Laporan,kapal,karyawan,Kontener
        $tb_join=DB::table('laporan')
                    ->join('kontener','laporan.KD_KONTENER','=','kontener.KD_KONTENER')
                    ->join('kapal','kontener.KD_KAPAL','=','kapal.KD_KAPAL')
                    ->join('karyawan','laporan.KD_KARYAWAN','=','karyawan.KD_KARYAWAN')
                    ->select('laporan.KD_LAPORAN','kapal.NAMA_KAPAL','kapal.TANGGAL_KEDATANGAN','karyawan.NAMA_KARYAWAN','kontener.NO_KONTENER','laporan.TANGGAL_MULAI_BONGKAR_MUAT','laporan.TANGGAL_SELESAI_BONGKAR_MUAT','laporan.FOTO','laporan.KETERANGAN')
                    ->get();
    	return view('admin/tb_laporan')->with(['tb_join'=>$tb_join]);
    }
    public function tb_pemilik(){
        $tb_pemilik=pemilik::all();
    	return view('admin/tb_pemilik')->with(['tb_pemilik'=>$tb_pemilik]);
    }
}
