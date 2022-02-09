<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //ini untuk menerima request
use App\Models\kapal;
use App\Models\bl;
use App\Models\kontener;
use App\Models\laporan;
use App\Models\pemilik;
use App\Models\karyawan;
use App\Models\akun;
use Illuminate\Support\Facades\DB; //ini untuk query builder
use Illuminate\Http\UploadedFile; //ini untuk upload file

class StaffopsController extends Controller
{
    public function dashboard(){
    	return view('staffops/dashboard');
    }
    public function tb_bl(){
        $tb_bl=bl::all();
    	return view('staffops/tb_bl')->with(['tb_bl'=>$tb_bl]);
    }
    public function tb_kapal(){
        $tb_kapal=kapal::all();
    	return view('staffops.tb_kapal')->with(['tb_kapal'=>$tb_kapal]);
    }
    public function tb_karyawan(){
        $tb_karyawan=karyawan::all();
    	return view('staffops/tb_karyawan')->with(['tb_karyawan'=>$tb_karyawan]);
    }
    public function tb_kontener(){
        // $tb_kontener=kontener::all();
        // ini inner join kapal,kontener,pemilik
        $tb_join=DB::table('kontener')
                    ->join('kapal','kontener.KD_KAPAL','=','kapal.KD_KAPAL')
                    ->join('pemilik','kontener.KD_PEMILIK','=','pemilik.KD_PEMILIK')
                    ->select('kapal.NAMA_KAPAL','kapal.TANGGAL_KEDATANGAN','kontener.KD_KONTENER','kontener.NO_KONTENER','kontener.TARIKAN','kontener.JENIS_BARANG','pemilik.NAMA_PEMILIK','pemilik.ALAMAT_PEMILIK','pemilik.NO_HP_PEMILIK')
                    ->orderByRaw('kapal.TANGGAL_KEDATANGAN DESC')
                    ->get();
        // data laporan untuk cek
        $tb_laporan = laporan::all();
    	return view('staffops/tb_kontener')->with(['tb_join'=>$tb_join,'tb_laporan'=>$tb_laporan]);
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
    	return view('staffops/tb_laporan')->with(['tb_join'=>$tb_join]);
    }
    public function tb_pemilik(){
        $tb_pemilik=pemilik::all();
    	return view('staffops/tb_pemilik')->with(['tb_pemilik'=>$tb_pemilik]);
    }
    public function tambah_laporan($kd_kontener,$no_kontener){
        $data_karyawan=karyawan::all();
        return view('staffops/form_tambah_laporan')->with(['kd_kontener'=>$kd_kontener,'no_kontener'=>$no_kontener,'karyawan'=>$data_karyawan]);
    }
    public function store_laporan(Request $request){
        if(!empty($request->foto)){
            $request->validate([
                'foto'=>'mimes:jpeg,png,jpg|max:2048',
                'tanggal_mulai_bongkar'=>'required',
                'keterangan'=>'required'
            ]);
            $foto= explode('.',$request->foto->getClientOriginalName());
            $foto=$foto[0];
            $foto_name = $foto.'-'.time().'.'.$request->foto->extension();
            // $foto_name = $request->foto->getClientOriginalName().'-'.time().'.'.$request->foto->extension();
            $request->foto->move(public_path('image/laporan'),$foto_name);
            // return $request->foto;
        }else{
            $request->validate([
                'tanggal_mulai_bongkar'=>'required',
                'keterangan'=>'required'
            ]);
            $foto_name=null;
        }
       
        laporan::create([
            'KD_KONTENER'=>$request->kd_kontener,
            'KD_KARYAWAN'=>$request->kd_karyawan,
            'TANGGAL_MULAI_BONGKAR_MUAT'=>$request->tanggal_mulai_bongkar,
            'TANGGAL_SELESAI_BONGKAR_MUAT'=>$request->tanggal_selesai_bongkar,
            'FOTO'=>$foto_name,
            'KETERANGAN'=>$request->keterangan
        ]);
        return redirect('/staffops/tb_laporan')->with('status','Laporan berhasil ditambahkan');
    }
    public function destroy_laporan(laporan $laporan){
        $data=laporan::where('KD_LAPORAN',$laporan->KD_LAPORAN);
        $data->forceDelete();
        return redirect('/staffops/tb_laporan')->with('status','laporan NO '.$laporan->KD_LAPORAN.' berhasil dihapus');
    }
    public function ubah_laporan(laporan $laporan){
        $karyawan=karyawan::all();
        return view('staffops.form_ubah_laporan')->with(['laporan'=>$laporan,'karyawan'=>$karyawan]);
    }
    public function update_laporan(Request $request, laporan $laporan){
        // Validasi foto
        $request->validate([
            'kd_kontener'=>'required',
            'kd_karyawan'=>'required',
            'tanggal_mulai_bongkar'=>'required',
            'keterangan'=>'required'
        ]);
        if(empty($request->foto)){
            $foto_name=$laporan->FOTO;
        }else{
            $request->validate([
                'foto'=>'mimes:jpeg,png,jpg|max:2048',
                // 'tanggal_mulai_bongkar'=>'required',
                // 'keterangan'=>'required'
            ]);
            $foto= explode('.',$request->foto->getClientOriginalName());
            $foto=$foto[0];
            $foto_name = $foto.'-'.time().'.'.$request->foto->extension();
            $request->foto->move(public_path('image/laporan'),$foto_name);
        }// update
        laporan::where('KD_LAPORAN',$laporan->KD_LAPORAN)
                ->update([
                    'KD_KONTENER'=>$request->kd_kontener,
                    'KD_KARYAWAN'=>$request->kd_karyawan,
                    'TANGGAL_MULAI_BONGKAR_MUAT'=>$request->tanggal_mulai_bongkar,
                    'TANGGAL_SELESAI_BONGKAR_MUAT'=>$request->tanggal_selesai_bongkar,
                    'FOTO'=>$foto_name,
                    'KETERANGAN'=>$request->keterangan
                ]);
        return redirect('/staffops/tb_laporan')->with('status','Laporan Berhasil diubah');
    }
}
