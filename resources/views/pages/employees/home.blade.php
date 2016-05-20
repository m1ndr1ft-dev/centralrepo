@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12 margin-top-70">
                <h2>Employees <span class="small pull-right">{{ $today }} | {{ $currenttime }}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
                <div class="pull-right">
                    <a href="#createemployees" class="btn btn-sm btn-green" data-toggle="modal"> <i class="fa fa-plus"></i>&nbsp;New Employee</a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg12 col-md-12 col-sm-12 col-xs-12">
                @if(count($employees))
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed">
                            <thead>
                            <tr class="text-capitalize roboto">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Job Title</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </tr>
                            </thead>
                            @foreach($employees as $employee)
                                <tbody>
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->title }}</td>
                                    <td>{{ $employee->created_at->diffForHumans() }}</td>
                                    <td>{{ $employee->updated_at->diffForHumans() }}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                @else
                    <p>Sorry no agents or employers found, begin by creating one <a href="#createemployees" class="" data-toggle="modal">new Employee</a></p>
                @endif
            </div>
        </div>
    </div>
    @include('modals.create.employees', ['submitTextButton' => 'ADD'])
@endsection
