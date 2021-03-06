<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ទិន្នន័យវត្តមានបុគ្គលិកប្រចាំខែ {{ $request->end }}</title>
</head>
<style>
            .page {
width: 21cm;
min-height: 29.7cm;
padding: 40px;
margin: 1cm auto;
border: 1px #D3D3D3 solid;
border-radius: 5px;
background: white;
box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
    body {
        -webkit-print-color-adjust: exact !important;
        font-size: 12px;
        font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";

        }
        @media print {
        body, page[size="A4"] {
            margin: 5mm;
            box-shadow: 0;
        }
        }
        table, td, th {
        border: 1px solid black;
        text-align: center;
        padding: 3px;
        font-weight: 300;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        }
        .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.02);
        }

        tfoot tr{
            background: #09146d;
            font-weight: 900;
            color: #fff;
            font-size: 12px;
        }
        @print { 
            @page :footer { 
                display: none
            } 
        
            @page :header { 
                display: none
            } 
        }
        *{ color-adjust: exact;  -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        /* style sheet for "A4" printing */
        @media print and (width: 21cm) and (height: 29.7cm) {
            @page {
                margin: 3cm;
            }
        }
        @media print{@page {
            size: landscape;
        }}
</style>
<body>
    <div class="">
        <table class="table-striped " border="1" style="width:100%" >
            <thead>
                <tr>
                    <th>ឈ្មោះបុគ្គលិក</th>
                    @for ($i = 1; $i <= $request->lastday; $i++)
                        <th style="width:15px">{{ $i }}</th>
                    @endfor
                    <th>វត្តមាន</th>
                    <th>ច្បាប់</th>
                    <th>អវត្តមាន</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $key => $employee)
                    <tr>
                        <td >{{ $employee->name }}</td>
                        @for ($i = 1; $i <= $request->lastday; $i++)
                            <td id="{{ $request->year }}-{{ $request->month }}-{{ sprintf('%02d',$i) }}"></td>
                        @endfor
                        <td id="">hi</td>
                        <td>hi</td>
                        <td>hi</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($attendances as $attendance)
    <script> document.getElementById("{{ $attendance->date }}").innerHTML = '✓'; </script>
    @endforeach
    <script type="text/javascript"> 
        window.addEventListener("load", window.print());
        window.onfocus = function () { setTimeout(function () { window.close(); }, 10); }
    </script>
</body>
</html>