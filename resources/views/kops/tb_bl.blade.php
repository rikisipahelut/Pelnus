@extends('layout.kops.sidebar')

@section('title','Tabel BL')

@section('container')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Bill Of Lading</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        @if(session('status'))
                                <div class="alert alert-success mt-2">
                                    {{session('status')}}
                                </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Bill of lading</th>
                                            <th>KD Pemilik</th>
                                            <th>KD Kapal</th>
                                            <th>Merek</th>
                                            <th>Ekspedisi Pengirim</th>
                                            <th>Bongkar/Muat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>No Bill of lading</th>
                                            <th>KD Pemilik</th>
                                            <th>KD Kapal</th>
                                            <th>Merek</th>
                                            <th>Ekspedisi Pengirim</th>
                                            <th>Bongkar/Muat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($tb_bl as $bill)
                                        <tr>
                                            <td>{{$bill->NO_BL}}</td>
                                            <td>{{$bill->KD_PEMILIK}}</td>
                                            <td>{{$bill->KD_KAPAL}}</td>
                                            <td>{{$bill->MEREK}}</td>
                                            <td>{{$bill->EKSPEDISI_PENGIRIM}}</td>
                                            <td>{{$bill->BONGKARAN_MUATAN}}</td>
                                            <td>
                                                <a href="/kops/form_tambah_kontener/{{$bill->NO_BL}}/{{$bill->KD_KAPAL}}/{{$bill->KD_PEMILIK}}" class="btn btn-success"><i class="far fa-plus-square fa-1x"></i> Kontener</a>
                                                <a href="/kops/form_ubah_bl/{{$bill->NO_BL}}" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a> 
                                                <form method="post" action="/kops/tb_bl/{{$bill->NO_BL}}" class="d-inline-block">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" name="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Hapus')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection