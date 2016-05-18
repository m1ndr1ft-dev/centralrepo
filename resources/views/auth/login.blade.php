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
                                {{--@if (count($errors) > 0)--}}
                                    {{--<div class="alert alert-danger">--}}
                                        {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                                        {{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
                                        {{--<ul>--}}
                                            {{--@foreach ($errors->all() as $error)--}}
                                                {{--<li>{{ $error }}</li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--@endif--}}

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

{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="email" class="form-control" name="email" value="{{ old('email') }}">--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="password" class="form-control" name="password">--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember"> Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--<i class="fa fa-btn fa-sign-in"></i>Login--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
