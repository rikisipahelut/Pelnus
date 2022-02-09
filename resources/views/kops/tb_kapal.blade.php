@extends('layout.kops.sidebar')

@section('title','Tabel Kapal')

@section('container')
<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Kapal</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                            <a href="/kops/form_tambah_kapal" class="btn btn-success"><i class="far fa-plus-square fa-1x"></i> Tambah Kapal</a>
                            @if(session('status'))
                                <div class="alert alert-success mt-2">
                                    {{session('status')}}
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>KD Kapal</th>
                                            <th>Nama Kapal</th>
                                            <th>Tanggal Kedatangan</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Pelayaran</th>
                                            <th>Ijin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>KD Kapal</th>
                                            <th>Nama Kapal</th>
                                            <th>Tanggal Kedatangan</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Pelayaran</th>
                                            <th>Ijin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        @foreach($tb_kapal as $kapal)
                                        <tr>
                                            <td>{{$kapal->KD_KAPAL}}</td>
                                            <td>{{$kapal->NAMA_KAPAL}}</td>
                                            <td>{{$kapal->TANGGAL_KEDATANGAN}}</td>
                                            <td>{{$kapal->TANGGAL_BERANGKAT}}</td>
                                            <td>{{$kapal->PELAYARAN}}</td>
                                            <td>{{$kapal->IJIN_KEGIATAN}}</td>
                                            <td>
                                                <a href="/kops/form_tambah_bl/{{$kapal->KD_KAPAL}}" class="btn btn-success"><i class="far fa-plus-square fa-1x"></i> BL</a> 
                                                <a href="/kops/form_ubah_kapal/{{$kapal->KD_KAPAL}}" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a> 
                                                <form method="post" action="/kops/tb_kapal/{{$kapal->KD_KAPAL}}" class="d-inline-block">
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