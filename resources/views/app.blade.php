<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        * {
    margin: 0;
    padding: 0;
}

html {
    padding: 0;
    margin: 0;
}

body {
    padding: 0;
    margin: 0;
}

.CountainerIndex {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.CountainerLogin {
    width: 400px;
    height: 500px;
    background-color: #176B87;
    border-radius: 30px;
}

.TulisanLoginTop {
    font-size: 70px;
    width: 100%;
    text-align: center;
    color: aliceblue;
}

.LabelLogin {
    margin-top: 15px;
    color: aliceblue;
    font-size: 30px;
    margin-left: 20px;
}

.FormInputLogin {
    width: 100%;
    /* display: flex; */
}

.FormInputNoKK {
    width: 80%;
    margin-left: auto;
    margin-right: auto;
    height: 40px;
    border-radius: 10px;
    font-size: 30px;
}

.SubmitforLogin {
    width: 80%;
    height: 40px;
    margin-top: 30px;
    border-radius: 10px;
}

.CountainerInputFormInputNoKK{
    width: 100%;
    display: flex;
    justify-content: center;
}
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Document</title> --}}
</head>
<body>
    @yield('konten')
</body>
</html>