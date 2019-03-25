<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('/home')}}" class="site_title"><i class="fa fa-group"></i> <span>Admin Panel</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('public/photo/logo.png')}}" alt="..."
                     class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-book"></i> Courses <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/manage/course/create')}}">Create Course</a></li>
                            <li><a href="{{url('/manage/course/edit')}}">Manage Courses</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-group"></i> Student <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/student/studentRegister')}}">Add Student</a></li>
                            <li><a href="{{url('/student/studentInfo')}}">Student List</a></li>

                        </ul>
                    </li>

                    <li><a><i class="fa fa-money"></i> Fees <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/student/payment')}}">Student Payment</a></li>
                            <li><a href="{{url('/fee/report/getFeeReport')}}">Fee Report</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-area-chart"></i> Report <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/report/student/studentList')}}">Student List</a></li>
                            <li><a href="{{url('/report/student/studentMultiClassList')}}">Student Multi Class List</a>
                            </li>
                            <li><a href="{{url('/report/student/newStudentRegChart')}}">Student Registration Chart</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('/user/getUser')}}">Add User</a></li>
                            <li><a href="{{url('/user/manageUser')}}">User List</a></li>
                        </ul>
                    </li>

{{--
                    <li><a><i class="fa fa-rouble"></i> Test <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Sample 1</a></li>
                            <li><a href="#">Sample 2</a></li>
                        </ul>
                    </li>--}}



                </ul>
            </div>

            <div class="menu_section">
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>

        <!-- /menu footer buttons -->

    </div>

</div>

