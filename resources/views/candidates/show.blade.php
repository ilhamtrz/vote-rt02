@extends('template')
@section('content')
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Detail Calon</h3>
                <hr>
            </div>
            @if($candidate->image)
                <img src="{{ asset('/storage/candidates/'.$candidate->image) }}" class="w-100 rounded">:
            @else
                <i class="bi bi-file-image" style="font-size: 200px;"></i>
            @endif
            <hr>
            <h4>Nomor KK Calon: {{ $candidate->no_kk }}</h4>
            <h4>Nama Calon: {{ $candidate->nama }}</h4>
        </div>
    </div>
@endsection
