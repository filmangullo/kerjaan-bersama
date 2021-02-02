@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">List Kontak</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telpon</th>
                                <th scope="col">Subjek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontaks as $key => $kontak)
                            <tr>
                                <th scope="row">{{ $key+=1 }}</th>
                                <td>{{ $kontak->name }}</td>
                                <td>{{ $kontak->email }}</td>
                                <td>{{ $kontak->telepon }}</td>
                                <td>
                                    {{ $kontak->subject}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan='5'>{!! $kontak->message !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <div class="float-right">
                        {{ $kontaks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection