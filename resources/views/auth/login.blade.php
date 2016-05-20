@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 vh-align">
                    <div class="panel-wrapper">
                        <div class="panel panel-default bg-whitelight box-shadow">
                            <div class="panel-heading margin-bottom-10">
                                <i class="fa fa-database" aria-hidden="true"></i><span>&nbsp;Login</span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">E-Mail&nbsp;<i class="fa fa-envelope"></i></label>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="email" class="form-control icon" name="email" value="{{ old('email') }}" placeholder="email@example.com">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Password&nbsp;<i class="fa fa-key"></i>
                                        </label>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" class="form-control" name="password" placeholder="1234">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="checkbox">
                                                <label class="col-md-12 control-label">
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                            <button type="submit" class="btn btn-block btn-cyan" style="">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                            <a href="{{ url('password/reset') }}" class="btn btn-block btn-red">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                            <a href="{{ url('/register') }}" class="btn btn-block btn-orange">Register</a>
                                        </div>
                                    </div>
                                    <div class="success margin-top-20">
                                        @include('errors.errors')
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
