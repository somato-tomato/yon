<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ public_path().'/css/bootstrap.min.css' }}" rel="stylesheet" />
    <title>{{ $ppmj->nomorPPMJ }}</title>
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

        hr.ttd {
            margin-bottom: -1px;
            margin-top: -1px;
            /*width:50%;*/
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div class="container">
    <br>
    <div class="row" style="display: -webkit-box;">
        <div class="col-md-2">
            <img width="70%" src="{{ public_path().'/css/PEI-pindad.png' }}">
        </div>
        <div class="col-md-4" style="font-size: 17px; margin-left: -100px;">
            <br/>
            <p style="margin-top: -14px"><strong>PT. PINDAD ENJINIRING INDONESIA</strong></p>
            <br/>
            <p style="margin-top: -10px"><strong>DIVISI BISNIS MANUFAKTUR</strong></p>
        </div>
        <div class="col-md-6" >
            <table>
                <tbody>
                <tr>
                    <td>Nomor</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">{{ $ppmj->nomorPPMJ }}</td>
                </tr>
                <tr>
                    <td>Tanggal PPMJ</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">{{ $ppmj->tanggalPPMJ }}</td>
                </tr>
                <tr>
                    <td>Dasar PP</td><td style="padding-left: 10px">:</td><td style="width: 150px; padding-left: 10px">{{ $ppmj->dasarPPMJ }}</td>
                    <td>Tanggal</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">{{ $ppmj->tanggalPPMJ }}</td>
                </tr>
                <tr>
                    <td>Tanggal PP</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">{{ $ppmj->tanggaPP }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-xs-12 text-center">
            <h4><strong>PERINTAH PENGADAAN MATERIAL / JASA (PPM/J)</strong></h4>
        </div>
    </div>
    <br/>
    <div class="row" style="display: -webkit-box;">
        <div class="col-md-5">
            <p><strong>Kepada</strong> : {{ $ppmj->pemesan }}</p>
            <p>Harap segera diadakan material/jasa sebagai berikut, untuk :</p>
        </div>
        <div class="col-md-7">
            <table>
                <tbody>
                <tr>
                    <td style="width: 200px;"><strong>Pemesan</strong> : {{ $ppmj->tujuanSurat }}</td>
                    <td style="width: 200px; padding-left: 15px"><strong>Nama Order</strong> : {{ $ppmj->namaOrder }}</td>
                    <td style="width: 200px; padding-left: 15px"><strong>No PO</strong> : {{ $ppmj->nomorPO }}</td>
                    <td style="width: 200px; padding-left: 15px"><strong>Jumlah Order</strong> : {{ $ppmj->jumlahOrder }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <div class="row" style="display: -webkit-box;">
        <div class="table">
            <table class="table table-bordered table-striped"  style="font-size: 12px;">
                <thead>
                <tr>
                    <th>Nama & Spesifikasi Material dan Jasa</th>
                    <th style="width: 10px">SAT</th>
                    <th style="width: 10px">JML</th>
                    <th class="text-center">Estimasi SAT</th>
                    <th class="text-center">Estimasi JML</th>
                    <th class="text-center">Jumlah Penyerahan</th>
                    <th class="text-center">Tanggal Penyerahan</th>
                    <th class="text-center">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $isi as $i)
                    <tr>
                        <td>{{ $i->namaMaterial }}</td>
                        <td>{{ $i->satuan }}</td>
                        <td>{{ $i->jumlahMaterial }}</td>
                        <td class="text-right">{{ $i->satuanHarga }}</td>
                        <td class="text-right">{{ $i->jumlahHarga }}</td>
                        <td class="text-center">9999</td>
                        <td class="text-center">12 September 2020</td>
                        <td style="text-align: center">{{ $i->keterangan }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td class="text-center" colspan="4"><strong>TOTAL</strong></td>
                    <td colspan="4">{{ $total->total }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row" style="display: -webkit-box;">
        <div class="col-md-4" style="margin-right: 200px">
            <p>Tembusan :</p>
            <p> PPIC</p>
            <p >Pengadaan</p>
            <p>Adminku</p>
        </div>
        <div class="col-md-4" style="margin-right: 100px; margin-left: 100px">
            <p>Diterima di bagian pengadaan :</p>
            <p>Tanggal :</p>
            <p>Tanda Tangan :</p>
            <p>Nama Jelas :</p>
        </div>
        <div class="col-md-4 text-center" style="margin-left: 200px">
            <p>Manager PPC DIVISI PRODUKSI</p>
            <img width="100%" src="{{ public_path().'/signature/'.$nama->path }}">
            <p>{{ $nama->name }}</p>
        </div>
    </div>
</div>
</body>
</html>
