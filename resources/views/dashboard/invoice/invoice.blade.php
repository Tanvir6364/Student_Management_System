<!DOCTYPE html>
<html>
<head>
    <title>Student Invoice</title>
    <style type="text/css">
        html, body {
            padding: 0px;
            margin: 0px;
            width: 100%;
            background: #fff;
            font-family: Arial, 'Sans Serif', 'Time News Roman';
            font-size: 10pt;
        }

        table {
            width: 700px;
            margin: 0 auto;
            text-align: left;
            border-collapse: collapse;
        }

        th {
            padding-left: 2px;
        }

        th {
            padding: 2px;
        }

        .aeu {
            text-align: right;
            padding-right: 10px;
            font-family: 'time news roman', 'Khmer Os Muol Light';
        }

        .line-top {
            border-left: 1px solid;
            padding-left: 10px;
            font-family: 'time news roman', 'Khmer Os Muol Light';
        }

        .verify {
            font-family: 'time news roman', 'Khmer Os Muol Light';
        }

        .imageAou {
            width: 50px;
            height: 70px;
        }

        .th {
            background-color: #ddd;
            border: 1px solid;
            text-align: center;
        }

        #container {
            width: 100%;
            margin: 0 auto;
        }

        .khm-os {
            font-family: 'time news roman';
        }

        .divide {
            width: 100%
            margin: 0 auto;
        }

        hr {
            width: 100%;
            margin-right: 0;
            margin-right: 0;
            padding: 0;
            margin-top: 35px;
            margin-bottom: 20px;
            border: 0 none;
            background: none;
            border-top: 1px dashed #322f32;
            height: 0;

        }

        button {
            margin: 0 auto;
            text-align: center;
            height: 100%;
            width: 100%;
            cursor: pointer;
            font-weight: bold;
        }

        .lenghth-limit {
            max-height: 350px;
            min-height: 350px
        }

        .div-button {
            width: 100%;
            margin-top: 0px;
            height: 50px;
            text-align: center;
            margin-bottom: 10px;
            border-bottom: 1px;
            background: #ccc;
        }

        .line-row {
            background-color: #fff;
            border: 1px solid;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="div-button">
    <button onclick="printContent('divide')"> Print</button>
</div>
<div id="divide">
    <?php for($i = 0;$i < 2;$i++){ ?>
    <div id="container">
        <div class="lenghth-limit">


            <table>
                <tr>
                    <td style="padding-left: 40px; width: 50px">
                        <img src="{{ asset('public/photo/logo.png') }}" class="imageAou" height="300px" width="50px">
                    </td>
                    <td class="aeu">
                        <b style="font-weight: normal;"> //////////////</b>
                        <br>
                        <b>Synchronise Academy </b>
                    </td>
                    <td class="line-top">
                        <b style="font-weight: normal;"> //////////////</b>
                        <br>
                        <b>RECEIPT</b>
                    </td>

                </tr>

                <tr>
                    <td colspan="2" style="text-align: right;"></td>
                    <td colspan="0" style="text-align: right; padding-left: 80px">
                        <b> Recepit N <sup>o</sup>:{{ sprintf("%05d",$Invoice->receipt_id) }} </b>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: right;"></td>
                    <td colspan="0" style="text-align: right; padding-left: 80px">
                        <b> Date: <sup>o</sup>:{{ date('d-M-Y',strtotime ($Invoice->transact_date)) }} </b>
                    </td>
                </tr>
            </table>
            {{---------------------------}}


            <table>
                <tr>
                    <td style="width: 120px; padding: 5px 0px">
                        StudentId : <b>{{ sprintf("%05d",$Invoice->student_id) }}</b>
                    </td>

                    <td style="width: 100px; padding: 5px 50px">
                        <b>First Name :</b>{{ $Invoice->first_name}}
                    </td>
                    <td style="width: 120px; padding: 10px 0px">
                        <b>Last Name : </b>{{ $Invoice->last_name }}
                    </td>
                    <td>Gender:
                        <b>
                            @if($Invoice->sex==0) Male  @else Female @endif
                        </b>

                    </td>
                </tr>
            </table>

            {{---------------------------}}
            <table>
                <thead>
                <tr>
                    <th class="th" style="text-align: left;"> Description</th>

                    <th style="width: 70px" class="th">Fee</th>
                    <th style="width: 70px" class="th">Discount</th>
                    <th style="width: 70px" class="th">Amount</th>
                    <th style="width: 70px" class="th">Pay</th>
                    <th style="width: 70px" class="th">Balance Remain</th>
                </tr>

                </thead>
                <tbody>
                <tr>
                    <td class="line-row" style="text-align: left">
                        {{ $status->detail }}
                    </td>
                    <td class="line-row">
                        ${{ number_format($Invoice->school_fee,2) }}
                    </td>
                    <td class="line-row">
                        {{ $studentFee->discount }}%
                    </td>
                    <td class="line-row">
                        ${{ number_format($studentFee->amount,2) }}
                    </td>
                    <td class="line-row">
                        ${{ number_format($Invoice->paid,2) }}
                    </td>
                    <td class="line-row">
                        ${{ number_format($studentFee->amount-$totalPaid,2) }}
                    </td>
                </tr>
                </tbody>
            </table>
            {{---------------------------}}

            <table>
                <tr>
                    <td>
                        <b class="verify">Note:</b>
                        <p style="display: inline-block;">
                            All Payment are not refundable or transferable
                        </p>
                    </td>
                    <td>
                        <b style="margin-bottom: 30px"> Cashier:{{ $Invoice->name }}</b><br><br>
                        Printed: {{date('d-M-Y g:i:s A')}}
                    </td>
                    <td style="vertical-align: top;">
                        Printed By : {{Auth::user()->name}}
                    </td>
                </tr>
            </table>

        </div>
        <br><br><br><br>
        {{------------------------}}
        <table>
            <tr>
                <td style="font-size: 10pt;text-align: center;">
                    Copy right for Tanvir Bin Faysal Khan
                </td>
            </tr>
            <td style="font-size: 10pt ;text-align: center;">

                Phone :(+880)1911893172 Email : tanvirkhan6364@gmail.com
            </td>
        </table>
    </div>
    @if ($i==0)
        <br>
        <hr>
    @endif
    <?php }?>
</div>
<script type="text/javascript">
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;

        window.print();
        document.body.innerHTML = restorepage;
        window.close();
    }
</script>
</body>
</html>