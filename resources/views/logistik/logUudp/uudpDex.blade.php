@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'uudp'
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
                                <h3 class="mb-0">Buat UUDP</h3>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="btn btn-sm btn-info" href="{{ route('logUudp.UudpBuat') }}">Buat UUDP</a>
                            </div>
                            <br/>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-flush" style="width: 100%" id="pmt-table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Tanggal UUDP</th>
                                <th scope="col" class="text-center">Nomor UUDP</th>
                                <th scope="col" class="text-center">Jenis Pembelian</th>
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
            $('#pmt-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('logUudp.UudpData') }}',
                columns: [
                    { data: 'tglUUDP', name: 'tglUUDP' },
                    { data: 'noUUDP', name: 'noUUDP' },
                    { data: 'jenisBeli', name: 'jenisBeli' },
                    { data: 'lihat', name: 'lihat' }
                ]
            });
        });
    </script>
@endsection
