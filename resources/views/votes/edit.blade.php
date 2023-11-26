@extends('template')
@section('content')
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Edit Pemilihan</h3>
                <hr>
            </div>
            <form action="{{ route('votes.update', $vote->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi', $vote->deskripsi) }}" placeholder="Masukkan Deskripsi Pemilihan">

                    <!-- error message untuk deskripsi -->
                    @error('deskripsi')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Periode</label>
                    <input type="text" class="form-control @error('periode') is-invalid @enderror" name="periode" value="{{ old('periode', $vote->periode) }}" placeholder="Masukkan Periode Pemilihan">

                    <!-- error message untuk periode -->
                    @error('periode')
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
