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

    <div class="table">
        <table>
            <tbody>
            <tr>
                <td>Kepada Yth</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">Direktur Administrasi & Keuangan</td>
            </tr>
            <tr>
                <td>Lampiran</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">5 (helai)</td>
            </tr>
            <tr>
                <td>Perihal</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px"><u>Permohonan Dana Operasional (UUDP)</u></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <ol type="1" style="padding-left: 110px; text-align: justify">
            <li>Dasar PPMJ Divisi Produksi nomor
                <ol type="a">
                    <li>PPMJ/185/DP/IV/2020 tanggal 16 April 2020, perihal pengadaan Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet dll (Order Pertshop 3 KL ) Sebesar Rp. 2.985.500</li>
                    <li>PPMJ/185/DP/IV/2020 tanggal 16 April 2020, perihal pengadaan Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet dll (Order Pertshop 3 KL ) Sebesar Rp. 2.985.500</li>
                    <li>PPMJ/185/DP/IV/2020 tanggal 16 April 2020, perihal pengadaan Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet dll (Order Pertshop 3 KL ) Sebesar Rp. 2.985.500</li>
                    <li>PPMJ/185/DP/IV/2020 tanggal 16 April 2020, perihal pengadaan Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet dll (Order Pertshop 3 KL ) Sebesar Rp. 2.985.500</li>
                    <li>PPMJ/185/DP/IV/2020 tanggal 16 April 2020, perihal pengadaan Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet dll (Order Pertshop 3 KL ) Sebesar Rp. 2.985.500</li>
                    <li>PPMJ/185/DP/IV/2020 tanggal 16 April 2020, perihal pengadaan Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet dll (Order Pertshop 3 KL ) Sebesar Rp. 2.985.500</li>
                </ol></li>
            <li>Guna Mendiking kelancaran kebutuhan di Divisi Produksi perihal pengadaan Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet + Lorem ipsum dolor sit amet dll sebesar RP. 9.999.999.999 terbilang (Sembilan Ratus Sembilan Puluh Sembilan Sembilan Sembilan Sembilan Juta) <b>Pembelian secara bertahap</b> dan di pertanggung jawabkan kemudian</li>
            <li>Dmikian kami sampaikan atas kerja samanya duuicapakan terimakasih</li>
        </ol>
    </div>

    <div style="text-align: center;">
        <p><strong>PT. PINDAD ENJINIRING INDONESIA</strong></p>
        <p><strong>MANAGER LOGISTIK</strong></p>
        <br/><br/>
        {{--                <p style="font-size: 18px"><strong>(NAMA ORANG)</strong></p>--}}
        <hr class="ttd">
        {{--                <p style="font-size: 18px"><strong>(JABATAN)</strong></p>--}}
        <p><u>RUDY MARYONO</u></p>
    </div>
</div>
</body>
</html>
