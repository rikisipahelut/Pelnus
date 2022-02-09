@extends('layout.staffops.sidebar')

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
                                            <th>NAMA KAPAL</th>
                                            <th>TANGGAL KEDATANGAN</th>
                                            <th>NO KONTENER</th>
                                            <th>TARIKAN</th>
                                            <th>JENIS BARANG</th>
                                            <th>NAMA PEMILIK</th>
                                            <th>ALAMAT PEMILIK</th>
                                            <th>NO WA PEMILIK</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                         <tr>
                                            <th>NAMA KAPAL</th>
                                            <th>TANGGAL KEDATANGAN</th>
                                            <th>NO KONTENER</th>
                                            <th>TARIKAN</th>
                                            <th>JENIS BARANG</th>
                                            <th>NAMA PEMILIK</th>
                                            <th>ALAMAT PEMILIK</th>
                                            <th>NO WA PEMILIK</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php $i=0;$data=[];?>
                                        @foreach($tb_join as $join)
                                        <tr>
                                            <td>{{$join->NAMA_KAPAL}}</td>
                                            <td>{{$join->TANGGAL_KEDATANGAN}}</td>
                                            <td>{{$join->NO_KONTENER}}</td>
                                            <td>
                                                <Span class="{{$join->TARIKAN=='IYA' ? ' badge badge-danger p-2':' badge badge-primary p-2'}}">{{$join->TARIKAN}}</Span>
                                            </td>
                                            <td>{{$join->JENIS_BARANG}}</td>
                                            <td>{{$join->NAMA_PEMILIK}}</td>
                                            <td>{{$join->ALAMAT_PEMILIK}}</td>
                                            <td><a href="https://wa.me/62{{$join->NO_HP_PEMILIK}}">{{$join->NO_HP_PEMILIK}}</a></td>
                                            @foreach($tb_laporan as $laporan)
                                                @if($laporan->KD_KONTENER==$join->KD_KONTENER)
                                                    <?php $data[$i]=$laporan->KD_KONTENER;$i++;?>
                                                @endif
                                            @endforeach
                                            <?php if(in_array($join->KD_KONTENER,$data, true)): ?>
                                                    <td>Laporan telah dibuat</td>
                                            <?php else: ?>
                                                    <td><a href="/staffops/form_tambah_laporan/{{$join->KD_KONTENER}}/{{$join->NO_KONTENER}}" class="btn btn-success"><i class="far fa-plus-square fa-1x"></i> Laporan</a></td>
                                            <?php endif;?>
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