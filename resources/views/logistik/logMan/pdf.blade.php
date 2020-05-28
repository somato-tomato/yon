<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 4 Table Responsive Using Colspan and Rowspan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        hr.new4 {
            border: 1px solid gray;
        }
    </style>
    <style>
        .payment-of-tax h2 {
            color: #444;
            font-size: 30px;
            margin: 20px 0px;
            text-align: center;
            text-transform: uppercase;
        }
        .payment-of-tax table tr th{
            text-align: center;
            vertical-align: middle;
            font-size: 13px;
        }
        .payment-of-tax table tr td{
            vertical-align: middle;
        }
    </style>
</head>

<body >

<div class="row">
    <div class="col-12">
        <div class="payment-of-tax">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
{{--                        <th rowspan="4"><img src="{{ asset('/css/PEI-pindad.png') }}" width="100" ></th>--}}
                        <th rowspan="4"><img src="{{ public_path().'/css/PEI-pindad.png' }}" width="100" class="align-self-center"></th>
                        <td>PT PINDAD ENJINIRING INDONESIA</td>
                        <td>NOMOR</td>
                    </tr>
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal PPMJ</th>
                    </tr>
                    <tr>
                        <th>Nomor PP</th>
                        <th>Dasar PP</th>
                        <th>Tanggal PP</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
    <br/>
<table class="table table-sm table-borderless">
    <tbody>
    <tr>
        <th rowspan="3" style="text-align: center"><img src="{{ public_path().'/css/PEI-pindad.png' }}" width="150" ></th>
        <td colspan="3" style="text-align: center"><h5>PT PINDAD ENJINIRING INDONESIA - DIVISI BISNIS MANUFAKTUR</h5><hr/></td>
    </tr>
    <tr>
        <td>Nomor PPMJ : PPMJ/A51/2019/0001</td>
        <td></td>
        <td>Tanggal PPMJ : 2020/02/20</td>
    </tr>
    <tr>
        <td>Dasar PP : PPMJ/A51/2019/0001</td>
        <td style="text-align: center">Tanggal PP : 2020/02/20</td>
        <td style="text-align: right">Tanggal PO : 2020/02/20</td>
    </tr>
    </tbody>
</table>














<div class="row">
    <div class="col-md-12">
        <div class="col-6 bg-success">1 of 4</div>
        <div class="col-6 bg-warning">2 of 4</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-3 col-md-6 col-lg-4 col-xl-2 border border-danger">
    </div>
    <div class="col-sm-9 col-md-6 col-lg-8 col-xl-10 bg-danger">
        <div class="row">
            <div class="col-4 col-sm-6 bg-warning   ">
                PT Pindad Enginiring
            </div>
        </div>
    </div>
</div>
<br/><br/><br/><br/>
<div class="row">
    <div class="col-sm-9 bg-danger">
        Level 1: .col-sm-9
        <div class="row">
            <div class="col-4 col-sm-6 bg-warning">
                Level 2: .col-4 .col-sm-6
            </div>
        </div>
    </div>
</div>
<br/><br/><br/><br/><br/>
<div class="row">
    <div class="col-md-2 border border-danger">
        <img width="100%" src="{{ public_path().'/css/PEI-pindad.png' }}">
    </div>
    <div class="col-md-9 border border-danger">
{{--        <br/>--}}
        <h2>
            PT PINDAD ENJINIRING INDONESIA - DIVISI BISNIS MANUFAKTUR
        </h2>
        <hr class="new4">
        <div class="row">
            <div class="col-md-6 border border-danger">
                <h5>Nomor PPMJ : PPMJ/A51/2019/0001</h5>
            </div>
            <div class="col-md-6 border border-danger">
                <h5 style="text-align: right">Tanggal PPMJ : 2020/02/20</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 border border-danger">
                <h5>Dasar PP : PPMJ/A51/2019/0001</h5>
            </div>
            <div class="col-md-4 border border-danger">
                <h5 style="text-align: center">Tanggal PP : 2020/02/20</h5>
            </div>
            <div class="col-md-4 border border-danger">
                <h5 style="text-align: right">Tanggal PO : 2020/02/20</h5>
            </div>
        </div>
    </div>
</div>
</body>

</html>
