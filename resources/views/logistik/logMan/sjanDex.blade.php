@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'sjan-dex'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="col-12">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">SJAN Pengajuan</h3>
                            </div>
                            <br/>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-flush" style="width: 100%" id="sjan-table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Tanggal PPMJ</th>
                                <th scope="col" class="text-center">Nomor PPMJ</th>
                                <th scope="col" class="text-center">Nomor PO</th>
                                <th scope="col" class="text-center">Pemesan</th>
                                <th scope="col" class="text-center">Nama Order</th>
                                <th scope="col" class="text-center">Vendor Sudah Isi</th>
                                <th scope="col" class="text-center">Vendor Belum Isi</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#sjan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('logman.sjanData') }}',
                columns: [
                    { data: 'tanggalPPMJ', name: 'tanggalPPMJ' },
                    { data: 'nomorPPMJ', name: 'nomorPPMJ' },
                    { data: 'nomorPO', name: 'nomorPO' },
                    { data: 'pemesan', name: 'pemesan' },
                    { data: 'namaOrder', name: 'namaOrder' },
                    { data: 'sudah', name: 'sudah' },
                    { data: 'belum', name: 'belum' },
                    { data: 'lihat', name: 'lihat' }
                ]
            });
        });
    </script>
@endsection
