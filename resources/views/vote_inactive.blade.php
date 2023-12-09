<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                font-size: 50px;
                font-weight: bold;
                color: rgb(22, 100, 202);
            }
            @media screen and (max-width: 700px) {
            .button-text{
                font-size: 40px;
                font-weight: bold;
                color: rgb(22, 100, 202);
            }
            }

            @media screen and (max-width: 400px) {
            .button-text{
                font-size: 25px;
                font-weight: bold;
                color: rgb(22, 100, 202);
            }
            }
        </style>
    </head>
    <body>
        <div class="box">
            <div class="inner-box">
                <span class="button-text">Maaf Tidak Ada Pemilihan Yang Aktif</span>
            </div>
            <script>
                setTimeout(function() {
                    window.location.replace('{{ url('/') }}');
                }, 3000); // 2 second
             </script>
        </div>
    </body>
</html>
