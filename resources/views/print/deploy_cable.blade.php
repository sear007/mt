<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ទិន្នន័យខ្សែកាប</title>
    <style>
    body {
        -webkit-print-color-adjust: exact !important;
        font-size: 14px;
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }
    .page{
        max-width: 1200px;
        margin: 0 auto;
    }
    .deploy_cable{
        border-collapse: collapse;
        border: 1px solid #353535;
        width: 100%;
    }
  .deploy_cable thead th,.deploy_cable tbody td{
    border: 1px solid #353535;
  }
  .deploy_cable td, .deploy_cable th,.deploy_cable thead th{
    border: 1px solid #353535;
    text-align: center;
  }
  .deploy_cable th{
    text-align: center;
    vertical-align: middle!important;
    background: #fff0b9;
    color: #1972bf;
  }
  .deploy_cable td{
    background: #f3e9c7;
  }
  .deploy_cable th span{
    display: block;
  }
  @page{
        size: A4 landscape;
      }
      @media print {
        .page 
        {
        page-break-after:always;
        }
      }
    </style>
</head>
<body>
    <div class="">
        <table class="deploy_cable" >
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Name POP</th>
                    <th>Plan Code</th>
                    <th>Request<span class="text-muted">(Day)</span></th>
                    <th>Return<span class="text-muted">(Day)</span></th>
                    <th>Send File OPN<span class="text-muted">(Day)</span></th>
                    <th>Take Invoice<span class="text-muted">(Day)</span></th>
                    <th>Pay Money<span class="text-muted">(Day)</span></th>
                </tr>
            </thead>
            <tbody>
                @if (count($posts)>0)
                  @foreach ($posts as $key => $item)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $item->name_pop }}</td>
                          <td>{{ $item->plan_code }}</td>
                          <td>{{ $item->request_day ? normal_date($item->request_day):'' }}</td>
                          <td>{{ $item->return_day ? normal_date($item->return_day):'' }}</td>
                          <td>{{ $item->send_file_opn ? normal_date($item->send_file_opn):'' }}</td>
                          <td>{{ $item->take_invoice ? normal_date($item->take_invoice):'' }}</td>
                          <td>{{ $item->pay_money ? normal_date($item->pay_money):'' }}</td>
                      </tr>
                  @endforeach
                @else
                <tr>
                  <td colspan="9">
                      <h3 style="padding: 0 40px; font-size:1.5rem">ទិន្នន័យគ្មាន</h3>
                      </td>
                  </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script type="text/javascript"> 
        window.addEventListener("load", window.print());
        window.onfocus = function () { setTimeout(function () { window.close(); }, 10); }
    </script>
</body>
</html>