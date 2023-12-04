@extends('template')
@section('content')
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Detail KK</h3>
                <hr>
            </div>
            <h4>Nomor KK: {{ $user->no_kk }}</h4>
            <h4>Kepala Keluarga: {{ $user->kepala_keluarga }}</h4>
        </div>
    </div>
@endsection
