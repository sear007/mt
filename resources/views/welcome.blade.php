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
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div>
              </div>
              <div class="card-body">
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
                <!--request_leave_card -->
                <div class="card" id="request_leave_card">
                  <div class="card-body">
                    <form class="form-row" id="request-leave-employee-form">
                      @csrf
                      <select class="form-control form-control-lg mb-2 col-md-3" name="request_leave_employee" id="request-leave-employee"><option>ជ្រើសឈ្មោះបុគ្គលិក</option></select>
                      <div class="has-validation mb-2 col-md-3">
                        <input id="request-leave-reason" type="text" placeholder="ហេតុផលដាក់ច្បាប់" name="request_leave_reason" class="form-control form-control-lg">
                      </div>
                      <div class="has-validation mb-2 col-md-3">
                        <input name="request_leave_date" placeholder="ជ្រើសរើសថ្ងៃ" type="text" class="form-control form-control-lg datetimepicker-input" id="request_leave_date" data-toggle="datetimepicker" data-target="#request_leave_date"/>
                      </div>
                      <div class="col-md-3">
                        <button id="request-leave-btn" class="btn btn-default btn-lg btn-block" disabled>បញ្ជូនទិន្នន័យ</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!--request_leave_card -->
              </div>
            </div><!-- Attandance -->
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
<script>document.querySelector(".tableFixHead").style.height = (screen.height/1.5)+"px"; </script>
@endsection
@endsection