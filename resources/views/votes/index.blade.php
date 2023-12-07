@extends('template')
@section('content')
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
                            <a href="{{ route('votes.show', $vote->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('votes.edit', $vote->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            @if ($vote->status == 1)
                                <form onsubmit="return confirm('Apakah Anda Yakin Memulai Pemilihan ?');" action="{{ route('startvotes', $vote->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">MULAI</button>
                                </form>
                            @elseif ($vote->status == 2)
                                <form onsubmit="return confirm('Apakah Anda Yakin Mengakhiri Pemilihan ?');" action="{{ route('endvotes', $vote->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning">AKHIRI</button>
                                </form>
                            @endif
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('votes.destroy', $vote->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
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
@endsection
