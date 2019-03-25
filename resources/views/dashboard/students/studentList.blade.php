@extends('dashboard.master')

@section('mainContent')

    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-file-text-o"></i> STUDENT SEARCH </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href=""> Home</a></li>
                        <li><i class="fa fa-home"></i><a href=""> Student</a></li>
                        <li><i class="fa fa-home"></i><a href=""> Student Search</a></li>
                    </ol>
                </div>
            </div>


            {{-------------------}}
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{url('/student/studentInfo')}}" method="GET" id="=form-search">
                        <table>
                            <tr>
                                <td>
                                    <input type="search" name="search" value="{{ request('search') }}"
                                           class="form-control" placeholder="Search By ID Or Name">
                                </td>
                            </tr>

                        </table>
                    </form>


                </div>

                <div class="panel-body" id="manage-student">
                    <table class="table  table-condensed table-hover table-striped table-bordered ">
                        <thead>
                        <th>N<sup>o</sup></th>
                        <th> First Name</th>
                        <th> Last Name</th>
                        <th> Full Name</th>
                        <th> Sex</th>
                        <th> Birth Date</th>
                        <th> Action</th>
                        </thead>
                        <tbody>

                        @foreach($students as $key =>$student)
                            <tr>
                                <td> {{ ++$key }}</td>
                                <td> {{ $student->first_name }} </td>
                                <td> {{ $student->last_name }} </td>
                                <td> {{ $student->full_name }} </td>
                                <td> {{ $student->Sex }} </td>
                                <td> {{ $student->dob }} </td>
                                <td class="action" id="hidden">
                                    <button data-id="{{$student->student_id}}" class="btn btn-primary btn-xs" id="student-edit"><i class="fa fa-edit" title="Edit"></i></button>
                                    <button value="{{$student->student_id}}" class="btn btn-danger btn-xs  del-student"><i
                                                class="fa fa-trash-o" title="Delete"></i></button>
                                </td>
                            </tr>
                        @endForeach
                        </tbody>


                    </table>
                </div>
                <div class="footer">
                    {{ $students->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function showClassInfo() {
            //var data= $('#student_id').val();
                MergeCommonRows($('#table-class-info'));

        }

        //========================================Call Class==================================
        function MergeCommonRows(table) {

            var firstColumnBrakes = [];
            $.each(table.find('th'), function (i) {
                var previous = null, cellToExtend = null, rowspan = 1;
                table.find("td:nth-child(" + i + ")").each(function (index, e) {
                    var jthis = $(this), content = jthis.text();
                    if (previous == content && content !== "" && $.inArray(index, firstColumnBrakes) === -1) {
                        jthis.addClass('hidden');
                        cellToExtend.attr("rowspan", (rowspan = rowspan + 1));
                    }
                    else {
                        if (i == 1) firstColumnBrakes.push(index);
                        rowspan = 1;
                        previous = content;
                        cellToExtend = jthis;
                    }
                });
            });
            $('td.hidden').remove();
        }

        //=================================Delete Class===========================
        $(document).on('click', '.del-student', function (e) {
            student_id = $(this).val();
            $.post("{{ url('/student/delStudentInfo') }}", {student_id: student_id}, function (data) {
                showClassInfo($('#student_id').val());

            });
        });

        //=================================Edit Class=====================
        $(document).on('click', '#student-edit', function (data) {
            var student_id = $(this).data('id');
            $.get("{{url('/student/editStudentInfo')}}", {student_id: student_id}, function (data) {
                $('#class_id').val(data.class_id);
                $('#user_id').val(data.user_id);
                $('#dateregistred').val(data.dateregistred);
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#sex').val(data.sex);
                $('#dob').val(data.dob);
                $('#national_card').val(data.national_card);
                $('#status').val(data.status);
                $('#nationality').val(data.nationality);
                $('#rac').val(data.rac);
                $('#passport').val(data.passport);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#village').val(data.village);
                $('#district').val(data.district);
                $('#commune').val(data.commune);
                $('#province').val(data.province);
                $('#current_address').val(data.current_address);
            });
        });

    </script>
    @endsection