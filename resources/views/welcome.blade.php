@extends('layouts.app', [
    'class' => 'login-page',
    'elementActive' => ''
])

@section('content')
    <div class="full-page-background"  style="background-image: url({{ '/image/BANNER_1.jpg' }})"></div>
    <div class="content col-md-12 ml-auto mr-auto">
        <div class="header py-5 pb-7 pt-lg-9">
            <div class="container col-md-10">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12 pt-5">
                            <h1 class="@if(Auth::guest()) text-white @endif">{{ __('YON RISMAYA') }}</h1>

                            <p class="@if(Auth::guest()) text-white @endif text-lead mt-3 mb-0">
                                {{ __('YONYONYOYNOYNOYNOYNONYONYOYNOYNOYNOYNOYNOYNOYNOYNOYN') }}
                            </p>

{{--                            <a class="btn btn-lg" href="{{ route('test.test') }}">TEST</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
