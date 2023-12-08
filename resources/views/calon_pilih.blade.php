<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            html, body {
            margin:0px;
            height: 100%;
            }
            .box {
            width: 100%;
            height: 100%;
            display: table;
            }
            .inner-box{
            text-align:center;
            display:table-cell;
            vertical-align: middle;
            }
            .button-text{
                font-size: 20px;
                font-weight: bold;
            }
            .button-card{
                font-size: 20px;
                font-weight: bold;
            }
            .row img{
                height: 280px;
            }
            .row div{
                min-width: 200px;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <div class="inner-box px-5">
                <div class="row gy-5 d-flex justify-content-center">
                    @forelse ($candidates as $candidate)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-md-3 col-sm-6 d-flex align-items-stretch justify-content-center" data-bs-toggle="modal" data-bs-target="#Calon{{$candidate->id}}">
                        <div class="card border-primary border-2">
                            @if($candidate->image)
                                <img src="{{ asset('/storage/candidates/'.$candidate->image) }}" class="rounded card-img-top">
                            @else
                                <i class="bi bi-file-image card-img-top" style="font-size: 200px"></i>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{$candidate->nama}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="Calon{{$candidate->id}}" aria-labelledby="Calon{{$candidate->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail {{$candidate->nama}}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Visi dan Misi</h2>
                                    {!! $candidate->visi_misi !!}
                                    <h6>Apakah Anda Yakin Memilih {{$candidate->nama}} ?</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{route('voting')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input name="candidate" type="hidden" value={{$candidate->id}}>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="alert alert-danger">
                            Data Calon Kosong.
                        </div>
                    @endforelse
                </div>
            </div>
          </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
