<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- css --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        {{-- bootstrap icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <style>
            .sidebar{
                height: 100vh; /* Tinggi maksimal sesuai dengan tinggi viewport */
                overflow-y: auto; /* Tambahkan overflow-y: auto untuk memungkinkan scroll jika kontennya melebihi tinggi maksimal */
            }
            main{
                background: white;
            }
            #icon-utama{
                width: 100px;
                height: 100px
            }
            .content{
              margin: 20px;
            }
        </style>
    </head>
    <body>
        <main class="d-flex flex-nowrap">
            <div class="d-flex flex-column flex-shrink-0 sidebar p-3 text-bg-dark" style="width: 280px;">
              <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="{{ URL::asset('assets/images/icon.png') }}" id="icon-utama" alt="Image"/>
                <span class="fs-4 ms-4">Home</span>
              </a>
              <hr>
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                  <a href="#" class="nav-link active" aria-current="page">
                    <i class="bi bi-house-door-fill me-2" style="font-size: 1rem; color: white;"></i>
                    Dashboard
                  </a>
                </li>
                <li>
                  <a href="{{ url('/coba') }}" class="nav-link text-white">
                    <i class="bi bi-flag-fill me-2" style="font-size: 1rem; color: white;"></i>
                    Pemilihan
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link text-white">
                    <i class="bi bi-person-fill me-2" style="font-size: 1rem; color: white;"></i>
                    Calon
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link text-white">
                    <i class="bi bi-person-vcard-fill me-2" style="font-size: 1rem; color: white;"></i>
                    Kartu Keluarga
                  </a>
                </li>
              </ul>
              <hr>
              <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                  <li><a class="dropdown-item" href="#">New project...</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>
            </div>
            <div class="content">
                <h2>Ini content</h2>
                <i class="bi-alarm" style="font-size: 2rem; color: cornflowerblue;"></i>
            </div>
        </main>
    </body>
    <footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    </footer>
</html>
