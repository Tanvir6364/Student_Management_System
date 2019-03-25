@extends('dashboard.master')

@section('mainContent')
    <style type="text/css">
        .student-photo {
            height: 160px;
            padding-left: 1px;
            padding-right: 1px;
            border: 1px solid #ccc;
            background: #eee;
            width: 140px;
            margin: 0 auto;
        }

        .photo > input[type='file'] {
            display: none;
        }

        .photo {
            width: 30px;
            height: 30px;
            border-radius: 100%;

        }

        .student-id {
            background-repeat: repeat-x;
            border-color: #ccc;
            padding: 5px;
            text-align: center;
            background: #eee;
            border-bottom: 1px solid #ccc;
        }

        .btn-browse {
            border-color: #ccc;
            padding: 5px;
            text-align: center;
            background: #eee;
            border: none;
            border-top: 1px solid #ccc;

        }

        fieldset {
            margin-top: 5px;

        }

        fieldset legend {
            display: block;
            width: 100%;
            padding: 0px;
            font-size: 15px;
            line-height: inherit;
            color: #797979;
            border: 0;
            border-bottom: 1px solid #e5e5e5;

        }

    </style>
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Student Registration </h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href=""> Home </a></li>
                                <li><i class="fa fa-group"></i>Student</li>
                                <li><i class="fa fa-file-text"></i>Create Student</li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel-group" id="accordion">

                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"
                                   style="text-decoration: none;"><b>Choose
                                        Academic</b> </a>
                                <a href="#" class="pull-right" id="show-class-info"><i class="fa fa-plus"></i></a>
                            </div>
                            <div class="panel-collapse  collapse in" id="collapse1">
                                <div class="panel-body academic-detail"><p></p></div>

                            </div>


                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b><i class="fa fa-apple"></i> Student Information </b>
                        </div>
                        <div class="panel-body" style="padding-bottom: 4px">
                            <form action="{{url('/student/postStudentRegister')}}" method="POST" id="form-create-student"
                                  enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="hidden" name="class_id" id="class_id">
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                                <input type="hidden" name="dateregistred" id="dateregistred" value="{{date('Y-m-d')}}">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                        <div>
                                            {{-------------first Name----------}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">First name</label>
                                                    <input type="text" name="first_name" id="first_name"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            {{-------Last Name-------}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Last name</label>
                                                    <input type="text" name="last_name" id="last_name"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            {{-------Gender------}}

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <fieldset>
                                                        <legend>sex</legend>
                                                        <table style="width: 100%;margin-top: -14px;">
                                                            <tr style="border-bottom: 1px solid #ccc">
                                                                <td>
                                                                    <label>
                                                                        <input type="radio" name="sex" id="sex"
                                                                               value="0" required>
                                                                        Male
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label>
                                                                        <input type="radio" name="sex" id="sex"
                                                                               value="1" required>
                                                                        Female
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        {{-------DOB------}}

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dob">Birth Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calender"></i>
                                                    </div>
                                                    <input type="date" name="dob" id="dob" class="form-control"
                                                           required>

                                                </div>
                                            </div>
                                        </div>
                                        {{-------National Card------}}


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nationnal_card">National Card-</label>
                                                <input type="text" name="national_card" id="nationnal_card"
                                                       class="form-control" required>
                                            </div>
                                        </div>


                                        {{-------Status------}}

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <fieldset>
                                                    <legend>Status</legend>
                                                    <table style="width: 100%;margin-top: -14px;">
                                                        <tr style="border-bottom: 1px solid #ccc">
                                                            <td>
                                                                <label>
                                                                    <input type="radio" name="status" id="status"
                                                                           value="0" required>
                                                                    Singel
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input type="radio" name="status" id="status"
                                                                           value="1" required>
                                                                    Married
                                                                </label>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </div>
                                        </div>

                                        {{-------Nationality------}}


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nationality">Nationality</label>
                                                <input type="text" name="nationality" id="nationality"
                                                       class="form-control" required>
                                            </div>
                                        </div>


                                        {{-------Rac------}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rac">Religion</label>
                                                <input type="text" name="rac" id="rac" class="form-control" required>
                                            </div>
                                        </div>


                                        {{-------passport------}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="passport">Passport(If has)</label>
                                                <input type="number" name="passport" id="passport" class="form-control">
                                            </div>
                                        </div>

                                        {{-------phone------}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="number" name="phone" id="phone" class="form-control"
                                                       required>
                                            </div>
                                        </div>


                                        {{-------email------}}
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="phone">Email</label>
                                                <input type="email" name="email" id="phone" class="form-control"
                                                       required>
                                            </div>
                                        </div>


                                    </div>


                                    {{-------photo------}}
                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                        <div class="form-group form-group-login">
                                            <table style="margin:0 auto;">
                                                <thead>
                                                <tr class="info">
                                                    <th class="student-id">{{ sprintf('%05d',$student_id+1) }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="photo">
                                                        {{-- {!! Html::image('public/admin/photo/example.jpg',null,['class'=>'student-photo','id'=>'showPhoto']) !!}--}}
                                                        <img src="{{ asset('public/photo/example.jpg')}}"
                                                             alt="..." class="student-photo" id="showPhoto">
                                                        <input type="file" name="photo" id="photo"
                                                               accept="image/gif, image/jpg, image/jpeg, image/png">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: center;background:#ddd;">
                                                        <input type="button" name="brows_file" id="brows_file"
                                                               class="form-control btn-browse" value="Brows">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--------------------------------}}


                                </div>
                                <br>


                                {{--------address------}}
                                <div class="panel-heading" style="margin-top: -20px">
                                    <b> <i class="fa fa-apple"></i> Address</b>
                                </div>
                                <div class="panel-body" style=" padding-bottom: 10px; padding-top: 0px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="village">Village</label>
                                                <input type="text" name="village" id="village" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <input type="text" name="district" id="district" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="commune">Country</label>
                                                <input type="text" name="commune" id="commune" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="province">Permanent Address</label>
                                                <input type="text" name="province" id="province" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="current_address">Present Address</label>
                                                <input type="text" name="current_address" id="current_address"
                                                       class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <button value="submit" class="btn btn-success btn-save">Save <i
                                                class="fa fa-save"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
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


        $('#form-multi-class #btn-go').addClass('hidden');
        /*$("#dob").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'

        });*/
        $(document).on('click', '#class-edit', function (e) {
            e.preventDefault();
            $('#class_id').val($(this).data('id'));
            $('.academic-detail p').text($(this).text());
            $('#academic-choose').modal('hide');

        })

        ////////////////////////////////browse photo////////////////
        $('#brows_file').on('click', function () {
            $('#photo').click();

        });

        $('#photo').on('change', function (e) {
            showFile(this, '#showPhoto');
        });

        //////////////////
        function showFile(fileInput, img, showName) {
            if (fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(img).attr('src', e.target.result);

                }
                reader.readAsDataURL(fileInput.files[0]);
            }

            $(showName).text(fileInput.files[0].name);
        }

    </script>




@endsection