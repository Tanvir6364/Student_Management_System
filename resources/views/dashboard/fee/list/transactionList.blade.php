<div class="accordion-body collapse {{ $key==0 ? 'in' :null }}" id="demo{{$key}}">
    <table>
        <thead>
        <tr>
            <th style="text-align: center;">#</th>
            <th>Transaction Date</th>
            <th> Cashier</th>
            <th>Paid ($)</th>
            <th>Remark</th>
            <th>Description</th>
            <th style="text-align: center">Action</th>
        </tr>

        </thead>
        <tbody>
        @foreach($readStudentTrans/*->where('s_fee_id',$sf->s_fee_id)*/ as $n =>$st)
            <tr>
                <td>{{++$n}}</td>
                <td>{{ $st->transact_date }} </td>
                <td> {{ $st->name }}</td>
                <td> {{ number_format($st->paid,2) }}</td>
                <td> {{ $st->remark }}</td>
                <td>{{ $st->description }}</td>
                <td style="text-align: center ;width: 112px;">
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-edit" title="Edit"></i></a>
                    <a href="{{ url('/student/deleteTransaction',$st->transact_id) }}" class="btn btn-danger btn-xs"><i
                                class="fa fa-trash-o" title="Delete"></i></a>
                    <a href="{{ url('/student/printInvoice',$st->receipt_id) }}" target="_blank"
                       class="btn btn-warning btn-xs"><i class="fa fa-print" title="Print"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>