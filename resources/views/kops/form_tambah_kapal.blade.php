@extends('layout.kops.sidebar')

@section('title','Form Tambah Kapal')

@section('container')
  <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Tambah Kapal</h1>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/kops/form_tambah_kapal">
								@csrf
							  <div class="form-group">
							    <label for="namakapal">Nama kapal</label>
							    <input type="text" class="form-control @error('namakapal') is-invalid @enderror" id="namakapal" aria-describedby="emailHelp" name="namakapal" value="{{old('namakapal')}}" placeholder="Contoh KM.Verizon">
							    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
								@error('namakapal')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  <div class="form-group">
							    <label for="tanggalkedatangan">Tanggal kedatangan</label>
							    <input type="date" class="form-control @error('tanggalkedatangan') is-invalid @enderror" id="tanggalkedatangan" name="tanggalkedatangan" value="{{old('tanggalkedatangan')}}">
								@error('tanggalkedatangan')
									<div class="invalid-feedback">
										{{$message}}
									</div>
								@enderror
							  </div>
							  @error('tanggalkedatangan')
									<div class="invalid-feedback">
										{{$message}}
									</div>
							  @enderror
							  <div class="form-group">
							    <label for="tanggalberangkat">Tanggal berangkat</label>
							    <input type="date" class="form-control" id="tanggalberangkat" name="tanggalberangkat">
							  </div>
							  <div class="form-group">
							    <label for="pelayaran">Pelayaran</label>
							    <select class="form-control" id="pelayaran" name="pelayaran">
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
								  <option value="ADA">Ada</option>
								  <option value="TIDAK">Tidak</option>					 
								</select>
							  </div>
							  
							  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
                    	</div>
                    </div>	



                </div>
                <!-- /.container-fluid -->
@endsection