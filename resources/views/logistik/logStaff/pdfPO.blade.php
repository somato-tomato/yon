<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ public_path().'/css/bootstrap.min.css' }}" rel="stylesheet" />
    <title>{{ $po->noPO }}</title>
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
        /*hr.ttd {*/
        /*    margin-bottom: -1px;*/
        /*    margin-top: -1px;*/
        /*    width:50%;*/
        /*    border: 1px solid black;*/
        /*}*/
    </style>
</head>
<body>
<div class="container">
    <br/>
    <div class="row" style="display: -webkit-box;">
        <div class="col-md-2">
            <img style="width: 70%" src="{{ public_path().'/css/PEI-pindad.png' }}" alt="asd">
        </div>
        <div class="col-md-10" style="font-size: 18px">
            <strong>PT. PINDAD ENJINIRING INDONESIA</strong>
            <table>
                <tr style="font-size: 16px">
                    <td>Alamat</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">Jl. Jend. Gatot Subroto No. 517, Bandung, 40285, Indonesia</td>
                </tr>
                <tr style="font-size: 16px">
                    <td>Telepon</td><td style="padding-left: 10px">:</td><td style="padding-left: 10px">022-7312073 Ext.2810.2809 Fax.022-7323541</td>
                </tr>
                <tr style="font-size: 18px">
                    <td><strong>NPWP / PKP</strong></td><td style="padding-left: 10px">:</td><td style="padding-left: 10px"><strong>01.79.884.8-015.000</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <br/>
    <div class="row" style="height: 190px; display: -webkit-box;">
        <div class="col-md-2">
            <p style="font-size: 18px">Kepada :</p>
            <p style="font-size: 22px"><strong>{{ $vendors->namaVendor }}</strong></p>
            <p style="font-size: 18px">{{ $vendors->alamatVendor }}</p>
            <p style="font-size: 18px">{{ $vendors->alamatVendor2 }}</p>
            <p style="font-size: 18px">Telp {{ $vendors->telepon }}</p>
        </div>
        <div class="col-md-10">
            <div class="flex-row">
                <div class="p-1 text-center" style="width: 400px;">
                    <br/>
                    <h3>PURCHASE ORDER</h3>
                </div>
                <div class="p-1" style="width: 400px;">
                    <table style="font-size: 17px">
                        <tr>
                            <td>Nomor</td>
                            <td style="padding-left: 15px">:</td>
                            <td style="padding-left: 15px">{{ $po->noPO }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td style="padding-left: 15px">:</td>
                            <td style="padding-left: 15px">{{ $po->tglPO }}</td>
                        </tr>
                        <tr>
                            <td>PPMJ</td>
                            <td style="padding-left: 15px">:</td>
                            <td style="padding-left: 15px">{{ $ppmj->nomorPPMJ }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td style="padding-left: 15px">:</td>
                            <td style="padding-left: 15px">{{ $ppmj->tanggalPPMJ }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="flex-column" style="font-size: 17px">
                <div class="p-2 border border-warning">
                    <p>Tempat Penyerahan : {{ $po->tempatPenyerahan }}</p>
                </div>
            </div>
            <div class="flex-column" style="font-size: 17px; width: 800px">
                <div>
                    <p>Waktu Penyerahan : {{ $po->waktuPenyerahan }}</p>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <div class="row" style="margin-top: -20px">
        <div class="col-xs-12 text-center">
            <h4><strong>PEMBAYARAN</strong></h4>
            <p style="font-size: 16px"> {{ $po->ketPembayaran }} </p>
        </div>
    </div>
    <br/>
    <div class="row">
        <table class="table table-striped">
            <thead style="font-size: 18px">
            <tr>
                <th class="text-center">
                    Nama Material
                </th>
                <th class="text-center">
                    Satuan
                </th>
                <th class="text-center">
                    Jumlah Material
                </th>
                <th class="text-center">
                    Satuan Harga
                </th>
                <th class="text-center">
                    Jumlah Harga
                </th>
            </tr>
            </thead>
            <tbody style="font-size: 18px">
            @foreach( $isi as $i )
                <tr>
                    <td class="text-center">{{ $i->namaMaterial }}</td>
                    <td class="text-center">{{ $i->satuan }}</td>
                    <td class="text-center">{{ $i->jumlahMaterial }}</td>
                    <td class="text-center">{{ $i->satuanHarga }}</td>
                    <td class="text-center">{{ $i->jumlahHarga }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>Jumlah</strong></td>
                <td class="text-center">{{ $po->totalHarga }}</td>
            </tr>
            <tr class="text-center"><td colspan="5"><strong>{{ $up }}</strong></td></tr>
            </tbody>
        </table>
        <br/>
        <div class="row" style="display: -webkit-box;">
            <div class="col-md-6 text-center" style="text-align: center; margin-left: 250px">
                <p style="font-size: 16px"><strong>PIHAK PENJUAL</strong></p>
                <p class="text-uppercase" style="font-size: 18px"><strong>{{ $vendors->namaVendor }}</strong></p>
                <br/><br/><br/><br/><br/><br/><br/><br/>
{{--                <p style="font-size: 18px"><strong>(NAMA ORANG)</strong></p>--}}
                <hr class="ttd">
{{--                <p style="font-size: 18px"><strong>(JABATAN)</strong></p>--}}
            </div>
            <div class="col-md-6 text-center" style="text-align: center; margin-left: 250px">
                <p style="font-size: 16px"><strong>PIHAK PEMBELI</strong></p>
                <p style="font-size: 18px"><strong>PT. PINDAD ENJINIRING INDONESIA</strong></p>
                <p style="font-size: 18px"><strong>(DIREKSI)</strong></p>
                <br/><br/><br/><br/><br/><br/><br/>
{{--                <p style="font-size: 18px"><strong>(NAMA ORANG)</strong></p>--}}
                <hr class="ttd">
{{--                <p style="font-size: 18px"><strong>(JABATAN)</strong></p>--}}
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-8" style="font-size: 15px">
                <p style="margin-bottom: -11px">Dasar</p>
                &nbsp;<p>{{ $po->dasar }} &nbsp; {{ $po->dasarTanggal }}</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
