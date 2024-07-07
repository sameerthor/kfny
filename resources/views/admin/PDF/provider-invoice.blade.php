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
                        {{date('F d,Y')}}
                    </td>
                    <td style="font-weight: 800; text-align: center;">
                        PROVIDER INVOICE</td>
                    <td style="font-weight: 800; text-align: right;">
                        <p style="margin: 0;">Tax
                            ID #27-2201705</p>
                        <p style="margin: 0;">Invoice #{{$data['id']}}</p>
                    </td>
                </tr>
            </table>

            <table style="position: relative; width: 100%; border-spacing: 0; border: 2px solid #000;">
                <thead>
                    <tr style="border: 2px solid #000;  padding: 40px;background-color: #bde0ff;">
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">File #</th>
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">Assignor</th>
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">Provider</th>
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">Check#</th>
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">Principle Amount</th>
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">Interest Amount</th>
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">Legal Fees Due</th>
                        <th scope="col"  style="padding: 4px; border: 1px solid #000;">Filing Fees</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($data->invoice_settlement as $k=>$res)
                    @php
                    $p_total=(float)@$p_total+($res['new_total']==1?$res['new_principle']:$res['priciple_amount']);
                    $i_total=(float)@$i_total+$res['interest_amount'];
                    $f_total=(float)@$f_total+$res['filing_fees'];
                    @endphp
                    <tr style=" padding: 40px;">
                        <td style="padding: 4px; border: 1px solid #000;">{{$res['basic_intake']['id']}}</td>
                        <td style="padding: 4px; border: 1px solid #000;" >{{@$res['basic_intake']['patient']['first_name']}} {{@$res['basic_intake']['patient']['last_name']}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">{{@$res['basic_intake']['provoiderInformation']['name']}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">{{$res->checks->last()->check}}
                        <td style="padding: 4px; border: 1px solid #000;">${{$res['new_total']==1?number_format($res['new_principle'],2):number_format($res['priciple_amount'],2)}}</td>
                        <td style="padding: 4px; border: 1px solid #000;">${{number_format($res['interest_amount'],2)}}</td>
                        <td style="padding: 4px; border: 1px solid #000;"><?php
                            if ($res['basic_intake']['is_ligitation'] == 1 || $res['basic_intake']['is_ligitation'] == 2) {
                                $principle = $res['new_total'] == 1 ? $res['new_principle'] : $res['priciple_amount'];
                                $interest = $res['interest_amount'];
                                $fee = $res['basic_intake']['is_ligitation'] == 1 ?
                                    ((float)@$principle * (float)@$res['basic_intake']['provoiderInformation']['litigation_principle'] / 100 + (float)@$interest * (float)@$res['basic_intake']['provoiderInformation']['litigation_interest'] / 100)
                                    : ((float)@$principle * (float)@$res['basic_intake']['provoiderInformation']['arbitration_principle'] / 100 + (float)@$interest * (float)@$res['basic_intake']['provoiderInformation']['arbitration_interest'] / 100);
                                echo  "$".number_format($fee,2);
                                $l_total = (float)@$l_total + $fee;
                            } else {
                                echo "$0.0";
                            } ?></td>
                        <td style="padding: 4px; border: 1px solid #000;">${{number_format($res['filing_fees'],2)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                    <tr>
                        <th colspan="3" style="text-align: right; padding: 10px; font-weight: 900;border: 1px solid #000;">
                            Total Legal Fees:</th>
                        <th style="padding: 10px; border: 1px solid #000;">
                            ${{number_format($l_total,2)}}</th>
                        <td style="padding: 10px; border: 1px solid #000; background-color: #bde0ff;">
                            ${{number_format($p_total,2)}}</td>
                        <td style="padding: 10px; border: 1px solid #000; background-color: #bde0ff;">
                            ${{number_format($i_total,2)}}</td>
                            <td style="padding: 10px; border: 1px solid #000; background-color: #bde0ff;">
                            ${{number_format($l_total,2)}}</td>
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