<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Agent/Employer Name:</div>
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'e.g. Amazon']) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Email:</div>
        {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'e.g. tech@amazon.com']) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Industry:</div>
        {!! Form::text('industry', old('industry'), ['class' => 'form-control', 'placeholder' => 'e.g. Military']) !!}
    </div>
</div>