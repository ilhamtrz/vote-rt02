@extends('template')
@section('content')
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Kartu Keluarga</h3>
                <hr>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-md btn-success mb-3">Tambah KK</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Nomor Kartu Keluarga</th>
                    <th scope="col">Kepala Keluarga</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->no_kk }}</td>
                        <td>{{ $user->kepala_keluarga}}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data KK Kosong.
                    </div>
                @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
