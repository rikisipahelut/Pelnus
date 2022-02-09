@extends('layout.admin.sidebar')

@section('title','Tabel Laporan')

@section('container')

 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Laporan</h1>
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
                                            <th>KD LAPORAN</th>
                                            <th>NAMA KAPAL</th>
                                            <th>TANGGAL KEDATANGAN</th>
                                            <th>NO KONTENER</th>
                                            <th>NAMA KARYAWAN</th>
                                            <th>TANGGAL MULAI</th>
                                            <th>TANGGAL SELESAI</th>
                                            <th>FOTO</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>KD LAPORAN</th>
                                            <th>NAMA KAPAL</th>
                                            <th>TANGGAL KEDATANGAN</th>
                                            <th>NO KONTENER</th>
                                            <th>NAMA KARYAWAN</th>
                                            <th>TANGGAL MULAI</th>
                                            <th>TANGGAL SELESAI</th>
                                            <th>FOTO</th>
                                            <th>KETERANGAN</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i="a"; ?>
                                        @foreach($tb_join as $join)
                                        <tr>
                                            <td>{{$join->KD_LAPORAN}}</td>
                                            <td>{{$join->NAMA_KAPAL}}</td>
                                            <td>{{$join->TANGGAL_KEDATANGAN}}</td>
                                            <td>{{$join->NO_KONTENER}}</td>
                                            <td>{{$join->NAMA_KARYAWAN}}</td>
                                            <td>{{$join->TANGGAL_MULAI_BONGKAR_MUAT}}</td>
                                            <td>{{$join->TANGGAL_SELESAI_BONGKAR_MUAT}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#{{$i}}">{{$join->FOTO}}</a>
                                            </td>
                                            <td>{{$join->KETERANGAN}}</td>
                                        </tr>

                                        <!-- Modal Gambar -->
                                            <div class="modal fade" id="{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                                <h5 class="modal-title" id="aboutLabel">{{$join->FOTO}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                            <div class="modal-body text-center">
                                                                <img src="/image/laporan/{{$join->FOTO}}" alt="{{$join->FOTO}}" width="350">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++;?>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection