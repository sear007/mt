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
  }
  .deploy_cable td{
    text-align: left;
  }
  .deploy_cable th span{
    display: block;
    font-size: 9pt;
    font-weight: normal;
    margin-bottom: 5px
  }
  .bottom{
    display: flex;
    padding-top: 10px;
  }
  .bottom .left{
    width: 60%;
  }
  .bottom .right{
    text-align: center;
    margin-left: 45px;
  }
  @page{
        size: A4;
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
        <div style="text-align: center; text-decoration:underline ">បញ្ជីឈ្មោះបើកប្រាក់បៀវត្សសំរាប់បុគ្គលិកប្រចាំខែ ៈ {{Carbon\Carbon::now()->translatedFormat('F Y')}}</div>
        <table class="deploy_cable" >
            <thead>
              <tr>
                  <th style="width: 4%;text-align:center" class="text-center">ល.រ<span>No.</span></th>
                  <th style="width: 22%;text-align:center">ឈ្មោះ<span>Name Of Employee</span></th>
                  <th style="width: 22%;text-align:center">មុខងារ<span>Position</span></th>
                  <th style="width: 22%;text-align:center">ហត្ថលេខា<span>Signature</span></th>
                  <th style="width: 22%;text-align:center">ថ្ងៃត្រូវបើក<span>Date to Open</span></th>
              </tr>
            </thead>
            <tbody>
                @if (count($posts)>0)
                  @foreach ($posts as $key => $item)
                      <tr>
                        <td style="text-align: center">{{$key+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->position}}</td>
                        <td></td>
                        <td></td>
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
        <div class="bottom">
          <div class="left"><br>ពិនិត្យ និង សំរេចដោយ
            <br>
            <br>
            <br>
            <br>
            <h4 style="margin-bottom: 0">លោកស្រី ហុី ធាវីន</h4>
          </div>
          <div class="right">ធ្វើនៅរាជធានី ភ្នំពេញ ថ្ងៃទី {{Carbon\Carbon::now()->translatedFormat('j F Y')}}<br>រៀបរៀងដោយ
          <br>
          <br>
          <br>
          <h4 style="margin-bottom: 0">លោកស្រី ហុី ធាវីន</h4>
          </div>
        </div>
        <hr>
        <span style="font-size: 8.5pt">Add: #48, St.125,Sangkat Vea Vong,Khan 7Makara, Phnom Penh, Cambodia. Tel:(+855) 23 21 32 53 / Fax:(+855) 23 21 30 64</span>
        <div style="text-align: center">Email: mrvprovider@gmail.com</div>
    </div>

    <script type="text/javascript"> 
        window.addEventListener("load", window.print());
        window.onfocus = function () { setTimeout(function () { window.close(); }, 10); }
    </script>
</body>
</html>