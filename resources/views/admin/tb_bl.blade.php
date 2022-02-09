@extends('layout.admin.sidebar')

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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No Bill of lading</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nama Kapal</th>
                                            <th>Merek</th>
                                            <th>Ekspedisi Pengirim</th>
                                            <th>Bongkar/Muat</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>No Bill of lading</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nama Kapal</th>
                                            <th>Merek</th>
                                            <th>Ekspedisi Pengirim</th>
                                            <th>Bongkar/Muat</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($tb_join as $join)
                                        <tr>
                                            <td>{{$join->NO_BL}}</td>
                                            <td>{{$join->NAMA_PEMILIK}}</td>
                                            <td>{{$join->NAMA_KAPAL}}</td>
                                            <td>{{$join->MEREK}}</td>
                                            <td>{{$join->EKSPEDISI_PENGIRIM}}</td>
                                            <td>{{$join->BONGKARAN_MUATAN}}</td>
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