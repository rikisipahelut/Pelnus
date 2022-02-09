@extends('layout.kops.sidebar')

@section('title','Form Pemilik')

@section('container')
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Pemilik</h1>
                    <hr class="sidebar-divider d-none d-md-block">
					
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/kops/form_tambah_pemilik">
							@csrf
							  <div class="form-group">
							    <label for="namapemilik">Nama Pemilik</label>
							    <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="namapemilik" aria-describedby="emailHelp" name="nama_pemilik" value="{{old('nama_pemilik')}}" placeholder="Contoh Jaya Abadi">
							    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
								@error('nama_pemilik')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="alamatpemilik">Alamat Pemilik</label>
							    <input type="text" class="form-control @error('alamat_pemilik') is-invalid @enderror" id="alamatpemilik" name="alamat_pemilik" value="{{old('alamat_pemilik')}}">
								@error('alamat_pemilik')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="nohppemilik">No HP Pemilik</label>
							    <input type="number" class="form-control @error('no_hp_pemilik') is-invalid @enderror" id="nohppemilik" name="no_hp_pemilik" value="{{old('no_hp_pemilik')}}">
								@error('no_hp_pemilik')
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