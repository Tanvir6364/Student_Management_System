<div class="panel panel-default" style=" margin-top:-18px">
    <div class="panel-heading"> pay List</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table style="border-collapse: collapse;" class="table-hover table-bordered" id="list-student-fee">
                <thead>
                <tr>
                    <th style="text-align: center;">N<sup>0</sup></th>
                    <th>Program</th>
                    <th>level</th>

                    <th style="text-align: center;">Fee</th>
                    <th style="text-align: center;">Amount</th>
                    <th style="text-align: center;">Discount</th>
                    <th style="text-align: center;">Paid</th>
                    <th style="text-align: center;">Balance</th>
                    <th style="text-align: center;">Action</th>
                </tr>
                </thead>
                <tbody id="tbody-student-fee">
                @foreach($readStudentFee as $key=>$rSF)
                    <tr data-id="" id="feeId">
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td style="text-align: center;">{{$rSF->program}}</td>

                        <td style="text-align: center;">{{$rSF->level}}</td>
                        <td style="text-align: center;">${{number_format($rSF->school_fee,2)}}</td>
                        <td style="text-align: center;">${{number_format($rSF->student_amount,2)}}</td>
                        <td style="text-align: center;">{{$rSF->discount}}</td>
                        <td style="text-align: center;">
                            ${{ number_format($readStudentTrans->where('s_fee_id',$rSF->s_fee_id)->sum('paid'),2) }}

                            <input type="hidden" name="b" id="b">
                        </td>
                        <td style="text-align: center; color: red">
                            ${{ number_format($rSF->student_amount - $readStudentTrans->where('s_fee_id',$rSF->s_fee_id)->sum('paid'),2) }}</td>
                        <td style="text-align: center; width: 115px; ">
                            <a href="#" class="btn btn-success btn-xs btn-sfee-edit" title="Edit"
                               data-id-update-student-fee="{{$rSF->s_fee_id}}">
                                <i class="fa fa-edit"></i> </a>
                            <button type="button" class="btn btn-danger btn-xs btn-paid"
                                    value="{{ $rSF->student_amount - $readStudentTrans->where('s_fee_id',$rSF->s_fee_id)->sum('paid') }}"
                                    data-id-paid="{{$rSF->s_fee_id}}">
                                <i class="fa fa-usd" title="Complete"></i></button>


                            <button class="btn btn-primary btn-xs accordion-toggle" data-toggle="collapse"
                                    data-target="#demo{{$key}}" title="Partial"><span class="fa fa-eye"></span></button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="9" class="hidenRow">
                            @include('dashboard.fee.list.transactionList')
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="panel-footer" style="height: 40px;"></div>
</div>