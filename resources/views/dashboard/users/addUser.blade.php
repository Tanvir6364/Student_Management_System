@extends('dashboard.master')

@section('mainContent')
    <div class="right_col" role="main">
        <div class="">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"><i class="fa fa-file-text-o"></i> New User</h1>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href=""> Home</a></li>
                                <li><i class="fa fa-home"></i><a href=""> User</a></li>
                                <li><i class="fa fa-home"></i><a href=""> New User</a></li>
                            </ol>
                        </div>
                    </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-apple"></i> {{ __('Register') }} Information </b>
                </div>
                <div class="panel-body" style="padding-bottom: 4px">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header"></div>

                                    <div class="card-body">
                                        <form method="POST" action="{{url('/user/addUser')}}"  id="form-create-student">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                           name="name" value="" required autofocus>

                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                           name="email" value="{{ old('email') }}" required>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="name"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="role">
                                                                <option>Select Role</option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Manager</option>
                                                                <option value="3">CEO</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('role'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="password"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                           name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
@endsection
