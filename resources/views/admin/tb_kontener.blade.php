@extends('layout.admin.sidebar')

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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>KD KONTENER</th>
                                            <th>NO KONTENER</th>
                                            <th>KD BL</th>
                                            <th>KD KAPAL</th>
                                            <th>KD PEMILIK</th>
                                            <th>SEAL</th>
                                            <th>TARIKAN</th>
                                            <th>JENIS BARANG</th>
                                        
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>KD KONTENER</th>
                                            <th>NO KONTENER</th>
                                            <th>KD BL</th>
                                            <th>KD KAPAL</th>
                                            <th>KD PEMILIK</th>
                                            <th>SEAL</th>
                                            <th>TARIKAN</th>
                                            <th>JENIS BARANG</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($tb_join as $join)
                                        <tr>
                                            <td>{{$join->KD_KONTENER}}</td>
                                            <td>{{$join->NO_KONTENER}}</td>
                                            <td>{{$join->NO_BL}}</td>
                                            <td>{{$join->NAMA_KAPAL}}</td>
                                            <td>{{$join->NAMA_PEMILIK}}</td>
                                            <td>{{$join->SEAL}}</td>
                                            <td>{{$join->TARIKAN}}</td>
                                            <td>{{$join->JENIS_BARANG}}</td>
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