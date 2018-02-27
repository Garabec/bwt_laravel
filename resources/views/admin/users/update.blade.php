@extends('admin')

@section('content')

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit user#{{$user->id}}</h3>
            </div>
    
            <form class="form-horizontal" action="{{route('admin.user.edit',$user->id)}}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-4">
                    <input type="text" name="name" class="form-control" value="{{$user->name}}"
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
                    <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled
                           placeholder="Enter email...">
                    
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}" id="password" style="display:none">
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
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}" id="confirm-password" style="display:none">
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
                       <option value="" >Please select role</option>
                       <option value="admin"   @if($user->role=="admin") selected="selected" @endif >Admin</option>
                       <option value="seller"  @if($user->role=="seller") selected="selected" @endif >Seller</option>
                  
                   </select>
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                    
                    </div>
                </div>
                 <div class="form-group " id="button-block">
                <div class="col-sm-2">
                 </div>
                <div class="col-sm-2">
                <button type="button"
                        class="btn btn-primary btn-block btn-info" id="button_user_edit"
                >Edit password</button>
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