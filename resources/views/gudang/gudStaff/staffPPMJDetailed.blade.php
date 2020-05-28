@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'ppc-dex'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Detail Isi PPMJ-{{ $ppmj->nomorPPMJ }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a type="button" class="btn btn-primary btn-sm" href="{{ route('gudstaff.isiPpmjShow', $ppmj->id)}}">Kembali</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="namaMaterial">Nama Material</label>
                            <input readonly type="text" class="form-control" id="namaMaterial" value="{{ $isippmj->namaMaterial }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="jumlahMaterial">Jumlah Material</label>
                                <input readonly type="text" class="form-control" id="jumlahMaterial" value="{{ $isippmj->jumlahMaterial }} {{ $isippmj->satuan }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="sisaJumlahMaterial">Sisa Jumlah Material</label>
                                <input readonly type="text" class="form-control" id="sisaJumlahMaterial" value="{{ $isippmj->sisaJumlahMaterial }} {{ $isippmj->satuan }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="satuanHarga">Satuan Harga</label>
                                <input readonly type="text" class="form-control" id="satuanHarga" value="{{ $isippmj->satuanHarga }} {{ $isippmj->satuan }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jumlahHarga">Jumlah Harga</label>
                                <input readonly type="text" class="form-control" id="jumlahHarga" value="{{ $isippmj->jumlahHarga }} {{ $isippmj->satuan }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea readonly type="text" class="form-control" id="keterangan">{{ $isippmj->keterangan }}</textarea>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-flush">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center">Vendor</th>
                                    <th scope="col" class="text-center">Jumlah Material Masuk</th>
                                    <th scope="col" class="text-center">Petugas</th>
                                    <th scope="col" class="text-center">Tanggal Material Masuk</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach ( $detailed as $d)
                                    <tr>
                                        <td>{{ $d->namaVendor }}</td>
                                        <td>{{ $d->inputMaterial }}</td>
                                        <td>{{ $d->namaUser }}</td>
                                        <td>{{ $d->inputTanggal }}</td>
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
