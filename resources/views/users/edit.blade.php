@extends('template')
@section('content')
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Edit KK</h3>
                <hr>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold">Nomor KK</label>
                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk', $user->no_kk) }}" placeholder="Masukkan Nomor KK>

                    <!-- error message untuk no_kk -->
                    @error('no_kk')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Kepala Keluarga</label>
                    <input type="text" class="form-control @error('kepala_keluarga') is-invalid @enderror" name="kepala_keluarga" value="{{ old('kepala_keluarga', $user->kepala_keluarga) }}" placeholder="Masukkan Nama Kepala Keluarga">

                    <!-- error message untuk kepala_keluarga -->
                    @error('kepala_keluarga')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                <button type="reset" class="btn btn-md btn-warning">Reset</button>

            </form>
        </div>
    </div>
@endsection
