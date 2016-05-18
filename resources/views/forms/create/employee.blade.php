<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Employee Name:</div>
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'e.g. John Doe']) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Email:</div>
        {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'e.g. jdoe@example.com']) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Job Title:</div>
        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'e.g. Programmer']) !!}
    </div>
</div>
