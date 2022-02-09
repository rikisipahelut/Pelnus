@extends('layout.kops.sidebar')

@section('title','Form BL')

@section('container')
    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Form Bill Of Lading</h1>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="row">
                    	<div class="col">
                    		<form method="post" action="/kops/form_tambah_bl">
							  @csrf
							  <div class="form-group">
							    <label for="nobl">Nomor bill of lading</label>
							    <input type="text" class="form-control @error('no_bl') is-invalid @enderror" id="nobl" aria-describedby="emailHelp" name="no_bl" value="{{old('no_bl')}}" placeholder="Contoh 3120369708x">
							    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
								@error('no_bl')
									<div class="invalid-feedback">
										{{$message}}
									</div>
							 	@enderror
							  </div>
							  
							  <div class="form-group">
							    <label for="merek">Merek</label>
							    <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" name="merek" value="{{old('merek')}}" placeholder="Contoh JAB">
								@error('merek')
									<div class="invalid-feedback">
										{{$message}}
									</div>
							 	@enderror
							  </div>
							  <div class="form-group">
                                <label for="ekspedisipengirim">Ekspedisi pengirim</label>
                                <input type="text" class="form-control @error('ekspedisi_pengirim') is-invalid @enderror" id="ekspedisipengirim" name="ekspedisi_pengirim" value="{{old('ekspedisi_pengirim')}}">
								@error('ekspedisi_pengirim')
									<div class="invalid-feedback">
										{{$message}}
									</div>
							 	@enderror
                              </div>
                              <div class="form-group">
                                <label for="bongkar/muat">Bongkar/Muat</label>
                                <select class="form-control @error('bongkar_muat') is-invalid @enderror" id="bongkar/muat" name="bongkar_muat">
                                  <option value="Bongkar">Bongkar</option>                 
                                  <option value="Muat">Muat</option>                 
                                </select>
                              </div>
							  <div class="form-group">
							    <label for="kd_pemilik">Kode Pemilik</label>
							    <select class="form-control @error('kd_pemilik') is-invalid @enderror" id="kd_pemilik" name="kd_pemilik">
								  @foreach($tb_pemilik as $pemilik)
								  <option value="{{$pemilik->KD_PEMILIK}}">{{$pemilik->NAMA_PEMILIK}}</option>
								  @endforeach				 
								</select>
							  </div>
							   <div class="form-group">
							    <label for="kd_kapal">Kode Kapal</label>
							    <select class="form-control @error('kd_kapal') is-invalid @enderror" id="kd_kapal" name="kd_kapal">
								  <option value="{{$kd_kapal}}">{{$kd_kapal}}</option>				 
								</select>
							  </div>
							  
							  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
                    	</div>
                    </div>	



                </div>
                <!-- /.container-fluid -->
@endsection