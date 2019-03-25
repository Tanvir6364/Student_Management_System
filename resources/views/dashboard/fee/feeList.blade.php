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
<script type="text/javascript">
    $(document).ready(function() {
        $('#fee-info').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]

        } );
    } );



</script>