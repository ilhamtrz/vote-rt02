@extends('template')
@section('content')
    <div class="row m-3">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Tambah Calon</h3>
                <hr>
            </div>
            <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Foto</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                    <!-- error message untuk image -->
                    @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Nomor KK</label>
                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk') }}" placeholder="Masukkan Nomor KK Calon">

                    <!-- error message untuk no_kk -->
                    @error('no_kk')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Calon">

                    <!-- error message untuk nama -->
                    @error('nama')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Visi dan Misi</label>
                    <textarea class="form-control @error('visi_misi') is-invalid @enderror" name="visi_misi" rows="5" placeholder="Masukkan Konten Post">{{ old('visi_misi') }}</textarea>

                    <!-- error message untuk visi_misi -->
                    @error('visi_misi')
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
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'visi_misi' );
    </script>
@endsection
