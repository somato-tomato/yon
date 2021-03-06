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
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-12 text-right">
                            <a type="button" class="btn btn-info btn-sm" href="{{ route('logUudp.PpnShow', $uudp->uuid) }}">Ubah PPn</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nomor PPMJ</th>
                                    <th>Tgl PPMJ</th>
                                    <th>Kepada</th>
                                    <th>Pemesan</th>
                                    <th>NomorPO</th>
                                    <th>PPn</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $ppmj as $p )
                                    <tr>
                                        <td>{{ $p->nomorPPMJ }}</td>
                                        <td>{{ $p->tanggalPO }}</td>
                                        <td>{{ $p->tujuanSurat }}</td>
                                        <td>{{ $p->pemesan }}</td>
                                        <td>{{ $p->nomorPO }}</td>
                                        <td>
                                        @if( $p->ppn === null )
                                            NO
                                        @elseif( $p->ppn === 5 )
                                            5%
                                        @elseif( $p->ppn === 10 )
                                            10%
                                        @else
                                            15%
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a type="button" class="btn btn-md btn-primary" href="{{ route('logUudp.unduhUUDP', $uudp->uuid) }}">UNDUH UUDP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <script src="{{ asset('paper/js/core/jquery.min.js') }}"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>--}}
{{--    <script src="{{ asset('css/select2.full.min.js') }}"></script>--}}
@endsection
