@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'ajuan'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Detail PPMJ</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomorPPMJ">Nomor PPMJ</label>
                                <input readonly type="text" class="form-control" id="nomorPPMJ" value="{{ $nyapp->nomorPPMJ }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggalPPMJ">Tanggal PPMJ</label>
                                <input readonly type="text" class="form-control" id="tanggalPPMJ" value="{{ $nyapp->tanggalPPMJ }}">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dasarPP">Dasar PP</label>
                                <input readonly type="text" class="form-control" id="dasarPP" value="{{ $nyapp->dasarPP }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggalPP">Tanggal PP</label>
                                <input readonly type="text" class="form-control" id="tanggalPP" value="{{ $nyapp->tanggalPP }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggalPO">Tanggal PO</label>
                                <input readonly type="text" class="form-control" id="tanggalPO" value="{{ $nyapp->tanggalPO  }}">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="tujuanSurat">Kepada</label>
                            <input readonly type="text" class="form-control" id="tujuanSurat" value="{{ $nyapp->tujuanSurat }}">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="pemesan">Pemesanan</label>
                                <input readonly type="text" class="form-control" id="pemesan" value="{{ $nyapp->pemesan }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nomorPO">Nomor PO</label>
                                <input readonly type="text" class="form-control" id="nomorPO" value="{{ $nyapp->nomorPO }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="namaOrder">Nama Order</label>
                                <input readonly type="text" class="form-control" id="namaOrder" value="{{ $nyapp->namaOrder }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="jumlahOrder">Jumlah Order</label>
                                <input readonly type="text" class="form-control" id="jumlahOrder" value="{{ $nyapp->jumlahOrder }}">
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card shadow">
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
                                    <td class="text-center">{{ $jumlah }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card shadow">
                    @if( $nyapp->cekManager === 0)
                        <div class="card-body">
                            <form action="{{ route('nyapp.update', $nyapp->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div hidden class="form-group">
                                    <label for="idPPC">idPPC</label>
                                    <input class="form-control" id="idPPC" name="idPPC" value="{{ $nyapp->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">KETERANGAN</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-md-6 text-center">
                                        <button class="btn btn-success btn-lg" name="save_action" value="Approve">Approve</button>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button class="btn btn-warning btn-lg" name="save_action" value="NotApprove">Not Approve</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @elseif( $nyapp->cekManager === 1)
                        <div class="card-body">
                            <div class="text-center">
                                <button class="btn btn-success btn-lg" name="save_action" value="Approve">Approve</button>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <button class="btn btn-warning btn-lg" name="save_action" value="NotApprove">Not Approve</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
