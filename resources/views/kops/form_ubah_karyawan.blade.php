@extends('layout.kops.sidebar')

@section('title','Form Ubah Karyawan')

@section('container')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form ubah Karyawan</h1>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/kops/update_karyawan/{{$karyawan->KD_KARYAWAN}}">
                    		  @method('patch')
							  @csrf
							  <div class="form-group">
							    <label for="namakaryawan">Nama karyawan</label>
							    <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" id="namakaryawan" aria-describedby="emailHelp" name="nama_karyawan" value="{{$karyawan->NAMA_KARYAWAN}}">
							    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
								@error('nama_karyawan')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="ttl">Tanggal lahir</label>
							    <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{$karyawan->TANGGAL_LAHIR}}">
								@error('ttl')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="alamat">Alamat</label>
							    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{$karyawan->ALAMAT_KARYAWAN}}">
								@error('alamat')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="No HP">No HP</label>
							    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="No HP" name="no_hp" value="{{$karyawan->NO_HP_KARYAWAN}}">
								@error('no_hp')
								<div class="invalid-feedback">
									{{$message}}
								</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="jabatan">Jabatan</label>
							    <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
							      <option value="{{$karyawan->JABATAN}}">{{$karyawan->JABATAN}}</option>
								  <option value="Kepala Operasi">Kepala Operasi</option>
								  <option value="Staff Operasi">Staff Operasi</option>
								  <option value="Administrasi">Administrasi</option>					 
								</select>
							  </div>
							   
							  <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
							</form>
                    	</div>
                    </div>	



                </div>
                <!-- /.container-fluid -->
@endsection