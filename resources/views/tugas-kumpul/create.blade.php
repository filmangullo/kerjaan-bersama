@extends('layouts.content')

@section('link')
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

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
            <h3 class="tittle">Kerjakan dan Upload Tugas</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls" >
        <div class="col-md-12" style="margin-bottom:40px;">
            <p>{!! $tugas->keterangan !!}</p> <br>

            <p>
                <a href="{!! asset($tugas->file)!!}" download>{!! $tugas->nama !!}</a>
            </p>
        </div>
        </div>

        <div class="inner_sec_grids_info_w3ls">

            <div class="w3layouts_mail_grid row">

                <form action="{{route("tugasKumpul.store", $tugas->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-2"></div>
                    <div class="col-md-8 offset-md-2">
                        <label>Text</label>
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
        <div style="margin-top:30px;">
            <table id="myTable" class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nilai</th>
                    @if ((Auth::user()->id == $pertemuan->user_id && Auth::user()->role == 'pengajar') || Auth::user()->role == 'admin')
                        <th scope="col">Aksi</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($tugas->tugasKumpuls as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->users['name'] }}</td>
                        <td>{{ date_format($item->created_at, "F d, Y H:i" ) }}</td>
                        <td>{{ $item->nilai }}</td>
                        @if ((Auth::user()->id == $pertemuan->user_id && Auth::user()->role == 'pengajar') || Auth::user()->role == 'admin')
                            <td><a href="{{ route('tugasKumpul.show', $item->id) }}" class="btn btn-primary">Tampil</a></td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>
            </table>
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        } );
    } );

</script>
@endsection
