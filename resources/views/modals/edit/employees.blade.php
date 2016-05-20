<div class="modal fade editmodalwindow" tabindex="-1" role="dialog" id="editemployees">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::model($employee, ['method' => 'PATCH', 'action' => ['EmployeeController@update', $employee->id], 'class' => 'form-horizontal']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Employee</h4>
            </div>

            <div class="modal-body">
                @include('forms.edit.agent')
            </div>
            <div class="modal-footer">
                <button class="btn btn-cyan empsubmitbutton">{{ $submitTextButton }}</button>
                <div class="success margin-top-20">
                    @include('errors.errors')
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
