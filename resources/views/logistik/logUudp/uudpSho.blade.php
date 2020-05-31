@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'uudp'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ __('Pembuatan UUDP') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="noUUDP">Nomor UUDP</label>
                                <input type="text" class="form-control" name="noUUDP" id="noUUDP" value="{{ $uudp->noUUDP }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tglUUDP">Tanggal UUDP</label>
                                <input id="tglUUDP" class="form-control" placeholder="Tanggal UUDP" name="tglUUDP" value="{{ $uudp->tglUUDP }}" readonly>
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="kepada">Kepada</label>
                                <input type="text" class="form-control" name="kepada" id="kepada" value="{{ $uudp->kepada }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jenisBeli">Jenis Beli</label>
                                <input type="text" class="form-control" name="jenisBeli" id="jenisBeli" value="{{ $uudp->jenisBeli }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="perihal">Perihal</label>
                                <input type="text" class="form-control" name="perihal" id="perihal" value="{{ $uudp->perihal }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-responsive table-striped">
                                <thead>
                                <tr>
                                    <th>Nomor PPMJ</th>
                                    <th>Tgl PPMJ</th>
                                    <th>Tgl PO</th>
                                    <th>Kepada</th>
                                    <th>Pemesan</th>
                                    <th>NomorPO</th>
                                    <th>Nama Order</th>
                                    <th>Jumlah Order</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $ppmj as $p )
                                    <tr>
                                        <td>{{ $p->nomorPPMJ }}</td>
                                        <td>{{ $p->tanggalPPMJ }}</td>
                                        <td>{{ $p->tanggalPO }}</td>
                                        <td>{{ $p->tujuanSurat }}</td>
                                        <td>{{ $p->pemesan }}</td>
                                        <td>{{ $p->nomorPO }}</td>
                                        <td>{{ $p->namaOrder }}</td>
                                        <td>{{ $p->jumlahOrder }}</td>
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
{{--    <script src="{{ asset('paper/js/core/jquery.min.js') }}"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>--}}
{{--    <script src="{{ asset('css/select2.full.min.js') }}"></script>--}}
@endsection
