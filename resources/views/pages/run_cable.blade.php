@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="py-2">១.២ របាយការណ៍ អូសកាប</h3>
                <div class="card" id="card-run-cable">
                    <div class="card-body">
                        <table class="table table-bordered table-sm table-run-cable" id="table-run-cable">
                            <thead>
                                <tr>
                                    <th rowspan="2">
                                        No
                                    </th>
                                    <th rowspan="2">
                                        P5000
                                        <span class="d-block">PPH.I.U.PP.011220.04</span>
                                     </th>
                                     <th rowspan="2">
                                        Vat tu
                                     </th>
                                     <th colspan="2">Request</th>
                                     <th colspan="2">Return</th>
                                     <th colspan="2">Run Cable</th>
                                     <th rowspan="2">Finish</th>
                                    </tr>
                                    <tr>
                                     <th>Time 1</th>
                                     <th>Time 2</th>
                                     <th>Time 1</th>
                                     <th>Time 2</th>
                                     <th>Time 1</th>
                                     <th>Time 2</th>
                                   </tr>    
                            </thead>  
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Cable ADSL 10x2 (10x2x0.5)</td>
                                    <td>20000356</td>
                                    <td>1330</td>
                                    <td></td>
                                    <td>80</td>
                                    <td></td>
                                    <td>1250</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>  
                        </table>
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