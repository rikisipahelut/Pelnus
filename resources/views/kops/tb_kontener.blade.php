@extends('layout.kops.sidebar')

@section('title','Tabel Kontener')

@section('container')
 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Kontener</h1>
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
                                            <th>KD KONT</th>
                                            <th>NO KONTENER</th>
                                            <th>KD BL</th>
                                            <th>KD KAPAL</th>
                                            <th>KD PEMILIK</th>
                                            <th>SEAL</th>
                                            <th>TARIKAN</th>
                                            <th>JENIS BARANG</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>KD KONT</th>
                                            <th>NO KONTENER</th>
                                            <th>KD BL</th>
                                            <th>KD KAPAL</th>
                                            <th>KD PEMILIK</th>
                                            <th>SEAL</th>
                                            <th>TARIKAN</th>
                                            <th>JENIS BARANG</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($tb_kontener as $kont)
                                        <tr>
                                            <td>{{$kont->KD_KONTENER}}</td>
                                            <td>{{$kont->NO_KONTENER}}</td>
                                            <td>{{$kont->NO_BL}}</td>
                                            <td>{{$kont->KD_KAPAL}}</td>
                                            <td>{{$kont->KD_PEMILIK}}</td>
                                            <td>{{$kont->SEAL}}</td>
                                            <td>{{$kont->TARIKAN}}</td>
                                            <td>{{$kont->JENIS_BARANG}}</td>
                                            <td>
                                                <a href="/kops/form_ubah_kontener/{{$kont->KD_KONTENER}}" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
                                                <form method="post" action="/kops/tb_kontener/{{$kont->KD_KONTENER}}" class="d-inline-block">
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