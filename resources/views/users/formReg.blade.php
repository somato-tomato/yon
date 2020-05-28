@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user'
])

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('user.simpan') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Tambah Pengguna') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-md-3 col-form-label">{{ __('Nama') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nama" required>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="email" class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="contoh@mail.com" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="bagian" class="col-md-3 col-form-label">{{ __('Bagian') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select class="form-control" name="role" id="bagian">
                                            <option value="logMan">Logistik Manajer</option>
                                            <option value="logSup">Logistik Supervisor</option>
                                            <option value="logStaff">Logistik Staff</option>
                                            <option value="gudSup">Gudang Supervisor</option>
                                            <option value="gudStaff">Gudang Staff</option>
                                            <option value="ppcMan">PPC Manager</option>
                                            <option value="ppc">PPC</option>
                                            <option value="mutu">Mutu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Kata Sandi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Kata Sandi" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Tambah Akun') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
