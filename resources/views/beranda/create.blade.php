@extends('layouts.content')

@section('short')
<div class="services-breadcrumb_w3layouts">
    <div class="inner_breadcrumb">

        <ul class="short_w3ls"_w3ls>
            <li><a href="/">Beranda</a><span>|</span></li>
            <li>Mata Pelajaran<span>|</span></li>
            <li>Create</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="inner_content_info_agileits">
    <div class="container">
        <div class="tittle_head_w3ls">
            <h3 class="tittle">Tambah Mata Pelajaran</h3>
        </div>
        <div class="inner_sec_grids_info_w3ls">
            <div class="w3layouts_mail_grid">
                <form action="{{route("mata-pelajaran.store")}}" method="post">
                    @csrf
                    <div class="col-md-12 wthree_contact_left_grid">
                        <input type="text" name="nama" placeholder="Nama Pelajaran" required="">
                        <textarea name="keterangan" placeholder="Pesan..." required=""></textarea>
                        <input type="submit" value="Submit">
                    </div>
                    <div class="clearfix"> </div>

                </form>
            </div>


        </div>

    </div>
</div>
@endsection