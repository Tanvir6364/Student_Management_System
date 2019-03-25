@extends('dashboard.master')

@section('mainContent')
    <div class="right_col" role="main">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-file-text-o"></i> Course Edit </h1>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href=""> Home</a></li>
                            <li><i class="fa fa-home"></i><a href=""> Course</a></li>
                            <li><i class="fa fa-home"></i><a href=""> Edit Course</a></li>
                        </ol>
                    </div>
                </div>


                {{-------------------}}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="#" method="GET" id="=form-search">
                            <table>
                                <tr>
                                    {{--<td>
                                        <input type="search" name="search" value="{{ request('search') }}"
                                               class="form-control" placeholder="Search By ID Or Name">
                                    </td>--}}
                                </tr>

                            </table>
                        </form>


                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title"> Academic Year</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($academics as $key =>$a)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td> {{ $a->academic }} </td>
                                        <td>
                                            {{--<a href="{{ url('/manage/course/delAcademic',$a->academic_id) }}" class="btn btn-danger">Delete</a>--}}
                                            <a href="{{url('/manage/course/delAcademic',$a->academic_id)}}"
                                               class="btn btn-danger btn-xs  del-student"><i
                                                        class="fa fa-trash-o" title="Delete"></i></a>
                                        </td>
                                    </tr>
                                @endForeach
                                </tbody>

                            </table>
                            <table class="table table-striped jambo_table bulk_action ">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Shifts</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($shifts as $key =>$s)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td> {{ $s->shift }} </td>
                                        <td>
                                            <button value="#" class="btn btn-danger btn-xs  del-student"><i
                                                        class="fa fa-trash-o" title="Delete"></i></button>
                                        </td>
                                    </tr>
                                @endForeach
                                </tbody>
                            </table>

                            <table class="table table-striped jambo_table bulk_action ">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Batches</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($batches as $key =>$b)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td> {{ $b->batch }} </td>
                                        <td>
                                            <button value="#" class="btn btn-danger btn-xs  del-student"><i
                                                        class="fa fa-trash-o" title="Delete"></i></button>
                                        </td>
                                    </tr>
                                @endForeach
                                </tbody>
                            </table>

                            <table class="table table-striped jambo_table bulk_action ">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Groups</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($groups as $key =>$g)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td> {{ $g->group }} </td>
                                        <td>
                                            <button value="#" class="btn btn-danger btn-xs  del-student"><i
                                                        class="fa fa-trash-o" title="Delete"></i></button>
                                        </td>
                                    </tr>
                                @endForeach
                                </tbody>
                            </table>
                            <table class="table table-striped jambo_table bulk_action ">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Time</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($times as $key =>$t)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td> {{ $t->time }} </td>
                                        <td>
                                            <button value="#" class="btn btn-danger btn-xs  del-student"><i
                                                        class="fa fa-trash-o" title="Delete"></i></button>
                                        </td>
                                    </tr>
                                @endForeach
                                </tbody>
                            </table>

                            <table class="table table-striped jambo_table bulk_action ">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">#</th>
                                    <th class="column-title">Courses</th>
                                    <th class="column-title">Description</th>
                                    <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($programs as $key =>$p)
                                    <tr>
                                        <td> {{ ++$key }}</td>
                                        <td> {{ $p->program }} </td>
                                        <td> {{ $p->description }} </td>
                                        <td>
                                            <button value="#" class="btn btn-danger btn-xs  del-student"><i
                                                        class="fa fa-trash-o" title="Delete"></i></button>
                                        </td>
                                    </tr>
                                @endForeach
                                </tbody>
                            </table>

                        </div>


                    </div>
                    {{-- <div class="footer">
                         {{ $students->render() }}
                     </div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection