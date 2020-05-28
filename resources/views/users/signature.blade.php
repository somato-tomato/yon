@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'signature'
])

<style>
    .kbw-signature { width: 100%; height: 200px;}
    #sig canvas{
        width: 100% !important;
        height: auto;
    }
</style>

@section('content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('pcc.plod') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Tanda Tangan') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <label class="" for="">Signature:</label>
                                <br/>
                                <div id="sig" ></div>
                                <br/>
                                <button id="clear" class="btn btn-danger btn-sm">Kosongkan Field</button>
                                <textarea id="signature64" name="signed" style="display: none"></textarea>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Tanda Tangan') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if($sig == true)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">{{ __('Tanda Tangan') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <label class="" for="">Signature:</label>
                                    <br/>
                                    <img src="{{ asset('/signature/'.$sig->path) }}" alt="asd">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <p>Belum ada Tanda Tangan</p>
        @endif
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
@endsection
