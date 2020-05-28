@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'ppc-dex'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('ppc.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Pengajuan PPM / J') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nomorPPMJ">Nomor PPMJ</label>
                                    <input type="text" class="form-control" name="nomorPPMJ" placeholder="Nomor PPMJ" id="nomorPPMJ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggalPPMJ">Tanggal PPMJ</label>
                                    <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="Tanggal PPMJ" name="tanggalPPMJ">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="dasarPP">Dasar PP</label>
                                    <input type="text" class="form-control" name="dasarPP" id="dasarPP" placeholder="Dasar PP">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggalPP">Tanggal PP</label>
                                    <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="Tanggal PP" name="tanggalPP">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tanggalPO">Tanggal PO</label>
                                    <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="Tanggal PO" name="tanggalPO">
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="tujuanSurat">Kepada</label>
                                <input type="text" class="form-control" id="tujuanSurat" name="tujuanSurat" placeholder="Tujuan Surat">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="pemesan">Pemesan</label>
                                    <input type="text" class="form-control" name="pemesan" id="pemesan  " placeholder="Nama Pemesan">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nomorPO">Nomor PO</label>
                                    <input type="number" class="form-control" name="nomorPO" id="nomorPO" placeholder="Nomor PO">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="namaOrder">Nama Order</label>
                                    <input type="text" class="form-control" name="namaOrder" id="namaOrder" placeholder="Nama Order">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="jumlahOrder">Jumlah Order</label>
                                    <input type="number" class="form-control" name="jumlahOrder" id="jumlahOrder" placeholder="Jumlah Order">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Ajukan !') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('paper/js/core/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection
