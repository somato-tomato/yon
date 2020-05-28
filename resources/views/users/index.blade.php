@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Pengguna</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('user/add') }}" class="btn btn-sm btn-primary">Tambah Pengguna</a>
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
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Bagian</th>
                                <th scope="col">Tanggal Buat</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $pengguna as $p)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>
                                        <a href="mailto:admin@paper.com">{{ $p->email }}</a>
                                    </td>
                                    <td>
                                        @if($p->role === 'ppmj')
                                            {{ 'PPMJ' }}
                                        @elseif($p->role === 'dirku')
                                            {{ 'Direktur Keuangan' }}
                                        @elseif($p->role === 'mutu')
                                            {{ 'Mutu' }}
                                        @elseif($p->role === 'gudang')
                                            {{ 'Gudang' }}
                                        @elseif($p->role === 'keuangan')
                                            {{ 'Keuangan' }}
                                        @elseif($p->role === 'logistik')
                                            {{ 'Logistik' }}
                                        @else
                                            {{ $p->role }}
                                        @endif
                                    </td>
                                    <td>{{ $p->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
