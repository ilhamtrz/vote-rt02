@extends('template')
@section('content')
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Status Pemilihan</h3>
                <hr>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Nomor Kartu Keluarga</th>
                    <th scope="col">Kepala Keluarga</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($voterDatas as $data)
                    <tr>
                        <td>{{ $data->no_kk }}</td>
                        <td>{{ $data->kepala_keluarga}}</td>
                        @if ($data->status == 1)
                            <td class="text-success">Sudah Memilih</td>
                        @else
                            <td>Belum Memilih</td>
                        @endif
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Pemilih Kosong.
                    </div>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
