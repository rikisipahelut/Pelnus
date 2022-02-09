@extends('layout.kops.sidebar')

@section('title','Form Ubah Data Kapal')

@section('container')
  <!-- Begin Page Content -->

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Ubah Data Kapal</h1>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/kops/update_kapal/{{$kapal->KD_KAPAL}}">
                    			@method('patch')
								@csrf
							  <div class="form-group">
							    <label for="namakapal">Nama kapal</label>
							    <input type="text" class="form-control @error('namakapal') is-invalid @enderror" id="namakapal" aria-describedby="emailHelp" name="namakapal" placeholder="Contoh KM.Verizon" value="{{$kapal->NAMA_KAPAL}}">
							    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
								@error('namakapal')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="tanggalkedatangan">Tanggal kedatangan</label>
							    <input type="text" class="form-control @error('tanggalkedatangan') is-invalid @enderror" id="tanggalkedatangan" name="tanggalkedatangan" value="{{$kapal->TANGGAL_KEDATANGAN}}">
								@error('tanggalkedatangan')
									<div class="invalid-feedback">
										{{$message}}
									</div>
							  	@enderror
							  </div>
							 
							  <div class="form-group">
							    <label for="tanggalberangkat">Tanggal berangkat</label>
							    <input type="text" class="form-control" id="tanggalberangkat" name="tanggalberangkat" value="{{$kapal->TANGGAL_BERANGKAT}}">
							  </div>
							  <div class="form-group">
							    <label for="pelayaran">Pelayaran</label>
							    <select class="form-control" id="pelayaran" name="pelayaran">
							      <option value="{{$kapal->PELAYARAN}}">{{$kapal->PELAYARAN}}</option>
								  <option value="SPIL">SPIL</option>
								  <option value="TANTO">TANTO</option>
								  <option value="TEMAS">TEMAS</option>
								  <option value="MERATUS">MERATUS</option>
								  <option value="LAINNYA">LAINNYA</option>					 
								</select>
							  </div>
							   <div class="form-group">
							    <label for="pelayaran">Ijin kegiatan</label>
							    <select class="form-control" id="pelayaran" name="ijinkegiatan">
							      <option value="{{$kapal->IJIN_KEGIATAN}}">{{$kapal->IJIN_KEGIATAN}}</option>
								  <option value="ADA">ADA</option>
								  <option value="TIDAK">TIDAK</option>					 
								</select>
							  </div>
							  
							  <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
							</form>
                    	</div>
                    </div>	



                </div>
                <!-- /.container-fluid -->
@endsection