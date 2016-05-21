<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Employee Name:</div>
        {!! Form::text('name', old('name'), array('class' => 'form-control', 'placeholder' => 'e.g. John Doe')) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Email:</div>
        {!! Form::text('email', old('email'), array('class' => 'form-control', 'placeholder' => 'e.g. jdoe@example.com')) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Job Title:</div>
        {!! Form::text('title', old('title'), array('class' => 'form-control', 'placeholder' => 'e.g. Programmer')) !!}
    </div>
</div>
