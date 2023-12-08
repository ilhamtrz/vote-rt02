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
            display: flex;
            align-items: center;
            justify-content: center;
            }

            .inner-box {
                text-align: center;
                width: 500px;
            }
            .button-text{
                font-size: 20px;
                font-weight: bold;
            }
            .admin-link {
            position: absolute;
            bottom: 10px;
            right: 10px;
            text-decoration: none;
            color: #000;
            font-size: 14px;
        }
        </style>
    </head>
    <body>
        <div class="box">
            <div class="inner-box px-5">
                <form action="{{route('login')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="no_kk" class="form-control text-center border-dark" placeholder="Masukan Nomor Kartu Keluarga">
                    <button type="submit" class="btn btn-primary rounded button-text mt-4">Kirim</button>
                </form>
                <a href="{{ route('admin.login') }}" class="admin-link">Admin Login</a>
            </div>
          </div>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

        {{-- <script>
            //message with toastr
            @if(session()->has('sudah_pilih'))
                toastr.success('{{ session('error') }}', 'Maaf');
            @endif
        </script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
    </body>
</html>
