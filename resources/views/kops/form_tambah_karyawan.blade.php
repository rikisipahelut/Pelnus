@extends('layout.kops.sidebar')

@section('title','Form Karyawan')

@section('container')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Karyawan</h1>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/kops/tambah_karyawan">
							  @csrf
							  <div class="form-group">
							    <label for="namakaryawan">Nama karyawan</label>
							    <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" id="namakaryawan" aria-describedby="emailHelp" name="nama_karyawan" value="{{old('nama_karyawan')}}">
							    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
								@error('nama_karyawan')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="ttl">Tanggal lahir</label>
							    <input type="date" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{old('ttl')}}">
								@error('ttl')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="alamat">Alamat</label>
							    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{old('alamat')}}">
								@error('alamat')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="No HP">No HP</label>
							    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="No HP" name="no_hp" value="{{old('no_hp')}}">
								@error('no_hp')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="jabatan">Jabatan</label>
							    <select class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
								  <option value="Kepala Operasi">Kepala Operasi</option>
								  <option value="Staff Operasi">Staff Operasi</option>
								  <option value="Administrasi">Administrasi</option>					 
								</select>
							  </div>
							   
							  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
                    	</div>
                    </div>	



                </div>
                <!-- /.container-fluid -->
@endsection