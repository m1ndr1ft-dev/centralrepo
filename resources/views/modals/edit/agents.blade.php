<div class="modal fade editmodalwindow" tabindex="-1" role="dialog" id="editagents">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::model($agent, ['method' => 'PATCH', 'action' => ['AgentController@update', $agent->id], 'class' => 'form-horizontal']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Agent/Employer</h4>
            </div>

            <div class="modal-body">
                @include('forms.edit.agent')
            </div>
            <div class="modal-footer">
                <button class="btn btn-cyan submitbutton">{{ $submitTextButton }}</button>
                <div class="success margin-top-20">
                    @include('errors.errors')
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
