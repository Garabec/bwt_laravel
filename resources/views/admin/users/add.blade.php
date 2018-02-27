@extends('admin')

@section('content')

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">New user#</h3>
            </div>
    
            <form class="form-horizontal" action="{{route('admin.user.add')}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" 
                           placeholder="Enter name...">
                    
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                    <input type="email" name="email" class="form-control" 
                           placeholder="Enter email...">
                    
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}" id="password" >
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                    <input type="password" name="password" class="form-control"
                           placeholder="Enter password...">
                    
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}" id="confirm-password" >
                    <label for="password_confirmation" class="col-sm-2 control-label">Confirm password</label>
                    <div class="col-sm-4">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Enter password ...">
                    
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('role') ? 'has-error' : '' }}">
                    <label for="role" class="col-sm-2 control-label">Role</label>
                    <div class="col-sm-4">
                    <select class="form-control select2" name="role" style="width: 100%;">
                       <option value="" default selected >Please select role</option>
                       <option value="admin"    >Admin</option>
                       <option value="seller"   >Seller</option>
                  
                   </select>
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                    
                    </div>
                </div>
                
                <br>
                <div class="col-sm-2">
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >Save</button>
                </div>
            </form>
          
</div>
@stop