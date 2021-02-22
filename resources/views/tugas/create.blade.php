@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls" _w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li><a href="{{route("pertemuan.index",$pertemuan->mataPelajarans['id'])}}">{{$pertemuan->mataPelajarans['nama']}}</a><span>|</span></li>
            <li><a href="{{route("pertemuan.show",$pertemuan->id)}}">{{$pertemuan->nama}}</a><span>|</span></li>
            <li>Tambah Tugas</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Tambah Tugas</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="w3layouts_mail_grid row">
                <form action="{{route("tugas.store", $pertemuan->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-2"></div>
                    <div class="col-md-8 offset-md-2">
                        <label>Deadline</label>
                        <input type="datetime-local" name="deadline" class="form-control" required>
                        <label>Keterangan / Tugas</label>
                        <textarea id="text" class="form-control" name="keterangan" rows="10" cols="50"></textarea>
                        <div class="input-group mb-3" style="margin-top:10px">
                            <label>* Optional</label>
                            <div class="custom-file" style="border-style: solid; border-width: 1px; border-color:#ccc; padding:10px; width:100%">
                                <input type="file" class="custom-file-input" id="fileX" name="file" onchange="myFile()" required>
                                <label class="custom-file-label" for="file"><span id="nameFileX">upload file max 5 MB....</span></label>
                            </div>
                        </div>
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

    function myFile() {
        var xfile = document.getElementById("fileX").files[0].name;
        document.getElementById("nameFileX").innerHTML = xfile;
    }
 </script>

@endsection
