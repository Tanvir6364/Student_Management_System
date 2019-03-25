@extends('dashboard.master')

@section('mainContent')
    <style type="text/css">
        caption {
            height: 50px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-file-text-o"></i> FEE REPORT </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href=""> Home</a></li>
                        <li><i class="fa fa-home"></i><a href=""> Fees</a></li>
                        <li><i class="fa fa-home"></i><a href=""> Fee Report</a></li>
                    </ol>
                </div>
            </div>


            {{-------------------}}
            <div class="panel panel-default">

                <div class="panel-heading">
                    <form action="{{url('/fee/report/showFeeReport')}}" method="POST">
                        {!! csrf_field() !!}
                        <table>
                            <tr>
                                <td>
                                    <b><i class="fa fa-apple"></i> Fee Information </b>
                                </td>
                                <td></td>
                                <td>
                                    <input type="date" name="fromm" id="fromm" class="form-control"
                                           placeholder="dd/mm/yyy"
                                           required {{--value="{{date('m-d-Y')}}"--}}>

                                </td>

                                <td>
                                    <input type="date" name="to" id="to" placeholder="dd/mm/yyy" class="form-control"
                                           required {{--value="{{date('m-d-Y')}}"--}}>

                                </td>
                                <td>
                                    <div class="panel-footer">
                                        <button value="submit" class="btn btn-success btn-save">Go <i
                                                    class="fa fa-save"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </table>
                    </form>

                </div>
                <div class="panel-body" style="padding-bottom: 4px; text-align: center;">
                    <b style="text-align: center; font-size: 20px ;font-weight: bold;"> Fee Report</b>
                    {{--<div class="show-student-paid">

                    </div>--}}
                    <?php
                        if ($fees == true){
                    ?>
                    <table class="table table-striped table-hover table-condensed" id="fee-info">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Accountant</th>
                            <th> Stu.Id </th>
                            <th> Student Name </th>
                            <th> Paid Amount </th>
                            <th> Discount </th>
                            <th> School Fee </th>
                            <th> Student Fee </th>
                            <th> Paid Date </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fees as $key =>$fee)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td> {{ $fee->name }} </td>
                                <td> {{ $fee->student_id }} </td>
                                <td> {{ $fee->first_name." ".$fee->last_name }} </td>
                                <td> {{ number_format($fee->paid,2) }} </td>
                                <td> {{ $fee->discount }} </td>
                                <td> {{ number_format($fee->school_fee,2) }} </td>
                                <td> {{ number_format($fee->s_fee_id,2) }} </td>
                                <td> {{ $fee->transact_date }} </td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    {{--<script type="text/javascript">

        $("#fromm").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            onSelect: function (fromm) {
                showFee(fromm, $('#to').val())
            }
        });
        $("#to").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            onSelect: function (to) {
                showFee($('#fromm').val(), to)
            }

        });

/*
        $( function() {
            $( "#fromm" ).datepicker({
                onSelect: function (fromm) {
                    showFee(fromm, $('#to').val())
                }
            });
        });
*/

           /* $( "#fromm" ).datepicker({
                onSelect: function (fromm) {
                    showFee(fromm, $('#to').val())
                }
            });*/



       /* $( function() {

            $("#to").datepicker({
                onSelect: function (to) {
                    showFee(to, $('#fromm').val())
                }
            });
        });*/


        ////////////////
        function showFee(fromm, to) {
            $.get("{{url('/fee/report/showFeeReport')}}", {fromm: fromm, to: to}, function (data) {
                $('.show-student-paid').html(data)
            });
        }


    </script>--}}



@endsection
