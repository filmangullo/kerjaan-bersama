@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls"_w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li>Mata Pelajaran<span>|</span></li>
            {{-- <li>{{$mataPelajaran->nama}}</li> --}}
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Update Pertemuan</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="w3layouts_mail_grid row">
                <form action="{{route("pertemuan.update", $pertemuan->id)}}" method="post">
                    @csrf
                    <div class="col-md-2"></div>
                    <div class="col-md-8 offset-md-2">
                        <input type="text" name="nama" placeholder="Nama Pertemuan / Pertemuan ke.. ?" value="{{ $pertemuan->nama }}" required="">
                        <input type="submit" value="Submit">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="clearfix"> </div>

                </form>
            </div>


        </div>

    </div>
</div>
@endsection
