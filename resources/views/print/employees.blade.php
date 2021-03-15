<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ទិន្នន័យខ្សែកាប</title>
    <style>
    /* khmer */
    @font-face {
      font-family: 'Moul';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url("{{ asset('dist/fonts/nuF2D__FSo_3I-hSibKx60w.woff2') }}") format('woff2');
      unicode-range: U+1780-17FF, U+200C, U+25CC, U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
    .moul{
      font-family: 'Moul', cursive;
    }
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
        <div style="margin-bottom:20px;">
        <img width="280px" src="data:image/png;base64,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" alt="mt">
        </div>
        <div class="moul" style="text-align: center; text-decoration:underline;margin-bottom:20px;">បញ្ជីឈ្មោះបើកប្រាក់បៀវត្សសំរាប់បុគ្គលិកប្រចាំខែ ៖ {{Carbon\Carbon::now()->translatedFormat('F Y')}}</div>
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
            <h4 style="margin-bottom: 0">លោក ម៉ម ធក</h4>
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