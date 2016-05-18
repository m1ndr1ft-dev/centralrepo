<div class="modal fade" tabindex="-1" role="dialog" id="createemployees">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['method' => 'POST', 'action' => ['EmployeeController@store', ''], 'class' => 'form-horizontal']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add a new Employee</h4>
                </div>

                <div class="modal-body">
                    @include('forms.create.employee')
                </div>
                <div class="modal-footer">
                    <a href="#" id="empbtn" class="btn btn-cyan submitbutton"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        &nbsp;{{ $submitTextButton }}</a>
                <div class="success margin-top-20">
                    @include('errors.errors')
                </div>
             {!! Form::close() !!}

                </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
