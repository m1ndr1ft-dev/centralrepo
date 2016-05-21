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
                    @if(count($deletedAgents))
                        <a href="{{ url('agents/trashed') }}" class="btn btn-sm btn-red"> <i class="fa fa-trash"></i>&nbsp;Trash&nbsp;<span class="badge">{{ count($deletedAgents) }}</span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
                @if(count($agents))
                    <div class="table-responsive">
                        <table class="breadcrumb table table-hover table-condensed">
                            <thead>
                            <tr class="text-capitalize roboto">
                                <th>Name</th>
                                <th>Industry</th>
                                <th>Founder</th>
                                <th>Registered employees</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach($agents as $agent)
                                <tbody>
                                <tr>
                                    <td><a href="{{ action('AgentController@show', $agent->slug) }}">{{ $agent->name }}</a></td>
                                    <td>{{ $agent->industry }}</td>
                                    <td>{{ $agent->founder }}</td>
                                    <td>{{ count($agent->employees()->get()) }}</td>
                                    <td>{{ $agent->created_at->diffForHumans() }}</td>
                                    <td>{{ $agent->updated_at->diffForHumans() }}</td>
                                    <td class="col-sm-3">
                                        <ul class="list-inline col-sm-12" >
                                            <li class="col-sm-3">
                                                {!! Form::open(array('method' => 'POST', 'action' => array('AgentController@edit', $agent->slug), 'class' => 'form-horizontal')) !!}
                                                @include('partials.edit.agents', ['submitTextButton' => 'Edit'])
                                                {!! Form::close() !!}
                                            </li>
                                            <li class="col-sm-3">
                                                {!! Form::open(array('method' => 'DELETE', 'action' => array('AgentController@hide', $agent->slug), 'class' => 'form-horizontal')) !!}
                                                @include('partials.delete.delete', ['submitTextButton' => 'Hide'])
                                                {!! Form::close() !!}
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                           </table>
                    </div>
                @else
                    <p>Sorry no agents or employers found, begin by creating one.</p>
                @endif
            </div>
        </div>
    </div>
    @include('modals.create.agents', ['submitTextButton' => 'ADD'])
    @if(count($agents))
        @include('modals.edit.agents', ['submitTextButton' => 'Update'])
    @endif
@endsection
