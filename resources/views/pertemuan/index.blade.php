@extends('layouts.content')

@section('style')
    <style>
        .show-pertemuan {
            color:black;
            cursor:pointer;        }
        .show-pertemuan:hover {
            color:navy;
        }
    </style>
@endsection

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls"_w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li><a href="{{route("pertemuan.index", $mataPelajaran->id)}}">{{$mataPelajaran->nama}}</a></li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="banner-bottom">
    <div class="container">
        <div class="inner_sec_grids_info_w3ls">
            <div class="col-md-6 banner_bottom_left">
                <h4>{{$mataPelajaran->nama}}</h4>
                <p>{{$mataPelajaran->keterangan}}</p>

                @if (Auth::user()->role != 'pelajar')
                    <a href="{{route("pertemuan.create", $mataPelajaran->id)}}" class="rounded btn btn-primary">Tambah Pertemuan</a>
                @endif
                
                <ul class="some_agile_facts">
                    @foreach ($pertemuan as $item)
                    <li><a href="{{route("pertemuan.show", $item->id)}}" class="show-pertemuan"><span class="fa fa-briefcase" aria-hidden="true"></span> {{$item->nama}}</a></li>
                    @endforeach
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 banner_bottom_right">
                <div class="agileits_w3layouts_banner_bottom_grid">
                    <img src="{{asset("images/ab.png")}}" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
@endsection