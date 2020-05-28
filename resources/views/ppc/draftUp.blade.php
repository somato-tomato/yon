@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'ppc-dex-draft'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <form method="post" action="#" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Draft PPMJ</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a type="button" class="btn btn-warning btn-sm" href="{{ route('ppc.index') }}">Kembali</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nomorPPMJ">Nomor PPMJ</label>
                                        <input type="text" class="form-control" name="nomorPPMJ" id="nomorPPMJ" value="{{ $data->nomorPPMJ }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tanggalPPMJ">Tanggal PPMJ</label>
                                        <input type="text" class="form-control" name="tanggalPPMJ" id="tanggalPPMJ" value="{{ $data->tanggalPPMJ }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="dasarPP">Dasar PP</label>
                                        <input type="text" class="form-control" name="dasarPP" id="dasarPP" value="{{ $data->dasarPP }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tanggalPP">Tanggal PP</label>
                                        <input type="text" class="form-control" name="tanggalPP" id="tanggalPP" value="{{ $data->tanggalPP }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tanggalPO">Tanggal PO</label>
                                        <input type="text" class="form-control" name="tanggalPO" id="tanggalPO" value="{{ $data->tanggalPO  }}">
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="tujuanSurat">Kepada</label>
                                    <input type="text" class="form-control" id="tujuanSurat" name="tujuanSurat" value="{{ $data->tujuanSurat }}">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="pemesan">Pemesanan</label>
                                        <input readonly type="text" class="form-control" name="pemesan" id="pemesan" value="{{ $data->pemesan }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nomorPO">Nomor PO</label>
                                        <input type="text" class="form-control" name="nomorPO" id="nomorPO" value="{{ $data->nomorPO }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="namaOrder">Nama Order</label>
                                        <input type="text" class="form-control" name="namaOrder" id="namaOrder" value="{{ $data->namaOrder }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jumlahOrder">Jumlah Order</label>
                                        <input type="text" class="form-control" name="jumlahOrder" id="jumlahOrder" value="{{ $data->jumlahOrder }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nama Material</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col" class="text-center">Jumlah</th>
                                            <th scope="col" class="text-center">Satuan Harga</th>
                                            <th scope="col" class="text-center">Jumlah Harga</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse( $add as $a)
                                            <tr>
                                                <td>{{ $a->namaMaterial }}</td>
                                                <td>{{ $a->satuan }}</td>
                                                <td class="text-center">{{ $a->jumlahMaterial }}</td>
                                                <td class="text-center">{{ $a->satuanHarga }}</td>
                                                <td class="text-center">{{ $a->jumlahHarga }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">{{ 'Belum ada Material' }}</td>
                                            </tr>
                                        @endforelse
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><strong>JUMLAH HARGA</strong></td>
                                            <td class="text-center">Rp.3000000</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
