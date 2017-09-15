{!! Form::open(['url' => '/checkout/login', 'method'=>'post', 'class' => 'form-horizontal']) !!}

    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
      {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>
    </div>

    <!-- <div class="form-group {!! $errors->has('is_guest') ? 'has-error' : '' !!}">
      <div class="col-md-6 col-md-offset-4 radio">
        <p><label>{{ Form::radio('is_guest', 1, true) }} Guest</label></p>
        <p><label>{{ Form::radio('is_guest', 0) }} Not a Guest</label></p>
        {!! $errors->first('is_guest', '<p class="help-block">:message</p>') !!}
      </div>
    </div> -->

    <div class="form-group {!! $errors->has('checkout_password') ? 'has-error' : '' !!}">
      {!! Form::label('checkout_password', 'Password', ['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {!! Form::password('checkout_password', ['class'=>'form-control']) !!}
        {!! $errors->first('checkout_password', '<p class="help-block">:message</p>') !!}
        <a href="{{ url('/password/reset')}}">Reset Password?</a>
      </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::button('Login <i class="fa fa-arrow-right"></i>', array('type' => 'submit', 'class' => 'btn btn-primary')) !!}
        </div>
    </div>
{!! Form::close() !!}
