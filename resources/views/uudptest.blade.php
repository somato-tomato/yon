<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
{{--    <link href="{{ public_path().'/css/bootstrap.min.css' }}" rel="stylesheet" />--}}
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        p {
            margin: 0;
            padding: 0;
        }

        .flex-column {
            -webkit-display: -webkit-box;
            -webkit-display: -webkit-flex;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-direction: column;
            /*padding: 5px 1px 5px;*/
        }
        .flex-row {
            -webkit-display: -webkit-box;
            -webkit-display: -webkit-flex;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-direction: row;
            padding: 5px 1px 11px;
        }
    </style>
    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <br>
    <div class="row" style="display: -webkit-box;">
        <div class="col-md-4 border border-warning">
{{--            <img style="width: 70%" src="{{ public_path().'/css/PEI-pindad.png' }}" alt="asd">--}}
            <img style="width: 70%" src="{{ asset('/css/PEI-pindad.png') }}" alt="asd">
        </div>
    </div>

    <p style="text-align: right">Bandung, 24 April 2020</p>
    <div class="row" style="text-align: center">
        <p><u>NOTA DINAS</u></p>
        <p> N O M O R : ND/ 273 /LOG/ IV /2020</p>
    </div>

    <p>Kepada Yth &nbsp;: Direktur Administrasi & Keuangan</p>
    <p>Lampiran : 5 (helai)</p>
    <p>Perihal : <u>Permohonan Dana Operasional (UUDP)</u></p>

    <div class="row">
        <ol type="1">
            <li>Asu
                <ol type="a">
                    <li>asu</li>
                    <li>asu</li>
                    <li>asu</li>
                    <li>asu</li>
                    <li>asu</li>
                    <li>asu</li>
                </ol></li>
            <li>Asu</li>
            <li>Asu</li>
        </ol>
    </div>
</div>
</body>
</html>
