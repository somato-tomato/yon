@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'uudp'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form enctype="multipart/form-data" action="{{ route('logUudp.PpnUp') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Perbaharui PPn</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a type="button" class="btn btn-primary btn-sm" href="{{ url('/logistik/uudp/'.$uudp->uuid.'/lihat') }}">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th hidden>ID</th>
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
                                            <td hidden>
                                                <input type="text" class="form-control" name="id[]" value="{{ $p->id }}" readonly>
                                            </td>
                                            <td>{{ $p->nomorPPMJ }}</td>
                                            <td>{{ $p->tanggalPO }}</td>
                                            <td>{{ $p->tujuanSurat }}</td>
                                            <td>{{ $p->pemesan }}</td>
                                            <td>{{ $p->nomorPO }}</td>
                                            <td>
                                                <select id="ppn" name="ppn[]" class="form-control">
                                                    <option value="null">Tidak</option>
                                                    <option value="5">5%</option>
                                                    <option value="10">10%</option>uu
                                                    <option value="15">15%</option>
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="text" class="form-control" name="uuid" value="{{ $uudp->uuid }}" readonly hidden>
                            <button type="submit" class="btn btn-primary btn-lg">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    <script src="{{ asset('paper/js/core/jquery.min.js') }}"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>--}}
    {{--    <script src="{{ asset('css/select2.full.min.js') }}"></script>--}}
@endsection
