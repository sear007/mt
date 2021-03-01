@extends('layouts.app')
@section('content')
  <div class="content-wrapper">

    <style>
      .att_box_td{
        width: 20px;
        vertical-align: middle!important;
      }
      .att_box{
        display: block;
        width: 20px;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        box-shadow: inset 0 0 0 transparent;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      }
      .attendence_table thead tr{
          background-color: #FFFFFF;
      }
      @media only screen  and (min-width : 1300px)  { .att_box{width: 40px;} .att_box_td{ width: 40px;}  }
    </style>
    <section class="content py-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
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
              </div>
            </div>
          </div>

          <div class="col-md-4 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h3 class="">
                  ដាក់ច្បាប់វត្តមាន
                </h3>
              </div>
              <div class="card-body">
                <form id="request-leave-employee-form">
                  @csrf
                  <select class="form-control form-control-lg mb-2" name="request_leave_employee" id="request-leave-employee"><option>ជ្រើសឈ្មោះបុគ្គលិក</option></select>
                  <div class="has-validation mb-2">
                    <input id="request-leave-reason" type="text" placeholder="ហេតុផល" name="request_leave_reason" class="form-control form-control-lg">
                  </div>
                  <div class="has-validation mb-2">
                    <input name="request_leave_date" placeholder="ជ្រើសរើសថ្ងៃ" type="text" class="form-control form-control-lg datetimepicker-input" id="request_leave_date" data-toggle="datetimepicker" data-target="#request_leave_date"/>
                  </div>
                  <button id="request-leave-btn" class="btn btn-lg btn-default">បញ្ជូនទិន្នន័យ</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@section('styles')
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datetimepicker.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}" />
@endsection
@section('scripts')

<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('dist/js/moment-holidays.js') }}"></script>
<script src="{{ asset('dist/js/attendence.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('dist/js/request_leave.js') }}"></script>
<script> document.querySelector(".tableFixHead").style.height = (screen.height/1.8)+"px"; </script>
@endsection
@endsection