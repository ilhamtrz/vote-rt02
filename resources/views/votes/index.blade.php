@extends('template')
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Pemilihan</h3>
                <hr>
            </div>
            <a href="{{ route('votes.create') }}" class="btn btn-md btn-success mb-3">Tambah Pemilihan</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Pemilihan</th>
                    <th scope="col">Periode</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($votes as $vote)
                    <tr>
                        <td>{{ $vote->deskripsi }}</td>
                        <td>{{ $vote->periode }}</td>
                        <td>    @if ($vote->status == 1)
                                    Belum Berjalan
                                @elseif ($vote->status == 2)
                                    Sedang Berjalan
                                @else
                                    Selesai
                                @endif
                        </td>
                        <td class="text-center">
                            <div class="row justify-content-center d-inline-flex">
                                @if ($vote->status == 1 or $vote->status == 2)
                                    <div class="col">
                                        <a href="{{ route('votes.edit', $vote->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    </div>
                                @endif
                                @if ($vote->status == 1)
                                    <div class="col">
                                        <form onsubmit="return confirm('Apakah Anda Yakin Memulai Pemilihan ?');" action="{{ route('startvotes', $vote->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">MULAI</button>
                                        </form>
                                    </div>
                                @elseif ($vote->status == 2)
                                    <div class="col">
                                        <form onsubmit="return confirm('Apakah Anda Yakin Mengakhiri Pemilihan ?');" action="{{ route('endvotes', $vote->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning">AKHIRI</button>
                                        </form>
                                    </div>
                                @endif
                                @if ($vote->status == 1 or $vote->status == 3)
                                    <div class="col">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('votes.destroy', $vote->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </td>

                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Pemilihan Kosong.
                    </div>
                @endforelse
                </tbody>
            </table>
            {{ $votes->links() }}
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection
