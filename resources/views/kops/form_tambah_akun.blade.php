@extends('layout.kops.sidebar')

@section('title','Form Akun')

@section('container')
  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Akun</h1>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/kops/form_tambah_akun">
							@csrf
							  <div class="form-group">
							    <label for="namapengguna">Nama Pengguna</label>
							    <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" id="namapengguna" aria-describedby="emailHelp" name="nama_pengguna" value="{{old('nama_pengguna')}}">
							    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
								@error('nama_pengguna')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="password">Password</label>
							    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
								@error('password')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="hak_akses">Hak Akses</label>
							    <select class="form-control @error('hak_akses') is-invalid @enderror" id="hak_akses" name="hak_akses">
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