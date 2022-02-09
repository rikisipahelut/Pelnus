@extends('home')

<!-- @section('title','Tabel BL') -->

@section('container')
    <div class="container">
        <div class="row mt-5 mb-5">
        <div class="col table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">KAPAL</th>
                        <th scope="col">TANGGAL MASUK</th>
                        <th scope="col">BL</th>
                        <th scope="col">NO KONT</th>
                        <th scope="col">TANGGAL MULAI BONKAR/MUAT</th>
                        <th scope="col">PEMILIK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tb_join as $join)
                    <tr>
                        <th scope="col">{{$join->NAMA_KAPAL}}</th>
                        <td>{{$join->TANGGAL_KEDATANGAN}}</td>
                        <td>{{$join->NO_BL}}</td>
                        <td>{{$join->NO_KONTENER}}</td>
                        <td>{{$join->TANGGAL_MULAI_BONGKAR_MUAT}}</td>
                        <td>{{$join->NAMA_PEMILIK}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection