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
                    <img src="images/banner3.jpg" alt=" " class="img-responsive" />
                    <h3>Sed ut perspiciatis unde omnis iste natus error sit facilisis erat posuere erat</h3>
                    <ul>
                        <li><span class="fa fa-user" aria-hidden="true"></span><a href="#">Michael Smith</a></li>
                        <li><span class="fa fa-tag" aria-hidden="true"></span><a href="#">5 Tags</a></li>
                        <li><span class="fa fa-envelope-o" aria-hidden="true"></span><a href="#">5 Comments</a></li>
                    </ul>
                    @foreach ($pertemuan->deskripsis as $deskripsi)
                    <p>{!! $deskripsi->text !!}</p>
                    @endforeach
                </div>
                <div class="comments">
                    <h3 class="single">Our Recent Comments</h3>
                    <div class="comments-grids">
                        <div class="comments-grid">
                            <div class="comments-grid-left">
                                <img src="images/pf1.jpg" alt=" " class="img-responsive">
                            </div>
                            <div class="comments-grid-right">
                                <h4><a href="#">Michael Crisp</a></h4>
                                <ul>
                                    <li>5 Nov 2017 <i>|</i></li>
                                    <li><a href="#">Reply</a></li>
                                </ul>
                                <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit amet
                                    scelerisque massa. Duis porta risus
                                    id urna finibus aliquet.</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="comments-grid">
                            <div class="comments-grid-left">
                                <img src="images/pf2.jpg" alt=" " class="img-responsive">
                            </div>
                            <div class="comments-grid-right">
                                <h4><a href="#">Adam Lii</a></h4>
                                <ul>
                                    <li>8 Nov 2017 <i>|</i></li>
                                    <li><a href="#">Reply</a></li>
                                </ul>
                                <p>Ut ex metus, ornare ac ultricies sit amet, auctor a elit. Praesent sit amet
                                    scelerisque massa. Duis porta risus
                                    id urna finibus aliquet.</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="w3layouts_mail_grid single">
                            <h3 class="single">Leave a Comment</h3>
                            <form action="#" method="post">
                                <div class="col-md-6 wthree_contact_left_grid">
                                    <input type="text" name="Name" placeholder="Name" required="">
                                    <input type="email" name="Email" placeholder="Email" required="">
                                    <input type="text" name="Telephone" placeholder="Telephone" required="">
                                    <input type="text" name="Subject" placeholder="Subject" required="">
                                </div>
                                <div class="col-md-6 wthree_contact_left_grid">
                                    <textarea name="Message" placeholder="Message..." required=""></textarea>
                                    <input type="submit" value="Submit">
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
@endsection