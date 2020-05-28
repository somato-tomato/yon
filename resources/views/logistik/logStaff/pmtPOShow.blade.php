@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'po'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Detail PPMJ-{{ $ppmj->cekLogistik }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('logstaff.pmtPO') }}">Kembali</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
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

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dasarPP">Dasar PP</label>
                                <input readonly type="text" class="form-control" id="dasarPP" value="{{ $ppmj->dasarPP }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggalPP">Tanggal PP</label>
                                <input readonly type="text" class="form-control" id="tanggalPP" value="{{ $ppmj->tanggalPP }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggalPO">Tanggal PO</label>
                                <input readonly type="text" class="form-control" id="tanggalPO" value="{{ $ppmj->tanggalPO  }}">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="tujuanSurat">Kepada</label>
                            <input readonly type="text" class="form-control" id="tujuanSurat" value="{{ $ppmj->tujuanSurat }}">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="pemesan">Pemesanan</label>
                                <input readonly type="text" class="form-control" id="pemesan" value="{{ $ppmj->pemesan }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nomorPO">Nomor PO</label>
                                <input readonly type="text" class="form-control" id="nomorPO" value="{{ $ppmj->nomorPO }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="namaOrder">Nama Order</label>
                                <input readonly type="text" class="form-control" id="namaOrder" value="{{ $ppmj->namaOrder }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="jumlahOrder">Jumlah Order</label>
                                <input readonly type="text" class="form-control" id="jumlahOrder" value="{{ $ppmj->jumlahOrder }}">
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-12 text-center">
                                <h3 class="mb-0">Detail isi PPMJ-{{ $ppmj->cekLogistik }}</h3>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    @foreach ( $add as $a)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="vendor">Vendor</label>
                                        <input readonly type="text" class="form-control" id="vendor" value="{{ $a->namaVendor }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sudah">Jumlah Material</label>
                                        <input readonly type="text" class="form-control" id="sudah" value="{{ $a->sudah }}">
                                    </div>
                                    @if($a->idPO === null)
                                        <div class="col-md-12 text-center">
                                            <a type="button" href="{{ url('logistik/staff/'.$a->vendor.'/'.$a->idPPC.'/po') }}" class="btn btn-info btn-round">{{ __('BUAT PO') }}</a>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <a type="button" href="{{ url('logistik/staff/'.$a->vendor.'/'.$a->idPPC.'/po') }}" class="btn btn-info btn-round">{{ __('BUAT PO') }}</a>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <a type="button" href="{{ url('logistik/staff/'.$a->vendor.'/detailed/'.$a->idPPC.'/po') }}" class="btn btn-warning btn-round">{{ __('LIHAT DAFTAR PO') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
