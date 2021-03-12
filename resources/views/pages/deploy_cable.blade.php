@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="card" id="card-deploy-cable">
                   <div class="card-header">
                       <h3 class="card-title"></h3>
                       <div class="card-tools">
                        <button id="print-data" data-html="true" data-toggle="tooltip" title="<h3>ព្រីនឯកសារ</h3>"  class="btn btn-default btn-lg"><i class="fas fa-print"></i></button>
                        <button id="print-data" data-html="true" data-toggle="tooltip" title="<h3>បញ្ចូលទិន្នន័យ</h3>" class="btn btn-default btn-lg"><i class="fas fa-plus"></i></button>
                       </div>

                       <div class="card-tools mr-3">
                        <select class="custom-select custom-select-lg" name="show">
                            <option selected value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="100">500</option>
                        </select>
                       </div>
                   </div>
                   <div class="card-body">
                       <table class="table table-bordered table-sm deploy_cable" id="deploy_cable">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Name POP</th>
                                   <th>Plan Code</th>
                                   <th>Request<span>(Day)</span></th>
                                   <th>Return<span>(Day)</span></th>
                                   <th>Send File OPN<span>(Day)</span></th>
                                   <th>Take Invoice<span>(Day)</span></th>
                                   <th>Pay Money<span>(Day)</span></th>
                               </tr>
                           </thead>
                           <tbody>
                               
                           </tbody>
                       </table>
                       <div class="my-5" id="pagination"></div>
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
@endsection
@section('scripts')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('dist/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('dist/js/deploy_cable.js') }}"></script>
@endsection
@endsection