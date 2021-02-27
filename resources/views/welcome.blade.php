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
        font-weight: 10pt;
      }
      .day_khmer{
        font-size: 9pt;
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
    <section class="content">
      
      <div class="container-fluid">
        <div class="current_date">
          <h3></h3>
          <p></p>
      </div>
      <table id="attendence_table" class="table table-sm attendence_table table-bordered ">
          <thead>
            <tr>
              <td>អវត្តមានបុគ្គលិក </td>
            </tr>
          </thead>
          <tbody>
            <tr>
            </tr>
          </tbody>
      </table>
      </div>
    </section>
  </div>

@section('scripts')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('/dist/js/moment-holidays.js') }}"></script>
<script src="{{ asset('/dist/js/attendence.js') }}"></script>
<script>
    employees = [
        'A',
        'B',
        'C',
        'D',
        'E',
    ];
    $.map(employees, function(index,value){
      var name = employees[value];
      console.log(name);
      $("table tbody tr").append(name);
    })
</script>
@endsection

@endsection