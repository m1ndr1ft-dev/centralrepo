@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12 margin-top-70">
                <h2>Agents | Recycle Bin<span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('agents') }}">Agents</a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
                <div class="pull-right">
                    <a href="{{ url('agents') }}" class="btn btn-sm btn-orange" ><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;Back</a>
                    @if(count($deletedAgents))
                        <a href="{{ url('agents/restoreall') }}" class="btn btn-sm btn-green"> <i class="fa fa-check"></i>&nbsp;Restore All&nbsp;<span class="badge">{{ count($deletedAgents) }}</span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
                @if(count($deletedAgents))
                    <div class="table-responsive">
                        <table class="table-hover table-condensed">
                            <thead>
                            <tr class="text-capitalize roboto">
                                {{--<th>Id</th>--}}
                                <th>Name</th>
                                <th>Industry</th>
                                <th>Founder</th>
                                <th>Registered employees</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            @foreach($deletedAgents as $agent)
                                <tbody>
                                <tr>
                                    {{--<td>{{ $agent->id }}</td>--}}
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->industry }}</td>
                                    <td>{{ $agent->founder }}</td>
                                    <td>{{ count($agent->employees()->get()) }}</td>
                                    <td>{{ $agent->created_at->diffForHumans() }}</td>
                                    <td>{{ $agent->updated_at->diffForHumans() }}</td>
                                    <td class="col-sm-3">
                                        <ul class="list-inline col-sm-12" >
                                            <li class="col-sm-5">
                                                {!! Form::open(['method' => 'DELETE', 'action' => ['AgentController@restore', $agent->slug], 'class' => 'form-horizontal']) !!}
                                                @include('partials.delete.delete', ['submitTextButton' => 'Restore'])
                                                {!! Form::close() !!}
                                            </li>
                                            <li class="col-sm-5">
                                                {!! Form::open(['method' => 'DELETE', 'action' => ['AgentController@delete', $agent->slug], 'class' => 'form-horizontal']) !!}
                                                @include('partials.delete.delete', ['submitTextButton' => 'Delete'])
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
                    <p>Sorry no agents or employers in the trash bin, go <a href="{{ url('agents') }}" class="">back</a></p>
                @endif
            </div>
        </div>
    </div>
@endsection
