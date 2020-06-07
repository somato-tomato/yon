<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
        <link href="{{ public_path().'/css/bootstrap.min.css' }}" rel="stylesheet" />
{{--    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />--}}
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
            <img style="width: 70%" src="{{ public_path().'/css/PEI-pindad.png' }}" alt="asd">
{{--            <img style="width: 70%" src="{{ asset('/css/PEI-pindad.png') }}" alt="asd">--}}
        </div>
    </div>

{{--    Carbon\Carbon::parse($quotes->created_at)->format('d-m-Y i')--}}
    <p style="text-align: right">Bandung, {{ Carbon\Carbon::parse($uudp->tglUUDP)->locale('fr_FR')->formatLocalized("%d %B %Y") }}</p>
    <div class="row" style="text-align: center">
        <p><u>NOTA DINAS</u></p>
        <p> N O M O R : {{ $uudp->noUUDP }}</p>
    </div>

    <div class="table">
        <table>
            <tbody>
            <tr>
                <td>Kepada Yth</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">{{ $uudp->kepada }}</td>
            </tr>
            <tr>
                <td>Lampiran</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">{{ $uudp->lampiran }} (helai)</td>
            </tr>
            <tr>
                <td>Perihal</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px"><u>{{ $uudp->perihal }}</u></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <ol type="1" style="padding-left: 110px; text-align: justify">
            <li>Dasar PPMJ Divisi Produksi nomor
                <ol type="a">
                    @foreach( $ppmj as $p )
                        <li>{{ $p->nomorPPMJ }} tanggal {{ $p->tanggalPPMJ }}, perihal pengadaan {{ $p->namaMaterial }} dll (Order {{ $p->pemesan }}) sebesar {{ $p->jumlahHargaIsi }}</li>
                    @endforeach
                </ol>
            </li>
            @if( $uudp->jenisBeli == 'bertahap')
                <li>Guna Mendiking kelancaran kebutuhan di Divisi Produksi perihal pengadaan LOREM dll sebesar {{ $isi->total }} terbilang (Sembilan Ratus Sembilan Puluh Sembilan Sembilan Sembilan Sembilan Juta) <b>Pembelian secara bertahap</b> dan di pertanggung jawabkan kemudian</li>
            @else
                <li>Guna Mendiking kelancaran kebutuhan di Divisi Produksi perihal pengadaan LOREM dll sebesar {{ $isi->total }} terbilang (Sembilan Ratus Sembilan Puluh Sembilan Sembilan Sembilan Sembilan Juta) <b>Pembelian secara TUNAI</b> dan di pertanggung jawabkan kemudian</li>
            @endif
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
