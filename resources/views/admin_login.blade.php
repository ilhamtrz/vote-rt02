<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        html, body {
            margin: 0;
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

        .button-text {
            font-size: 20px;
            font-weight: bold;
        }

        form img {
            width: 100px;
            height: 100px;
            top: 10px;
            left: 10px;
        }
        .user-link {
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
        <div class="inner-box px-5 position-relative">
            <form action="{{route('adminlogin')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <img src="{{ URL::asset('assets/images/icon.png') }}" id="icon-utama" alt="Image"/>
                <div class="form-floating">
                    <input name="kepala_keluarga" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-body-secondary">&copy; 2023</p>
            </form>
        </div>
        <a href="{{ route('login') }}" class="user-link">User Login</a>
    </div>
</body>
</html>
