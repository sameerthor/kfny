<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider invoices</title>
</head>
<style>
 table {
    border-spacing: 0;
    border-collapse: collapse;
    table-layout: fixed;
}

</style>
<body>
    <main style="max-width: 1200px; width: 100%; margin: 0 auto; height: 100vh;">

        <!--invoices tile start-->
        <div style="margin-top: 30px;text-transform: uppercase; font-weight: 900; text-align: center;">

            <div>
                Kopelevich & fledsherov a.p.c brooklya,ny 11232

            </div>
            <div>
                882 Third AVENUE, 3rd floor,sutte ne1
            </div>
            <div>
                brooklya,ny 11232
            </div>
            <div>
                <span> TEL:</span> <span>(718) 332-0577</span>
            </div>

            <div>
                <span>FAX:</span> <span>(718) 332-1644</span>
            </div>
        </div>

        <!--invoices tile end-->

        <div style="margin-top: 40px;">

            <table style="padding:  20px  0; width: 100%;">
                <tr>
                    <td style="font-weight: 800; text-align: left;">
                        {{date('F d,Y')}}</td>
                    <td style="font-weight: 800; text-align: center;">
                        FILING INVOICE</td>
                    <td style="font-weight: 800; text-align: right;">
                        <p style="margin: 0;">Tax
                            ID #27-2201705</p>
                        <p style="margin: 0;">Invoice #{{$data['id']}}</p>
                    </td>
                </tr>
            </table>

            <table style="position: relative; width: 100%; border-spacing: 0; border: 2px solid #000;">
                <thead>
                    <tr style="border: 2px solid #000;  padding: 40px;">
                        <th style="padding: 4px; border: 1px solid #000;"></th>
                        <th style="padding: 4px; border: 1px solid #000;">File
                            No</th>
                        <th style="padding: 4px; border: 1px solid #000;">Assignor</th>
                        <th style="padding: 4px; border: 1px solid #000;">Provider</th>
                        <th style="padding: 4px; border: 1px solid #000;">Insurance Company</th>
                        <th style="padding: 4px; border: 1px solid #000;">S&C</th>
                        <th style="padding: 4px; border: 1px solid #000;">Filing Fee</th>
                        

                    </tr>
                </thead>
                <tbody>
                @foreach($data->invoice_intake as $k=>$res)
                    @php $c_total=(float)@$c_total+$res->tableDetails->sum('amount');
                    $f_total=(float)@$f_total+($res['is_ligitation']=='2'?40:($res['is_ligitation']=='3'?0:($res['is_ligitation']=='1'?$res['patient']['insuranceCompany']['filing_fees_date_specific']:0)));@endphp
                    <tr style="background-color: #bde0ff; padding: 40px;">
                        <td style="padding: 4px; border: 1px solid #000;">{{$k+1}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">{{$res['id']}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">{{@$res['patient']['first_name']}} {{@$res['patient']['last_name']}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">{{$res['provoiderInformation']['name']}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">{{$res['patient']['insuranceCompany']['name']}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">${{number_format($res->tableDetails->sum('amount'),2)}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">${{$res['is_ligitation']=='2'?"40":""}}{{$res['is_ligitation']=='3'?"0":""}}{{$res['is_ligitation']=='1'?$res['patient']['insuranceCompany']['filing_fees_date_specific']:""}}</td>
                    </tr>
            
                    @endforeach
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; padding: 10px; font-weight: 900;">
                            Total:</td>
                        <td style="padding: 10px; border: 1px solid #000; background-color: #bde0ff;">
                        ${{number_format($c_total,2)}}</td>
                        <td style="padding: 10px; border: 1px solid #000; background-color: #bde0ff;">
                        ${{number_format($f_total,2)}}</td>

                    </tr>

                </tbody>
            </table>
        </div>

        <div style="margin-top: 20%; padding: 20px;">Please make check
            payable to : Kopelevichh & Feldsherovvz P.C.</div>
    </main>
</body>

</html>