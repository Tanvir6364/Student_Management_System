@extends('dashboard.master')

@section('mainContent')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-file-text-o"></i> User List</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href=""> Home</a></li>
                        <li><i class="fa fa-home"></i><a href=""> User</a></li>
                        <li><i class="fa fa-home"></i><a href=""> Manage User</a></li>
                    </ol>
                </div>
            </div>


            {{-------------------}}
            <div class="panel panel-default">

                <div class="panel-body" id="manage-student">
                    <table class="table  table-condensed table-hover table-striped table-bordered ">
                        <thead>
                        <th>N<sup>o</sup></th>
                        <th> Name </th>
                        <th> Email </th>
                        <th> Roll</th>
                        <th> Action</th>
                        </thead>
                        <tbody>

                        @foreach($userLists as $key =>$userList)
                            <tr>
                                <td> {{ ++$key }}</td>
                                <td> {{ $userList->name }} </td>
                                <td> {{ $userList->email }} </td>
                                <td> {{ $userList->role }} </td>
                                <td class="action" id="hidden">
                                    <a href="{{$userList->id}}" class="btn btn-primary btn-xs" id="student-edit"><i class="fa fa-edit" title="Edit"></i></a>
                                    <a href="{{url('/user/delUser',$userList->id)}}" class="btn btn-danger btn-xs  del-student"><i
                                                class="fa fa-trash-o" title="Delete"></i></a>
                                </td>
                            </tr>
                        @endForeach
                        </tbody>


                    </table>
                </div>

            </div>
        </div>
    </div>
    @endsection