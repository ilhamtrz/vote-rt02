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
        </style>
    </head>
    <body>
        <div class="box">
            <div class="inner-box px-5">
                <div class="row gx-5 d-flex justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-5 col-md-4 col-sm-6">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#calon1">
                            <div class="card border-primary border-2 p-0">
                                <img src="https://w0.peakpx.com/wallpaper/506/624/HD-wallpaper-iron-man-ironman-vector-vector-art.jpg" class="card-img-top" alt="tony-stark">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Bapak Ilham</h5>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#calon2">
                            <div class="card border-primary border-2 p-0">
                                <img src="https://w0.peakpx.com/wallpaper/506/624/HD-wallpaper-iron-man-ironman-vector-vector-art.jpg" class="card-img-top" alt="tony-stark">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Bapak Ilham</h5>
                                </div>
                            </div>
                        </button>
                    </div>

                    {{-- Modal --}}
              <div class="modal fade" id="calon1" aria-labelledby="calon1Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Calon 1</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Apakah Anda Yakin?</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{route('voting')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input name="candidate" type="hidden" value=1>
                                <button type="submit" class="btn btn-primary">Ya</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal fade" id="calon2" aria-labelledby="calon2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Calon 2</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Apakah Anda Yakin?</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="{{route('voting')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input name="candidate" type="hidden" value=2>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            </div>
          </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
