@extends('dashboard.master')

@section('mainContent')
    @include('dashboard.courses.popup.academic')
    @include('dashboard.courses.popup.program')
    @include('dashboard.courses.popup.level')
    @include('dashboard.courses.popup.shift')
    @include('dashboard.courses.popup.time')
    @include('dashboard.courses.popup.batch')
    @include('dashboard.courses.popup.group')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-file-text-o"></i> Courses </h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href=""> Home</a></li>
                        <li><i class="fa fa-book"></i><a href=""> Courses</a></li>
                        <li><i class="fa fa-book"></i><a href=""> Manage Courses</a></li>
                    </ol>
                </div>
            </div>
            <div class="clearfix"></div>
            {{-- Main Content Starting Point   --}}
            <div class="row">
                <div class="col-lg-12">

                    <section class="panel panel-default">
                        <header class="panel-heading">
                            Manage Courses
                        </header>
                        <form action="{{ url('/manage/course/createClass') }}" method="POST" class="form-horizontal"
                              id="form-create-class">
                            {{ csrf_field() }}
                            {{-- {!! Form::open(['url'=>'','method'=>'POST','class'=>'form-horizontal','id'=>'form-create-class']) !!}--}}
                            <input type="hidden" name="active" id="active" value="1">
                            <input type="hidden" name="class_id" id="class_id">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label for="acdemic-year"> Academic Year </label>
                                        <div class="input-group">
                                            <select class="form-control" name="academic_id" id="academic_id">
                                                <option value="">-----------</option>
                                                @foreach($academics as $academic)
                                                    <option value="{{$academic->academic_id}}">{{$academic->academic}}</option>

                                                @endforeach
                                            </select>
                                            <div class="input-group-addon">
                                                <span class="fa fa-plus" id="add-more-academic"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="program"> Courses </label>
                                        <div class="input-group">
                                            <select class="form-control" name="program_id" id="program_id">
                                                <option value="">-----------</option>
                                                @foreach($programs as $program)
                                                    <option value="{{$program->program_id}}">{{$program->program}}</option>

                                                @endforeach
                                            </select>
                                            <div class="input-group-addon">
                                                <span class="fa fa-plus" id="add-more-program"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="acdemic-year"> Level </label>
                                        <div class="input-group">
                                            <select class="form-control" name="level_id" id="level_id">

                                            </select>
                                            <div class="input-group-addon">
                                                <span class="fa fa-plus" id="add-more-level"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-3">
                                        <label for="acdemic-year"> Shift </label>
                                        <div class="input-group">
                                            <select class="form-control" name="shift_id" id="shift_id">
                                                <option value="">-----------</option>
                                                @foreach($shifts as $shift)
                                                    <option value="{{$shift->shift_id}}">{{$shift->shift}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-addon">
                                                <span class="fa fa-plus" id="add-more-shift"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="time"> Time </label>
                                        <div class="input-group">
                                            <select class="form-control" name="time_id" id="time_id">
                                                <option value="">-----------</option>
                                                @foreach($times as $time)
                                                    <option value="{{$time->time_id}}">{{$time->time}}</option>

                                                @endforeach
                                            </select>
                                            <div class="input-group-addon">
                                                <span class="fa fa-plus" id="add-more-time"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="batch"> Batch </label>
                                        <div class="input-group">
                                            <select class="form-control" name="batch_id" id="batch_id">
                                                <option value="">-----------</option>
                                                @foreach($batches as $batch)
                                                    <option value="{{$batch->batch_id}}">{{$batch->batch}}</option>

                                                @endforeach
                                            </select>
                                            <div class="input-group-addon">
                                                <span class="fa fa-plus" id="add-more-batch"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-4">
                                        <label for="groub"> Group </label>
                                        <div class="input-group">
                                            <select class="form-control" name="group_id" id="group_id">
                                                <option value="">-----------</option>
                                                @foreach($groups as $group)
                                                    <option value="{{$group->group_id}}">{{$group->group}}</option>

                                                @endforeach
                                            </select>
                                            <div class="input-group-addon">
                                                <span class="fa fa-plus" id="add-more-group"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-5">
                                        <label for="groub"> Start Date </label>
                                        <div class="input-group">
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                   required>


                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-5">
                                        <label for="groub"> End Date </label>
                                        <div class="input-group">
                                            <input type="date" name="end_date" id="end_date" class="form-control"
                                                   required>

                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="panel-footer">
                                <button type="submit" class=" btn btn-primary btn-sm">
                                    Create Course
                                </button>
                                <button type="button" class=" btn btn-success btn-sm update-class">
                                    Update Course
                                </button>

                            </div>
                            {{--  {!! Form::close() !!}--}}
                        </form>
                    </section>

                </div>
            </div>
            <div class="panel panel-default ">
                <div class="panel panel-heading">
                    Class Information
                </div>
                <div class="panel panel-body" id="add-class-info">

                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')
    @include('dashboard.courses.courseScript')
@endsection