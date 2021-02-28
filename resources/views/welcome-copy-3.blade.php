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
    <section class="content">
      <div class="container-fluid">
        <div class="table-responsive">
          <table id="attendence_table" class="table table-hover table-sm attendence_table table-bordered ">
              <thead>
                <tr>
                  <th>អវត្តមានបុគ្គលិក </th>
                  @for ($i = 1; $i <= $lastday; $i++)
                    <th>{{ $i }}</th>
                  @endfor
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $item)
                    <tr>
                      <td>{{ $item->name }}</td>
                      @for ($i = 01; $i <= $lastday; $i++)
                      <td class="p-3">
                        <form>
                          <input type="checkbox" data-id="{{ $item->id }}" value="2021-02-{{ $i }}" name="form_{{ $item->id }}" class="check form-control form-control-sm" />
                        </form>
                      </td>
                      @endfor
                    </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

@section('scripts')

<script>
$(".check").change(function() {
    if(this.checked) {
        console.log($(this).attr('data-id'));
    }else{
      console.log('uncheck');
    }
});
</script>
@endsection

@endsection