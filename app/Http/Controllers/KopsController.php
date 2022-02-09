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


class KopsController extends Controller
{
    public function dashboard(){
    	$data='riki dashboard';
    	return view('kops.dashboard')->with(['data'=>$data]);
    }
    public function tb_akun(){
        $tb_akun=akun::all();
    	return view('kops.tb_akun')->with(['tb_akun'=>$tb_akun]);
    }
    public function tb_kapal(){
        // $tb_kapal=\DB::table('kapal')->get(); ini pakai query builder
        $tb_kapal=kapal::all();
    	return view('kops.tb_kapal')->with(['tb_kapal'=>$tb_kapal]);
    }
    public function tb_bl(){
        $tb_bl=bl::all();
    	return view('kops.tb_bl')->with(['tb_bl'=>$tb_bl]);
    }
    public function tb_kontener(){
        $tb_kontener=kontener::all();
    	return view('kops.tb_kontener')->with(['tb_kontener'=>$tb_kontener]);
    }
    public function tb_laporan(){
        // $tb_laporan=laporan::all();
        // return view('kops.tb_laporan')->with(['tb_laporan'=>$tb_laporan]);
        $tb_join=DB::table('laporan')
        ->join('kontener','laporan.KD_KONTENER','=','kontener.KD_KONTENER')
        ->join('kapal','kontener.KD_KAPAL','=','kapal.KD_KAPAL')
        ->join('karyawan','laporan.KD_KARYAWAN','=','karyawan.KD_KARYAWAN')
        ->select('laporan.KD_LAPORAN','kapal.NAMA_KAPAL','kapal.TANGGAL_KEDATANGAN','karyawan.NAMA_KARYAWAN','kontener.NO_KONTENER','laporan.TANGGAL_MULAI_BONGKAR_MUAT','laporan.TANGGAL_SELESAI_BONGKAR_MUAT','laporan.FOTO','laporan.KETERANGAN')
        ->get();
        return view('kops/tb_laporan')->with(['tb_join'=>$tb_join]);
    }
    public function tb_pemilik(){
        $tb_pemilik=pemilik::all();
    	return view('kops.tb_pemilik')->with(['tb_pemilik'=>$tb_pemilik]);
    }
    public function tb_karyawan(){
        $tb_karyawan=karyawan::all();
    	return view('kops.tb_karyawan')->with(['tb_karyawan'=>$tb_karyawan]);
    }
    public function tambah_kapal(){
        return view('kops.form_tambah_kapal');
    }
    public function tambah_bl($kd_kapal){
        $tb_pemilik = pemilik::all();
        return view('kops.form_tambah_bl')->with(['kd_kapal'=>$kd_kapal,'tb_pemilik'=>$tb_pemilik]);
    }
    public function tambah_kontener($no_bl,$kd_kapal,$kd_pemilik){
        return view('kops.form_tambah_kontener')->with(['no_bl'=>$no_bl,'kd_kapal'=>$kd_kapal,'kd_pemilik'=>$kd_pemilik]);
    }
    public function tambah_karyawan(){
        return view('kops.form_tambah_karyawan');
    }
    public function tambah_pemilik(){
        return view('kops.form_tambah_pemilik');
    }
    public function tambah_akun(){
        return view('kops.form_tambah_akun');
    }
    public function store_kapal( Request $request){
        // request post pada action dikirim kesini
        //lalu divalidasi
        $request->validate([
            'namakapal'=>'required',
            'tanggalkedatangan'=>'required',
            'tanggalberangkat'=>'required',
            'pelayaran'=>'required',
            'ijinkegiatan'=>'required'
        ]);
        //insert ke database
        kapal::create([
            'NAMA_KAPAL'=>$request->namakapal,
            'TANGGAL_KEDATANGAN'=>$request->tanggalkedatangan,
            'TANGGAL_BERANGKAT'=>$request->tanggalberangkat,
            'PELAYARAN'=>$request->pelayaran,
            'IJIN_KEGIATAN'=>$request->ijinkegiatan
        ]);

        return redirect('/kops/tb_kapal')->with('status','Kapal '.$request->namakapal.' berhasil ditambahkan!');
        // with('status') adalah alert yang dikirim ke view/kops/tb_kapal
    }

    public function store_bl(Request $request){
        // request post pada action dikirim kesini
        //lalu divalidasi
        $request->validate([
            'no_bl'=>'required',
            'kd_pemilik'=>'required',
            'kd_kapal'=>'required',
            'merek'=>'required',
            'ekspedisi_pengirim'=>'required',
            'bongkar_muat'=>'required'
        ]);
        //insert ke database
        bl::create([
            'NO_BL'=>$request->no_bl,
            'KD_PEMILIK'=>$request->kd_pemilik,
            'KD_KAPAL'=>$request->kd_kapal,
            'MEREK'=>$request->merek,
            'EKSPEDISI_PENGIRIM'=>$request->ekspedisi_pengirim,
            'BONGKARAN_MUATAN'=>$request->bongkar_muat]);

        return redirect('/kops/tb_bl')->with('status','BL '.$request->no_bl.' berhasil ditambahkan!');
    }

    public function store_kontener(Request $request){
        // request post pada action dikirim kesini
        // lalu divalidasi
        $request->validate([
            'no_kontener'=>'required',
            'no_seal'=>'required',
            'jenis_barang'=>'required'
        ]);
        //insert ke database
        kontener::create([
            'NO_KONTENER'=>$request->no_kontener,
            'NO_BL'=>$request->no_bl,
            'KD_LAPORAN'=>$request->kd_laporan,
            'KD_KAPAL'=>$request->kd_kapal,
            'KD_PEMILIK'=>$request->kd_pemilik,
            'SEAL'=>$request->no_seal,
            'TARIKAN'=>$request->tarikan,
            'JENIS_BARANG'=>$request->jenis_barang
        ]);
        return redirect('/kops/tb_kontener')->with('status','No kontener '.$request->no_kontener.' berhasil ditambahkan!');
    }
    public function store_karyawan(Request $request){
        // request post pada action dikirim kesini
        //lalu divalidasi
        $request->validate([
            'nama_karyawan'=>'required',
            'ttl'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'jabatan'=>'required'
        ]);
        //insert ke database
        karyawan::create([
            'NAMA_KARYAWAN'=> $request->nama_karyawan,
            'TANGGAL_LAHIR' => $request->ttl,
            'ALAMAT_KARYAWAN' => $request->alamat,
            'NO_HP_KARYAWAN' => $request->no_hp,
            'JABATAN'=>$request->jabatan
        ]);
        return redirect('/kops/tb_karyawan')->with('status','Data '.$request->nama_karyawan.' berhasil ditambahkan!');
    }
    public function store_pemilik(Request $request){
        $request->validate([
            'nama_pemilik'=>'required',
            'alamat_pemilik'=>'required',
            'no_hp_pemilik'=>'required'
        ]);
        pemilik::create([
            'NAMA_PEMILIK'=>$request->nama_pemilik,
            'ALAMAT_PEMILIK'=>$request->alamat_pemilik,
            'NO_HP_PEMILIK'=>$request->no_hp_pemilik
        ]);
        return redirect('/kops/tb_pemilik')->with('status','Data pemilik berhasil ditambahkan!');
    }
    public function store_akun(Request $request){
        $request->validate([
            'nama_pengguna'=>'required',
            'password'=>'required',
            'hak_akses'=>'required'
        ]);
        akun::create([
            'USERNAME'=>$request->nama_pengguna,
            // 'PASSWORD'=>bcrypt($request->password),
            'PASSWORD'=>$request->password,
            'HAK_AKSES'=>$request->hak_akses
        ]);

        return redirect('/kops/tb_akun')->with('status','Data akun berhasil ditambahkan!');
    }

    public function destroy_akun(akun $akun){
        $data = akun::where('ID',$akun->ID);
        $data->forceDelete();
        return redirect('/kops/tb_akun')->with('status','Data akun berhasil dihapus!');
    }

    public function destroy_pemilik(pemilik $pemilik){
        $data = pemilik::where('KD_PEMILIK',$pemilik->KD_PEMILIK);
        $data->forceDelete();
        return redirect('/kops/tb_pemilik')->with('status','Data Pemilik berhasil dihapus!');
    }

    public function destroy_karyawan(karyawan $karyawan){
        $data = karyawan::where('KD_KARYAWAN',$karyawan->KD_KARYAWAN);
        $data->forceDelete();
        return redirect('/kops/tb_karyawan')->with('status','Data karyawan berhasil dihapus!');
    }

    public function destroy_kontener(kontener $kontener){
        $data = kontener::where('KD_KONTENER',$kontener->KD_KONTENER);
        $data->forceDelete();
        return redirect('/kops/tb_kontener')->with('status','Data kontener berhasil dihapus!');
    }

    public function destroy_bl(bl $bl){
        $data = bl::where('NO_BL',$bl->NO_BL);
        $data->forceDelete();
        return redirect('/kops/tb_bl')->with('status','Data Bill Of Lading berhasil dihapus!');
    }
    public function destroy_kapal(kapal $kapal){
        $data = kapal::where('KD_KAPAL',$kapal->KD_KAPAL);
        $data->forceDelete();
        return redirect('/kops/tb_kapal')->with('status','Data kapal berhasil dihapus!');
    }
    public function ubah_kapal (kapal $kapal){
        return view('kops.form_ubah_kapal')->with(['kapal'=>$kapal]);
    }
    public function ubah_bl (bl $bl){
        $pemilik=pemilik::all();
        return view('kops.form_ubah_bl')->with(['bl'=>$bl,'tb_pemilik'=>$pemilik]);
    }
    public function ubah_kontener(kontener $kontener){
        return view('kops.form_ubah_kontener')->with(['kontener'=>$kontener]);
    }
    public function ubah_karyawan(karyawan $karyawan){
        return view('kops.form_ubah_karyawan')->with(['karyawan'=>$karyawan]);
    }
    public function ubah_pemilik(pemilik $pemilik){
        return view('kops.form_ubah_pemilik')->with(['pemilik'=>$pemilik]);
    }
    public function ubah_akun(akun $akun){
        return view('kops.form_ubah_akun')->with(['akun'=>$akun]);
    }
    public function update_kapal (Request $request, kapal $kapal){
        $request->validate([
            'namakapal'=>'required',
            'tanggalkedatangan'=>'required',
            'tanggalberangkat'=>'required',
            'pelayaran'=>'required',
            'ijinkegiatan'=>'required'
            ]);
        kapal::where('KD_KAPAL',$kapal->KD_KAPAL)
            ->update([
                'NAMA_KAPAL'=>$request->namakapal,
                'TANGGAL_KEDATANGAN'=>$request->tanggalkedatangan,
                'TANGGAL_BERANGKAT'=>$request->tanggalberangkat,
                'PELAYARAN'=>$request->pelayaran,
                'IJIN_KEGIATAN'=>$request->ijinkegiatan
            ]);
        return redirect('/kops/tb_kapal')->with('status','Data Kapal berhasil diubah!');
    }
    public function update_bl(Request $request, bl $no_bl){
        $request->validate([
            'no_bl'=>'required',
            'kd_pemilik'=>'required',
            'kd_kapal'=>'required',
            'merek'=>'required',
            'ekspedisi_pengirim'=>'required',
            'bongkar_muat'=>'required'
            ]);
        bl::where('NO_BL',$no_bl->NO_BL)
            ->update([
                'NO_BL'=>$request->no_bl,
                'KD_PEMILIK'=>$request->kd_pemilik,
                'KD_KAPAL'=>$request->kd_kapal,
                'MEREK'=>$request->merek,
                'EKSPEDISI_PENGIRIM'=>$request->ekspedisi_pengirim,
                'BONGKARAN_MUATAN'=>$request->bongkar_muat
            ]);
        return redirect('/kops/tb_bl')->with('status','Data BL berhasil diubah!');
    }
    public function update_kontener(Request $request, kontener $kontener){
        $request->validate([
            'no_kontener'=>'required',
            'no_bl'=>'required',
            // 'kd_laporan'=>'required',
            'kd_kapal'=>'required',
            'kd_pemilik'=>'required',
            'no_seal'=>'required',
            'tarikan'=>'required',
            'jenis_barang'=>'required',
        ]);
        kontener::where('KD_KONTENER',$kontener->KD_KONTENER)
            ->update([
                'NO_KONTENER'=>$request->no_kontener,
                'NO_BL'=>$request->no_bl,
                'KD_LAPORAN'=>$request->kd_laporan,
                'KD_KAPAL'=>$request->kd_kapal,
                'KD_PEMILIK'=>$request->kd_pemilik,
                'SEAL'=>$request->no_seal,
                'TARIKAN'=>$request->tarikan,
                'JENIS_BARANG'=>$request->jenis_barang
            ]);
        return redirect('kops/tb_kontener')->with('status','Data Kontener berhasil diubah!');
    }
    public function update_karyawan( Request $request, karyawan $karyawan){
        $request->validate([
            'nama_karyawan'=>'required',
            'ttl'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'jabatan'=>'required',
        ]);
        karyawan::where('KD_KARYAWAN',$karyawan->KD_KARYAWAN)
            ->update([
                'NAMA_KARYAWAN'=>$request->nama_karyawan,
                'TANGGAL_LAHIR'=>$request->ttl,
                'ALAMAT_KARYAWAN'=>$request->alamat,
                'NO_HP_KARYAWAN'=>$request->no_hp,
                'JABATAN'=>$request->jabatan
            ]);
        return redirect('/kops/tb_karyawan')->with('status','Data karyawan berhasil diubah!');

    }
    public function update_pemilik( Request $request, pemilik $pemilik){
        $request->validate([
            'nama_pemilik'=>'required',
            'alamat_pemilik'=>'required',
            'no_hp_pemilik'=>'required'
        ]);
        pemilik::where('KD_PEMILIK',$pemilik->KD_PEMILIK)
            ->update([
                'NAMA_PEMILIK'=>$request->nama_pemilik,
                'ALAMAT_PEMILIK'=>$request->alamat_pemilik,
                'NO_HP_PEMILIK'=>$request->no_hp_pemilik
            ]);
        return redirect('/kops/tb_pemilik')->with('status','Data pemilik berhasil diubah!');

    }
    public function update_akun( Request $request, akun $akun){
        $request->validate([
            'nama_pengguna'=>'required',
            'password'=>'required',
            'hak_akses'=>'required',
        ]);
        akun::where('ID',$akun->ID)
            ->update([
                'USERNAME'=>$request->nama_pengguna,
                'PASSWORD'=>$request->password,
                'HAK_AKSES'=>$request->hak_akses
            ]);
        return redirect('/kops/tb_akun')->with('status','Data akun berhasil diubah');
    }
    public function charts(){
        $jan= \App\Http\Controllers\KopsController::count_bulan('1');
        $feb= \App\Http\Controllers\KopsController::count_bulan('2');
        $mar= \App\Http\Controllers\KopsController::count_bulan('3');
        $apr= \App\Http\Controllers\KopsController::count_bulan('4');
        $mei= \App\Http\Controllers\KopsController::count_bulan('5');
        $jun= \App\Http\Controllers\KopsController::count_bulan('6');
        $jul= \App\Http\Controllers\KopsController::count_bulan('7');
        $agu= \App\Http\Controllers\KopsController::count_bulan('8');
        $sep= \App\Http\Controllers\KopsController::count_bulan('9');
        $okt= \App\Http\Controllers\KopsController::count_bulan('10');
        $nov= \App\Http\Controllers\KopsController::count_bulan('11');
        $des= \App\Http\Controllers\KopsController::count_bulan('12');
        $spil= \App\Http\Controllers\KopsController::count_kapal('SPIL');
        $tanto= \App\Http\Controllers\KopsController::count_kapal('TANTO');
        $temas= \App\Http\Controllers\KopsController::count_kapal('TEMAS');
        $meratus= \App\Http\Controllers\KopsController::count_kapal('MERATUS');
        // pemangilan fungsi count bulan harus pake path
        // return view('kops.charts')->with(['jan'=>$januari[0]->jumlah]);
        return view('kops.charts')
                    ->with([
                        'jan'=>$jan,
                        'feb'=>$feb,
                        'mar'=>$mar,
                        'apr'=>$apr,
                        'mei'=>$mei,
                        'jun'=>$jun,
                        'jul'=>$jul,
                        'agu'=>$agu,
                        'sep'=>$sep,
                        'okt'=>$okt,
                        'nov'=>$nov,
                        'des'=>$des,
                        'spil'=>$spil,
                        'tanto'=>$tanto,
                        'temas'=>$temas,
                        'meratus'=>$meratus
                        ]);

    }
    public function count_bulan($bulan){
        $data=DB::table('kontener')
        ->join('kapal','kontener.KD_KAPAL','=','kapal.KD_KAPAL')
        ->select(DB::raw('count(*) as jumlah'))
        ->whereMonth('kapal.TANGGAL_KEDATANGAN',$bulan)
        ->whereYear('kapal.TANGGAL_KEDATANGAN',date('Y'))
        ->get();
        // fungsi untuk count per bulan

        return $data[0]->jumlah;
    }
    public function count_kapal($pelayaran){
        $data=DB::table('kapal')
                ->select(DB::raw('count(*) as jumlah'))
                ->where('PELAYARAN','=',$pelayaran)
                ->whereYear('TANGGAL_KEDATANGAN',date('Y'))
                ->get();

        return $data[0]->jumlah;

    }

}
