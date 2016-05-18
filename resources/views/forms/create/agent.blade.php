<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Agent/Employer Name:</div>
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'e.g. Amazon']) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Industry:</div>
        {!! Form::text('industry', old('industry'), ['class' => 'form-control', 'placeholder' => 'e.g. eCommerce']) !!}
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon">Founder:</div>
        {!! Form::text('founder', old('founder'), ['class' => 'form-control', 'placeholder' => 'e.g. Jeff Bezos']) !!}
    </div>
</div>