@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'hbrej'
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
                                <h3 class="mb-0">Not Approved</h3>
                                <br/>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-flush" id="hbrej-table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Tanggal PPMJ</th>
                                <th scope="col" class="text-center">Nomor PPMJ</th>
                                <th scope="col" class="text-center">Nomor PO</th>
                                <th scope="col" class="text-center">Pemesan</th>
                                <th scope="col" class="text-center">Nama Order</th>
                                <th scope="col" class="text-center">Rejected at</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
{{--                            @forelse( $hbrej as $d)--}}
{{--                                <tr>--}}
{{--                                    <td class="text-center">{{ $d->nomorPPMJ }}</td>--}}
{{--                                    <td class="text-center">{{ $d->nomorPO }}</td>--}}
{{--                                    <td class="text-center">{{ $d->pemesan }}</td>--}}
{{--                                    <td class="text-center">{{ $d->namaOrder }}</td>--}}
{{--                                    <td class="text-center">{{ $d->notApproved }}</td>--}}
{{--                                </tr>--}}
{{--                            @empty--}}
{{--                                <tr>--}}
{{--                                    <td class="text-center" colspan="6">{{ 'Belum ada Pengajuan yang di Tolak' }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforelse--}}
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
            $('#hbrej-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('nyapp.dataHbrej') }}',
                columns: [
                    { data: 'tanggalPPMJ', name: 'tanggalPPMJ' },
                    { data: 'nomorPPMJ', name: 'nomorPPMJ' },
                    { data: 'nomorPO', name: 'nomorPO' },
                    { data: 'pemesan', name: 'pemesan' },
                    { data: 'namaOrder', name: 'namaOrder' },
                    {
                        data: 'notApproved', name: 'notApproved'
                    }
                ]
            });
        });
    </script>
@endsection
