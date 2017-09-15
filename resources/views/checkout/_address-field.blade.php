<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('detail') ? 'has-error' : '' !!}">
  {!! Form::label('detail', 'Address', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::textarea('detail', null, ['class'=>'form-control', 'rows' => 3]) !!}
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('city') ? 'has-error' : '' !!}">
  {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('city', null, ['class'=>'form-control', 'rows' => 3]) !!}
    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
  {!! Form::label('phone', 'Telephone', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="input-group">
      <div class="input-group-addon">+254  </div>
      {!! Form::text('phone', null, ['class'=>'form-control']) !!}
    </div>
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
  </div>
</div>
