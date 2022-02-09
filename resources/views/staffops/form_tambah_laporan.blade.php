@extends('layout.staffops.sidebar')

@section('title','Form Laporan')

@section('container')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Laporan Kontener {{$no_kontener}} </h1>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/staffops/form_tambah_laporan" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label for="kd_kontener">Kode Kontener</label>
                                <select class="form-control @error('kd_kontener') is-invalid @enderror" id="kd_kontener" name="kd_kontener">
                                  <option value="{{$kd_kontener}}">{{$kd_kontener}}</option>                  
                                </select>
                                @error('kd_kontener')
                                    <div class="invalid-feedback">
                                      {{$message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="kd_karyawan">Kode Karyawan</label>
                                <select class="form-control @error('kd_karyawan') is-invalid @enderror" id="kd_karyawan" name="kd_karyawan">
                                  @foreach($karyawan as $karya)
                                  <option value="{{$karya->KD_KARYAWAN}}">{{$karya->NAMA_KARYAWAN}}</option>
                                  @endforeach                  
                                </select>
                                @error('kd_karyawan')
                                    <div class="invalid-feedback">
                                      {{$message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="tanggal_mulai_bongkar">Tanggal mulai bongkar muat</label>
                                <input type="datetime-local" class="form-control @error('tanggal_mulai_bongkar') is-invalid @enderror" id="tanggal_mulai_bongkar" aria-describedby="emailHelp" name="tanggal_mulai_bongkar">  
                                @error('tanggal_mulai_bongkar')
                                    <div class="invalid-feedback">
                                      {{$message}}
                                    </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="tanggal_selesai_bongkar">Tanggal selesai bongkar muat</label>
                                <input type="datetime-local" class="form-control @error('tanggal_selesai_bongkar') is-invalid @enderror" id="tanggal_selesai_bongkar" aria-describedby="emailHelp" name="tanggal_selesai_bongkar">  
                              </div>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Keterangan</span>
                                  </div>
                                  <textarea class="form-control @error('keterangan') is-invalid @enderror" aria-label="With textarea" name="keterangan" placeholder="Masukan keterangan terkait : sopir, barang rusak, hilang, kontener bocor, dan lainnya."></textarea>
                                  @error('keterangan')
                                    <div class="invalid-feedback">
                                      {{$message}}
                                    </div>
                                  @enderror
                              </div> 
                              <div class="form-group">
                                <label>Masukan Foto Dokumentasi : jpeg, jpg, png</label>
                                <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto">
                                @error('foto')
                                    <div class="invalid-feedback">
                                      {{$message}}
                                    </div>
                                @enderror
                              </div>  							  
                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    	</div>
                    </div>	



                </div>
                <!-- /.container-fluid -->
@endsection