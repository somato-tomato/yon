@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'ppc-dex'
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
                    @elseif ( session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
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
                                        <label for="namaMaterial">Nama Material</label>
                                        <input readonly type="text" class="form-control" id="namaMaterial" value="{{ $a->namaMaterial }}">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="jumlahMaterial">Jumlah Material</label>
                                            <input readonly type="text" class="form-control" id="jumlahMaterial" value="{{ $a->jumlahMaterial }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="satuan">Satuan</label>
                                            <input readonly type="text" class="form-control" id="satuan" value="{{ $a->satuan }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor">Vendor</label>
                                        <input readonly type="text" class="form-control" id="vendor" value="{{ $a->namaVendor }}">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{ $a->id }}" data-jumlah="{{ $a->sisaJumlahMaterial }}" data-vendor="{{ $a->vendor }}">Input Material</button>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <a type="button" href="{{ route('gudstaff.dataPpmjAdd', $a->id) }}" class="btn btn-dark">Detailed Material</a>
                                        </div>
                                    </div>
                                    {{-- MODALMODALMODALMODALMODAL --}}
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Input Material</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{ route('gudstaff.isiPpmjAdd') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div hidden class="form-group">
                                                            <label for="idPPCIsi" class="col-form-label">IDPPCIS</label>
                                                            <input readonly type="text" class="form-control idppcis" id="idPPCIsi" name="idPPCIsi">
                                                        </div>
                                                        <div hidden class="form-group">
                                                            <label for="idVendor" class="col-form-label">idVendor</label>
                                                            <input readonly type="text" class="form-control idvendor" id="idVendor" name="idVendor">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="sisaJumlahMaterial" class="col-form-label">Sisa Jumlah Material</label>
                                                            <input readonly type="text" class="form-control jumlah" id="sisaJumlahMaterial" name="sisaJumlahMaterial">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputMaterial" class="col-form-label">Input Material</label>
                                                            <input type="number" class="form-control" id="inputMaterial" name="inputMaterial">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="keterangan" class="col-form-label">Keterangan</label>
                                                            <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Tambah Vendor</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var idppcisi = button.data('whatever')
            var vendor = button.data('jumlah')
            var idvendor = button.data('vendor')
            // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body input.idppcis').val(idppcisi)
            modal.find('.modal-body input.jumlah').val(vendor)
            modal.find('.modal-body input.idvendor').val(idvendor)
        })
    </script>
@endsection
