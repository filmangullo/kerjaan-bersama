@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls" _w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li><a href="{{route("pertemuan.index",$pertemuan->mataPelajarans['id'])}}">{{$pertemuan->mataPelajarans['nama']}}</a><span>|</span></li>
            <li><a href="{{route("pertemuan.show",$pertemuan->id)}}">{{$pertemuan->nama}}</a><span>|</span></li>
            <li>Export Daftar Hadir</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">

    <div class="container">
        <div>
            <form action="{{ route('pertemuan.updateWaktuTutupDaftarHadir', $pertemuan->id) }}" method="POST">
                @csrf
                <label>Waktu Tutup : @if(isset($pertemuan->daftarHadirWaktuTutup->tanggal_dan_jam)){{ date('d-M-Y, h:i', strtotime($pertemuan->daftarHadirWaktuTutup->tanggal_dan_jam)) }} @endif</label> <br>
                <input type="datetime-local" name="tanggal_dan_jam" value="" required>
                <button type="submit" class="btn btn-info btn-outline btn-md">Simpan</button>
            </form>
        </div>
        <div style="margin-top:30px;">
            <table id="myTable" class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($daftarHadir as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->users['name'] }}</td>
                        <td>{{ date_format($item->created_at, "F d, Y H:i" ) }}</td>
                        <td>{{ $item->keterangan }}</td>
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
