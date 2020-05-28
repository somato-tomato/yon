@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'vendor'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Data Vendor</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a type="button" class="btn btn-primary btn-sm" href="{{ route('logstaff.vendorDex') }}">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namaVendor">Nama Vendor</label>
                            <input readonly type="text" class="form-control" id="namaVendor" name="namaVendor" value="{{ $data->namaVendor }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="alamatVendor">Alamat 1</label>
                                <input readonly type="text" class="form-control" id="alamatVendor" name="alamatVendor" value="{{ $data->alamatVendor }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="alamatVendor2">Alamat 2</label>
                                <input readonly type="text" class="form-control" id="alamatVendor2" name="alamatVendor2" value="{{ $data->alamatVendor2 }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telepon">Telepon</label>
                                <input readonly type="text" class="form-control" id="telepon" name="telepon" value="{{ $data->telepon }}">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="jangkaWaktuKontrak">Jangka Waktu Kontrak</label>
                                <div id="input-daterange" class="input-group input-daterange">
                                    <input readonly id="jangkaWaktuKontrak" class="form-control" name="awalKontrak" value="{{ $data->awalKontrak }}">
                                    <span class="input-group-text">sampai</span>
                                    <input readonly id="jangkaWaktuKontrak" class="form-control" name="akhirKontrak" value="{{ $data->akhirKontrak }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="idUser">Ditambahkan Oleh</label>
                                <input readonly type="text" class="form-control" id="idUser" name="idUser" value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="created_at">Ditambahkan pada Tanggal</label>
                                <input readonly type="text" class="form-control" id="created_at" name="created_at" value="{{ $data->created_at }}">
                            </div>
                        </div>
                    </div>
{{--                    <div class="card-footer text-center">--}}
{{--                        <button type="submit" class="btn btn-success btn-md">Tambah Vendor</button>--}}
{{--                    </div>--}}
                </div>
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
