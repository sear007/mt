@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" id="card-run-cable">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

@section('styles')
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datetimepicker.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css/sweetalert2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css/animate.min.css') }}" />
@endsection

@section('scripts')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('dist/js/sweetalert2.all.min.js') }}"></script>
@endsection
@endsection