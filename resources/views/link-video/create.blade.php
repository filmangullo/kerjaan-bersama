@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls" _w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li><a href="{{route("pertemuan.index",$pertemuan->mataPelajarans['id'])}}">{{$pertemuan->mataPelajarans['nama']}}</a><span>|</span></li>
            <li><a href="{{route("pertemuan.show",$pertemuan->id)}}">{{$pertemuan->nama}}</a><span>|</span></li>
            <li>Tambah Deskripsi</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Tambah Deskripsi</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="w3layouts_mail_grid row">
                <form action="{{route("linkVideo.store", $pertemuan->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-2"></div>
                    <div class="col-md-8 offset-md-2">
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="Nama / Judul Video" required="">
                        <label>Link</label>
                        <input type="text" name="link" placeholder="link video" required="">
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

@section('script')
<script src="{{asset("ckeditor/ckeditor.js")}}"></script>
<script>
    var konten = document.getElementById("text");
      CKEDITOR.replace(konten,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
 </script>
@endsection