<style type="text/css">
    .caadimic {
        white-space: normal;
        width: 450px;
    }

    .action {
        text-align: center;
        vertical-align: middle;
        width: 60px;

    }
</style>

<table class="table-bordered table-hover table-condensed table-striped" id="table-class-info" style="width: 100%">
    <thead>
    <tr>
        <th>Programs</th>
        <th>Level</th>
        <th>Shift</th>
        <th>Time</th>
        <th>Academic Details</th>
        <th id="hidden">Action</th>
        <th>
            <input type="checkbox" id="checkAll">
        </th>

    </tr>
    </thead>
    <tbody>
    @foreach($classes as $c)

        <tr>
            <td>{{$c->program}}</td>
            <td>{{$c->level}}</td>
            <td>{{$c->shift}}</td>
            <td>{{$c->time}}</td>
            <td class="caadimic">
                <a href="#" data-id="{{$c->class_id}}" id="class-edit">
                    Program:{{$c->program}} / Level: {{$c->level}} / Shift: {{$c->shift}}/ Batch: {{$c->batch}}
                    /Time: {{$c->time}} /Group: {{$c->group}} /Start-Date: {{date("d-M-y",strtotime($c->end_date))}}
                    /End-Date: {{date("d-M-y",strtotime($c->end_date))}}


                </a>

            </td>
            <td class="action" id="hidden">
                <button data-id="{{$c->class_id}}" class="btn btn-primary btn-xs" id="class-edit"><i class="fa fa-edit" title="Edit"></i></button>
                <button value="{{$c->class_id}}" class="btn btn-danger btn-xs  del-class"><i
                            class="fa fa-trash-o" title="Delete"></i></button>
            </td>
            <td>
                <input type="checkbox" name="chk[]" value="{{ $c->class_id }}" class="chk">
            </td>


        </tr>

    @endforeach


    </tbody>
</table>
     
