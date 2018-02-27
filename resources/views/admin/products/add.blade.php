@extends('admin')

@section('content')

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Product#</h3>
            </div>
            <!-- /.box-header -->
           
            <!-- form start -->
            <form class="form-horizontal" action="{{route('admin.products.add')}}" method="post">
              <div class="box-body">
              <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">  
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="" placeholder="Enter ...">
                  @if ($errors->has('name'))
                     <div style="color:red">{{ $errors->first('name') }}</div>
                  @endif
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="price" value="" placeholder="Enter ...">
                  @if ($errors->has('price'))
                     <div style="color:red">{{ $errors->first('price') }}</div>
                  @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                  <textarea class="form-control" rows="3" name="description"  placeholder="Enter ..." ></textarea>
                  @if ($errors->has('description'))
                     <div style="color:red">{{ $errors->first('description') }}</div>
                  @endif
                  </div>
                </div>
                 <div class="form-group" >
                 <label for="tag" class="col-sm-2 control-label" >Tag</label>    
                  <div class="  col-sm-4 " ></div>
                </div>
                
                <div class="form-group" id="tag" style="display:none">
                  <label for="tag" class="col-sm-2 control-label" ></label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control" name="tag[]" placeholder="Enter ..." disabled>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                  
                  <select class="form-control" name="list_tag">
                 @foreach($product->getAllTags() as $tag)     
                    <option>{{$tag->name}}</option>
                 @endforeach   
                  </select>
                </div>
                  </div>
                  <div class="col-sm-1">
                      <button type="button"  id="add" class="btn btn-success pull-rigth">Add</button>
                  </div>
                  <div class="col-sm-1">
                      <button type="button" id="del"  class="btn btn-danger pull-left">Del</button>
                  </div>
                </div>
                
            
             
              <div class="form-group" id="button_tag">
                 <label for="tag" class="col-sm-2 control-label" ></label>    
                  <div class=" offset-sm-2 col-sm-4 " >
                      <button type="button" id="new_tag" class="btn btn-info pull-left">New tag</button>
                  </div>
                   @if ($errors->has('tag.0.name'))
                    <div style="color:red">{{ $errors->first('tag.0.name') }}</div>
                   @endif
              </div>
           
               
                
                
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-left">Create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>


@stop