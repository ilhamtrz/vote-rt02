<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Pie Chart --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Sistem Pemilihan Ketua RT</title>
    <style>
        .sidebar{
            height: 100vh; /* Tinggi maksimal sesuai dengan tinggi viewport */
            overflow-y: auto; /* Tambahkan overflow-y: auto untuk memungkinkan scroll jika kontennya melebihi tinggi maksimal */
        }
        main{
            background: white;
            height: 100vh;
        }
        #icon-utama{
            width: 100px;
            height: 100px
        }
        .content{
          margin: 20px;
          width: 100%;
          height: 100vh;
          overflow-y: auto;
        }
    </style>
</head>
<body>
    <main class="d-flex flex-nowrap overflow-hidden">
        @include('navbar')
        <div class="content m-0 p-4">
            @yield('content')
        </div>
    </main>
    @yield('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
</body>
</html>
