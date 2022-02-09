@extends('layout.kops.sidebar')

@section('title','Form Kontener')

@section('container')
 <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Form Kontener</h1>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="row">
             <div class="col">
              <form method="post" action="/kops/form_tambah_kontener">
                  @csrf
                  <div class="form-group">
                    <label for="nokontener">No Kontener</label>
                    <input type="text" class="form-control @error('no_kontener') is-invalid @enderror" id="nokontener" aria-describedby="emailHelp" name="no_kontener" value="{{old('no_kontener')}}" placeholder="Contoh SPNU 293326-7">
                    <small id="emailHelp" class="form-text text-muted">Masukan dengan dengan benar</small>
                    @error('no_kontener')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="noseal">No Seal</label>
                    <input type="text" class="form-control @error('no_seal') is-invalid @enderror" id="noseal" name="no_seal" value="{{old('no_seal')}}">
                    @error('no_seal')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jenisbarang">Jenis Barang</label>
                    <input type="text" class="form-control @error('jenis_barang') is-invalid @enderror" id="jenisbarang" name="jenis_barang" value="{{old('jenis_barang')}}">
                    @error('jenis_barang')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="tarikan">Tarikan</label>
                    <select class="form-control @error('tarikan') is-invalid @enderror" id="tarikan" name="tarikan">
                      <option value="TIDAK">TIDAK</option>					 
                      <option value="IYA">IYA</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nobl">No Bill of lading</label>
                    <select class="form-control @error('no_bl') is-invalid @enderror" id="nobl" name="no_bl">
                        <option value="{{$no_bl}}">{{$no_bl}}</option>                  
                    </select>
                  </div>   
                  <div class="form-group">
                    <label for="kdlaporan">Kode Laporan</label>
                    <select class="form-control" id="kdlaporan" name="kd_laporan">
                      <option value="">-</option>                  
                    </select>
                  </div>
                  <div class="form-group">
                     <label for="kdkapal">Kode Kapal</label>
                     <select class="form-control @error('kd_kapal') is-invalid @enderror" id="kdkapal" name="kd_kapal">
                        <option value="{{$kd_kapal}}">{{$kd_kapal}}</option>                  
                     </select>
                  </div>
                  <div class="form-group">
                    <label for="kdpemilik">Kode Pemilik</label>
                    <select class="form-control @error('kd_pemilik') is-invalid @enderror" id="kdpemilik" name="kd_pemilik">
                        <option value="{{$kd_pemilik}}">{{$kd_pemilik}}</option>                
                    </select>
                    </div>         							  
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
              </div>
            </div>	



          </div>
                <!-- /.container-fluid -->
@endsection