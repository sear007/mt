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
        <div class="table-responsive">
          <table id="attendence_table" class="table table-hover table-sm attendence_table table-bordered ">
              <thead>
                <tr>
                  <td>អវត្តមានបុគ្គលិក </td>
                </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <input class="form-control form_123" type="checkbox" />
      </div>
    </section>
  </div>

@section('scripts')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('/dist/js/moment-holidays.js') }}"></script>
<script src="{{ asset('/dist/js/attendence.js') }}"></script>
<script>
getEmployees();
$(".form_1").change(function() {
    if(this.checked) {
        console.log(changed);
    }
});
function getEmployees(){
  $.get({
    url:"{{ route('json_employees') }}",
    success: function(data){
      console.log(data);
      let td = '';
        for(let $i = 1; $i<=data.lastday;$i++){
          td += `
          <td class="form">
            <form>
              <input class="form-control form_${data.employees}" type="checkbox" />
            </form>
          </td>
          `;
        }
      $.map(data.employees, function(v,i){
        $("tbody").append(`<tr><td>${v.name}</td>${td}</tr>`);
      })
    }
  })
}
</script>
@endsection

@endsection