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
        </style>
    </head>
    <body>
        <div class="box">
            <div class="inner-box px-5">
                <input type="text" class="form-control text-center border-dark" placeholder="Masukan Nomor Kartu Keluarga" aria-label="Username" aria-describedby="basic-addon1">
                <button type="button" class="btn btn-primary rounded button-text mt-4">Kirim</button>
            </div>
          </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
