<div class="modal fade" tabindex="-1" role="dialog" id="createagents">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(array('method' => 'POST', 'action' => 'AgentController@store', 'class' => 'form-horizontal')) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add a new Agent/Employer</h4>
            </div>

            <div class="modal-body">
                @include('forms.create.agent')
            </div>
            <div class="modal-footer">
                <a href="#" id="" class="btn btn-cyan submitbutton"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    &nbsp;{{ $submitTextButton }}</a>
                <div class="success margin-top-20">
                    @include('errors.errors')
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
