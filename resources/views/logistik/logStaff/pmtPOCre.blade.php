@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'po'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if( $count->sisa == 0)
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="col-12 text-center">
                                <h3 class="mb-0">PO Material sudah di buat semua</h3>
                            </div>
                            <div class="col-12 text-center">
                                <a type="button" class="btn btn-danger btn-lg" href="#">Kembali</a>
                            </div>
                        </div>
                    </div>
                @else
                    <form method="post" action="{{ route('logstaff.pmtPOSave') }}" enctype="multipart/form-data">
                        @csrf
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
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="noPO">Nomor Purchase Order</label>
                                        <input type="text" class="form-control" id="noPO" name="noPO">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tglPO">Tanggal</label>
                                        <input type="text" class="form-control" id="tglPO" name="tglPO">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="tempatPenyerahan">Tempat Penyerahan</label>
                                    <input type="text" class="form-control" id="tempatPenyerahan" name="tempatPenyerahan">
                                </div>
                                <div class="form-group ">
                                    <label for="waktuPenyerahan">Waktu Penyerahan</label>
                                    <input type="text" class="form-control" id="waktuPenyerahan" name="waktuPenyerahan">
                                </div>
                                <div class="form-group">
                                    <label for="ketPembayaran">Pembayaran</label>
                                    <textarea type="text" class="form-control" id="ketPembayaran" name="ketPembayaran"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-flush">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th scope="col" class="text-center">Nama Material</th>
                                            <th scope="col" class="text-center">Satuan</th>
                                            <th scope="col" class="text-center">Qty</th>
                                            <th scope="col" class="text-center">Satuan Harga</th>
                                            <th scope="col" class="text-center">Jumlah Harga</th>
                                            <th>Masukan PO</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach ( $isi as $d)
                                            <tr>
                                                <td>{{ $d->id }}
                                                    <input hidden type="text" name="id[]" value="{{ $d->id }}">
                                                <td>{{ $d->namaMaterial }}
                                                    <input hidden type="text" name="namaMaterial[]" value="{{ $d->namaMaterial }}">
                                                <td>{{ $d->satuan }}</td>
                                                <td>{{ $d->jumlahMaterial }}</td>
                                                <td>{{ $d->satuanHarga }}</td>
                                                <td>{{ $d->jumlahHarga }}
                                                    {{--                                                <input hidden type="text" name="jumlahHarga[]" value="{{ $d->jumlahHarga }}">--}}
                                                </td>
                                                <td>
                                                    <select id="choose" name="choose[]" class="form-control">
                                                        <option value="no">TIDAK</option>
                                                        <option value="yes">YA</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="dasar">Dasar</label>
                                        <input type="text" class="form-control" id="dasar" name="dasar">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dasarTanggal">Tanggal</label>
                                        <input type="text" class="form-control" id="dasarTanggal" name="dasarTanggal">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success btn-md">BUAT PO</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
