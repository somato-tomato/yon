@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'po'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Purchase Order - PMT</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a type="button" class="btn btn-primary btn-sm" href="#">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div hidden class="form-group">
                            <label for="idPPC">ID PPMJ</label>
                            <input readonly type="text" class="form-control" id="idPPC" name="idPPC" value="{{ $ppmj->id }}">
                        </div>
                        <div hidden class="form-group">
                            <label for="idVendor">ID Vendor</label>
                            <input readonly type="text" class="form-control" id="idVendor" name="idVendor" value="{{ $vendors->id }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomorPPMJ">Nomor PPMJ</label>
                                <input readonly type="text" class="form-control" id="nomorPPMJ" value="{{ $ppmj->nomorPPMJ }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalPPMJ">Tanggal PPMJ</label>
                                <input readonly type="text" class="form-control" id="tanggalPPMJ" value="{{ $ppmj->tanggalPPMJ }}">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <p>Kepada</p>
                            <h4 style="margin-top: -20px">{{ $vendors->namaVendor }}</h4>
                            <p style="font-size: 10px; margin-top: -15px">{{ $vendors->alamatVendor }} {{ $vendors->alamatVendor2 }}</p>
                            <p style="font-size: 10px; margin-top: -15px">Telp {{ $vendors->telepon }}</p>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-flush">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">Nomor PO</th>
                                    <th scope="col" class="text-center">Tanggal PO</th>
                                    <th scope="col" class="text-center">Total Harga</th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ( $dataPO as $d)
                                    <tr>
                                        <td>{{ $d->noPO }}
                                        <td>{{ $d->tglPO }}
                                        <td>{{ $d->totalHarga }}</td>
                                        <td><a type="button" class="btn btn-success btn-sm" href="{{ url('logistik/staff/'.$d->vendor.'/unduh/'.$d->id.'/po/'.$d->idPPC.'/unduh') }}">Unduh PO</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
