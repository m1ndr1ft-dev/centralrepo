@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-left vh-align">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="jumbotron bg-inherit text-white">
                    <div class="container bg-shadow" style="background-color: #434E60; opacity: 0.8;">
                        <h1>E2E | Central Repository</h1>
                        <p>World Largest Employee/Employer Database</p>
                        <p>
                            <a href="{{ url('login') }}" class="btn btn-green">Agent/Employer Login</a>
                            <a href="{{ url('register') }}" class="btn btn-orange">Register Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-10 col-md-offset-1">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Welcome</div>--}}

                {{--<div class="panel-body">--}}
                    {{--Your Application's Landing Page.--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
