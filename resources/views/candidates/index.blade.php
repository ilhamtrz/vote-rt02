@extends('template')
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Calon</h3>
                <hr>
            </div>
            <a href="{{ route('candidates.create') }}" class="btn btn-md btn-success mb-3">Tambah Calon</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nomor Kartu Keluarga</th>
                    <th scope="col">Nama Calon</th>
                    <th scope="col">Visi & Misi</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($candidates as $candidate)
                    <tr>
                        <td class="text-center">
                            @if($candidate->image)
                                <img src="{{ asset('/storage/candidates/'.$candidate->image) }}" class="rounded" style="width: 200px">
                            @else
                                <i class="bi bi-file-image" style="font-size: 200px"></i>
                            @endif
                        </td>
                        <td>{{ $candidate->no_kk }}</td>
                        <td>{{ $candidate->nama}}</td>
                        <td>{!! $candidate->visi_misi !!}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('candidates.destroy', $candidate->id) }}" method="POST">
                                <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Calon Kosong.
                    </div>
                @endforelse
                </tbody>
            </table>
            {{ $candidates->links() }}
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'TIDAK BISA HAPUS CALON!');
        @endif
    </script>
@endsection
