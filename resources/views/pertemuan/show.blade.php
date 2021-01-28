@extends('layouts.content')


@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls" _w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li><a href="{{route("pertemuan.index",$pertemuan->mataPelajarans['id'])}}">{{$pertemuan->mataPelajarans['nama']}}</a><span>|</span></li>
            <li>{{$pertemuan->nama}}</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<!-- /inner_content -->
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Some More Info </h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="col-md-8 job_info_left">
                <div class="single-left1">
                    {{-- Deskripsi --}}
                    @foreach ($pertemuan->deskripsis as $deskripsi)
                        <p>{!! $deskripsi->text !!}
                        <a href="{{route("deskripsi.softDestroy", $deskripsi->id)}}" class="label label-danger "><i class="fa fa-trash-o" aria-hidden="true"> </i> Hapus Deskripsi</a>
                        </p>
                    @endforeach
                    {{-- Video --}}
                    @foreach ($pertemuan->linkVideos as $linkVideo)
                        <h3>{{$linkVideo->nama}}</h3>
                        <iframe width="100%" height="345" src="{{ $linkVideo->link }}" alt="" class="img-responsive"></iframe>
                        <a href="{{route("linkVideo.softDestroy", $linkVideo->id)}}" class="label label-danger "><i class="fa fa-trash-o" aria-hidden="true"> </i> Hapus Video</a>
                    @endforeach
                    {{-- Dokumen --}}
                    @foreach ($pertemuan->dokumens as $dokumen)
                        <p>Dokumen : <a href="{{asset('storage/'.$dokumen->file)}}">{{ $dokumen->nama }}</a></p>
                        
                    @endforeach
                    
                    <h3 class="single">Pertanyaan dan Diskusi</h3>
                    <div class="comments-grids">
                        @foreach ($pertemuan->komentars as $komentar)
                        {{-- Komentar --}}
                        <div class="comments-grid">
                            <div class="comments-grid-left">
                                <img src="{{asset("pengajar.png")}}" alt=" " class="img-responsive">
                            </div>
                            <div class="comments-grid-right">
                                <h4><a href="#">{!!$komentar->users['name']!!}</a></h4>
                                <ul>
                                    <li>{{ date_format($komentar->created_at, "F d, Y" ) }} <i>|</i></li>
                                    <li><a href="javascript:void(0);" data-href="{{ route('balasan.create', $komentar->id) }}" style="color:blue" class="openPopup">Komentar</a></li>
                                    <li><a href="#" style="color:red">Hapus</a></li>
                                </ul>
                                <img src="{{asset('storage/'.$komentar->file)}}" alt="{{$komentar->file}}" class="img-responsive">
                                <p>{!!$komentar->komentar!!}</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                            {{-- Balasan --}}
                            @foreach ($komentar->balasans as $balasan)
                                <div class="comments-grid" style="margin-left:10%">
                                    <div class="comments-grid-left">
                                        <img src="{{asset("pengajar.png")}}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="comments-grid-right">
                                        <h4><a href="#">{!!$balasan->users['name']!!}</a></h4>
                                        <ul>
                                            <li>{{ date_format($komentar->created_at, "F d, Y" ) }} <i>|</i></li>
                                            <li><a href="{{route("balasan.destroy", $balasan->id) }}" style="color:red">Hapus</a></li>
                                        </ul>
                                        
                                        <p>{!!$komentar->komentar!!}</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            @endforeach
                        <hr>
                        @endforeach
                        <div class="w3layouts_mail_grid">
                            <form action="#" method="post">
                                
                                <div class="col-md-12 wthree_contact_left_grid">
                                    <a href="javascript:void(0);" data-href="{{ route('komentar.create', $pertemuan->id) }}" class="btn btn-block btn-info openPopup">Tambah Diskusi</a>
                                </div>
                                <div class="clearfix"> </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 job_info_right">
                <div class="widget_search">
                    <a href="{{route("deskripsi.create", $pertemuan->id) }}" class="btn btn-block btn-info">Tambah Deskripsi</a>
                    <a href="{{route("linkVideo.create", $pertemuan->id) }}" class="btn btn-block btn-info">Tambah Link Video</a>
                    <a href="javascript:void(0);" data-href="{{ route('dokumen.create', $pertemuan->id) }}" class="btn btn-block btn-info openPopup">Tambah Dokumen</a>
                </div>
                <div class="widget_search">
                    <h5 class="widget-title">Absensi</h5>
                    <div class="widget-content">
                        <span>I'm looking for a ...</span>
                        <select class="form-control jb_1">
                            <option value="">Silahkan Melakukan Absensi</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                        </select>
                        <input type="submit" value="Submt">
                    </div>
                </div>
                <div class="col_3 permit">
                    <h3>Daftar Hadir</h3>
                    <ul class="list_2">
                        <li><a href="#">Railway Recruitment</a></li>
                        <li><a href="#">Air Force Jobs</a></li>
                        <li><a href="#">Police Jobs</a></li>
                        <li><a href="#">Intelligence Bureau Jobs</a></li>
                        <li><a href="#">Army Jobs</a></li>
                        <li><a href="#">Navy Jobs</a></li>
                        <li><a href="#">BSNL Jobs</a></li>
                        <li><a href="#">Software Jobs</a></li>
                        <li><a href="#">Research Jobs</a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" >

    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.openPopup').on('click', function () {
            var dataURL = $(this).attr('data-href');
            $('.modal-dialog').load(dataURL, function () {
                $('#myModal').modal({
                    show: true
                });
            });
        });
    });

</script>
@endsection