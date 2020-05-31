@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'uudp'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('logUudp.UudpSave') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Pembuatan UUDP') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="noUUDP">Nomor UUDP</label>
                                    <input type="text" class="form-control" name="noUUDP" placeholder="Nomor UUDP" id="noUUDP">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tglUUDP">Tanggal UUDP</label>
                                    <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="Tanggal UUDP" name="tglUUDP">
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="kepada">Kepada</label>
                                    <input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="jenisBeli">Jenis Beli</label>
                                    <select class="form-control" id="jenisBeli" name="jenisBeli">
                                        <option value="Bertahap">Bertahap</option>
                                        <option value="Lunas">Lunas</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="title">{{ __('Pilih PPMJ') }}</h5>
                                </div>
                                <div class="card-body">
                                    <div id="dynamicTable">
                                        <div class="form-group">
                                            <select
                                                name="categories[]"
                                                multiple
                                                id="categories"
                                                class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="button" name="add" id="add" class="btn btn-success text-center btn-sm">{{ __('Tambah PPM / J') }}</button>
                                            <button type="submit" class="btn btn-info btn-round">{{ __('Ajukan !') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('paper/js/core/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('css/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $('#categories').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '{{ route('logUudp.getPPMJ') }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.nomorPPMJ,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
