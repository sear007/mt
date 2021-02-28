@extends('layouts.app')
@section('content')
  <div class="content-wrapper">

    
    <section class="content py-3">
      <div class="container-fluid">
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
              <table id="attendence_table" class="table table-hover table-sm attendence_table table-bordered ">
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
    </section>
  </div>
@section('styles')
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
@endsection
@section('scripts')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('/dist/js/moment-holidays.js') }}"></script>
<script src="{{ asset('/dist/js/attendence.js') }}"></script>
<script>
  console.log();
</script>
@endsection
@endsection