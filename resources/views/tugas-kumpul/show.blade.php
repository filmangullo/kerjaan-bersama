@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls" _w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li><a href="{{route("pertemuan.index",$pertemuan->mataPelajarans['id'])}}">{{$pertemuan->mataPelajarans['nama']}}</a><span>|</span></li>
            <li><a href="{{route("pertemuan.show",$pertemuan->id)}}">{{$pertemuan->nama}}</a><span>|</span></li>
            <li>Upload Tugas</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Nama : {{ $tugasKumpul->users['name'] }}</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls" >
        <div class="col-md-12" style="margin-bottom:40px;">
            <p>{!! $tugasKumpul->keterangan !!}</p> <br>
            <p>
                @if ($tugasKumpul->file != null)
                <a href="{!! $tugasKumpul->file !!}" download>Download File</a>
                @endif

            </p>
        </div>
        </div>
        <form action="{{ route('tugasKumpul.nilai', $tugasKumpul->id) }}" method="POST">
            @csrf
            <label>Nilai</label>
            <input type="number" name="nilai" class="form-control">

            <button type="submit" class="btn btn-primary" style="margin-top: 15px; float:right">Simpan</button>
        </form>
    </div>

</div>
@endsection
