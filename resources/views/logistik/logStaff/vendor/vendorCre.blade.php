@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'vendor'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="post" action="{{ route('logstaff.vendorSave') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Tambah Vendor</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a type="button" class="btn btn-primary btn-sm" href="#">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="namaVendor">Nama Vendor</label>
                                <input type="text" class="form-control" id="namaVendor" name="namaVendor">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="alamatVendor">Alamat 1</label>
                                    <input type="text" class="form-control" id="alamatVendor" name="alamatVendor">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamatVendor2">Alamat 2</label>
                                    <input type="text" class="form-control" id="alamatVendor2" name="alamatVendor2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="jangkaWaktuKontrak">Jangka Waktu Kontrak</label>
                                    <div id="input-daterange" class="input-group input-daterange" data-provide="datepicker">
                                        <input id="jangkaWaktuKontrak" class="datepicker form-control" name="awalKontrak">
                                        <span class="input-group-text">sampai</span>
                                        <input id="jangkaWaktuKontrak" class="datepicker form-control" name="akhirKontrak">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success btn-md">Tambah Vendor</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('paper/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('css/dp.js') }}"></script>
{{--    <script>--}}
{{--        $('.input-daterange input').each(function() {--}}
{{--            $(this).datepicker('clearDates');--}}
{{--        });--}}
{{--    </script>--}}
@endsection
