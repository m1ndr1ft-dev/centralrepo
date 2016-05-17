@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 panel-wrapper vh-align">
                    <div class="panel panel-default bg-whitelight box-shadow ">
                        <div class="panel-heading">
                            <i class="fa fa-database" aria-hidden="true"></i><span> User Registration</span>
                        </div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Name</label>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control icon" name="name" value="{{ old('name') }}" placeholder="John Doe">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">E-Mail Address&nbsp;<i class="fa fa-envelope"></i></label>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="john@example.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Password&nbsp;<i class="fa fa-key"></i></label>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control" name="password" placeholder="1234">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label">Confirm Password&nbsp;<i class="fa fa-key"></i></label>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control icon" name="password_confirmation" placeholder="1234">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-block btn-green">
                                            Register
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                                        <a href="{{ url('/login') }}" class="btn btn-block btn-cyan">Login</a>
                                    </div>
                                </div>
                            </form>
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
                {{--<div class="panel-heading">Register</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">Name</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" class="form-control" name="name" value="{{ old('name') }}">--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

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

                        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">Confirm Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input type="password" class="form-control" name="password_confirmation">--}}

                                {{--@if ($errors->has('password_confirmation'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--<i class="fa fa-btn fa-user"></i>Register--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
