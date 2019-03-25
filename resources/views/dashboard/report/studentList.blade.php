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
                    <h1 class="page-header"><i class="fa fa-file-text-o"></i> Student Registration </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href=""> Home</a></li>
                        <li><i class="fa fa-home"></i><a href=""> Reports</a></li>
                        <li><i class="fa fa-home"></i><a href=""> StudentList</a></li>
                    </ol>
                </div>
            </div>


            {{-------------------}}
            <div class="panel panel-default">

                <div class="panel-heading">
                    <b><i class="fa fa-apple"></i> Student Information </b>
                    <a href="#" class="pull-right" id="show-class-info"><i class="fa fa-plus"></i> </a>

                </div>
                <div class="panel-body" style="padding-bottom: 4px">
                    <b style="text-align: center; font-size: 20px ;font-weight: bold;"> Student Report</b>
                    <div class="show-student-info">


                    </div>

                </div>
            </div>


            @include('dashboard.classes.classPopup')
        </div>
    </div>

@endsection



@section('script')

     @include('dashboard.script.scriptClassPopup')
    <script type="text/javascript">
        $(document).on('click', '#class-edit', function (e) {
            e.preventDefault();
            class_id = ($(this).data('id'));
            $.get('{{ url('/report/student/studentInfo') }}', {class_id: class_id}, function (data) {
                $('.show-student-info').empty().append(data);
            })

        })
    </script>
@endsection
