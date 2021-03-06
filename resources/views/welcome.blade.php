@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            {{-- Attendance Card --}}
            <div class="card" id="attendance_card">
              <div class="card-header">
                <h3 class="card-title">អវត្តមានបុគ្គលិក</h3>
                <div class="card-tools">
                  <button id="prev-month" class="btn btn-sm btn-default"></button>
                  <button id="next-month" class="btn btn-sm btn-default"></button>
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button> --}}
                    <button id="print" type="submit" class="btn btn-lg"><i class="fas fa-print"></i></button>
                </div>
              </div>
              <div class="card-body">
                <form id="form-print" method="POST" target="_blank" action="{{ route('print_attendance') }}">
                  @csrf
                  <input type="hidden" name="start" id="data-print-start">
                  <input type="hidden" name="end" id="data-print-end">
                  <input type="hidden" name="lastday" id="data-print-lastday">
                  <input type="hidden" name="month" id="data-print-month">
                  <input type="hidden" name="year" id="data-print-year">
                </form>
                <div class="table-responsive">
                  <div class="tableFixHead">
                    <table id="attendence_table" class="table table-hover table-sm attendence_table table-bordered">
                        <thead>
                          <tr>
                            
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                  </div>
                </div>
                
                
              </div>
            </div><!-- Attandance -->
          </div>

          <div class="col-md-4">
            <!--request_leave_card -->
            <div class="card" id="request_leave_card">
              <div class="card-body">
                <form class="form-row" id="request-leave-employee-form">
                  @csrf
                  <select class="form-control form-control-lg mb-2 col-md-12" name="request_leave_employee" id="request-leave-employee"><option>ជ្រើសឈ្មោះបុគ្គលិក</option></select>
                  <div class="has-validation mb-2 col-md-12">
                    <input id="request-leave-reason" type="text" placeholder="ហេតុផលដាក់ច្បាប់" name="request_leave_reason" class="form-control form-control-lg">
                  </div>
                  <div class="has-validation mb-2 col-md-12">
                    <input name="request_leave_date" placeholder="ជ្រើសរើសថ្ងៃ" type="text" class="form-control form-control-lg datetimepicker-input" id="request_leave_date" data-toggle="datetimepicker" data-target="#request_leave_date"/>
                  </div>
                  <div class="col-md-12">
                    <button id="request-leave-btn" class="btn btn-default btn-lg btn-block" disabled>បញ្ជូនទិន្នន័យ</button>
                  </div>
                </form>
              </div>
            </div>
            <!--request_leave_card -->
          </div>
          <div class="col-md-4" id="card-request-leave">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body">
                <ul class="list-group">

                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-4" id="card-holiday">
            <div class="card" >
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <div class="card-body">
                <ul class="list-group">

                </ul>
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
<script src="{{ asset('dist/js/moment-holidays.js') }}"></script>
<script src="{{ asset('dist/js/attendence.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
  $("#print").click(function(){
    $("#form-print").submit();
  })
</script>

@endsection
@endsection