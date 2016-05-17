@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12 margin-top-70">
                <h2>Agents <span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
                <div class="pull-right">
                    <a href="#createagents" class="btn btn-sm btn-green" data-toggle="modal"> <i class="fa fa-plus"></i>&nbsp;New Agent/Employer</a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
                @if(count($agents))
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                            <tr class="text-capitalize roboto">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Industry</th>
                            </tr>
                            </thead>

                            @foreach($agents as $agent)

                                <tbody>
                                <tr>
                                    <td>{{ $agent->id }}</td>
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->industry }}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @else
                    <p>Sorry no agents or employers found, begin by creating one <a href="#createagents" class="" data-toggle="modal">new Agent/Employer</a></p>
                @endif
            </div>
        </div>
    </div>
    @include('modals.create.agents', ['submitTextButton' => 'ADD'])
@endsection
