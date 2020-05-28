@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'vendor'
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
                                <h3 class="mb-0">Vendor</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a type="button" class="btn btn-primary btn-sm" href="{{ route('logstaff.vendorCre') }}">Buat</a>
                            </div>
                            <br/>
                        </div>
                    </div>

                    <br/>

                    <div class="table-responsive">
                        <table class="table table-hover table-flush" style="width: 100%" id="vendor-table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Nama Vendor</th>
                                <th scope="col" class="text-center">Telepon</th>
                                <th scope="col" class="text-center">Awal Kontrak</th>
                                <th scope="col" class="text-center">Akhir Kontrak</th>
                                <th scope="col" class="text-center">Status</th>
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
            $('#vendor-table').DataTable({
                "columnDefs": [
                    { "searchable": false, "targets": [4, 5] },  // Disable search on first and last columns
                    { "orderable": false, "targets": [4, 5] }
                ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('logstaff.vendorData') }}',
                columns: [
                    { data: 'namaVendor', name: 'namaVendor' },
                    { data: 'telepon', name: 'telepon' },
                    { data: 'awalKontrak', name: 'awalKontrak' },
                    { data: 'akhirKontrak', name: 'akhirKontrak' },
                    { data: 'status', name: 'status' },
                    { data: 'lihat', name: 'lihat' }
                ]
            });
        });
    </script>
@endsection
