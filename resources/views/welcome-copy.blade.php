@extends('layouts.app')
@section('content')
  <style>
      .attendence_table thead th{
        text-align: center;
        vertical-align: middle;
      }
      th#today{
        background: #c4d8c7;
      }
      th.sunday .day_number, th.sunday .day_khmer, th.sunday .day_english {
          color: red
      }
      .day_number, .day_khmer, .day_english{
        display: block;
      }
      .day_english{
        font-size: 9pt;
      }
      .day_number{
        font-size: 13pt;
        font-weight: bold;
        color: #306af1;
      }
      #today .day_number{
        color: #000000;
      }
      th.sunday{
        background: #ece2e2!important;
      }
      .sunday .day_number{
        color: red!important;
      }
  </style>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="current_date">
          <h3></h3>
          <p></p>
      </div>
      <div class="btn-group btn-block btn-flat">
          <button id="btn-prev-week" class="btn btn-default btn-lg btn-flat"><i class="fas fa-chevron-left mr-2 fa-lg"></i> សប្តាហ៍មុន</button>
          <button id="btn-next-week" class="btn btn-default btn-lg btn-flat">សប្តាហ៍បន្ទាប់ <i class="ml-2 fas fa-chevron-right fa-lg"></i></button>
      </div>
      <table id="attendence_table" class="table table-sm attendence_table table-bordered ">
          <thead>
            <tr>
              <td>អវត្តមានបុគ្គលិក </td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>ឈ្មោះ</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
      </table>
      <form id="filter_date">
          <input style="visibility: hidden"  type="number" min="1" max="29" id="currentWeek">
          <input  style="visibility: hidden"  type="number"  id="reduce" min="0" max="29">
      </form>

      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
      </div>
    </section>
  </div>

@section('scripts')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('/dist/js/moment-holidays.js') }}"></script>
<script src="{{ asset('/dist/js/attendence.js') }}"></script>
@endsection

@endsection