<table class=" table table-bordered table-hover table-striped table-condensed" id="student-info">
    <thead>
    <tr>
        <th>#</th>
        <th> Student ID </th>
        <th> Name </th>
        <th> Sex </th>
        <th> Birth Date </th>
        <th> Courses </th>
        <th> Level </th>
        <th> Shift </th>
        <th> Time </th>
        <th> Batch </th>
        <th> Group </th>
    </tr>
    </thead>
    <tbody>
    @foreach($classes as $key =>$c)


        <tr>
            <td>{{ ++$key}}</td>
            <td>{{sprintf("%05d",$c->student_id) }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->sex }}</td>
            <td>{{ $c->dob }}</td>

            <td>{{ $c->program }}</td>
            <td>{{ $c->level }}</td>
            <td>{{ $c->shift }}</td>
            <td>{{ $c->time }}</td>
            <td>{{ $c->batch }}</td>
            <td>{{ $c->group }}</td>

        </tr>

    @endforeach
    </tbody>
</table>

{{--@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    @endsection--}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#student-info').DataTable( {
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
