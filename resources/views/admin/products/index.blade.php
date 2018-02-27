@extends('admin')

@section('content')
    

<h3>Products</h3>
    
    <a href="{{ route('admin.products.add')}}" class="btn btn-danger">Add Product</a>
    <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
 @foreach($products as $product)                   
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price}}</td>
                  <td>{{ $product->description}}</td>
                  <td>{{ date('Y-m-d', strtotime($product->updated_at))}}</td>
                  <td><p>
       
        <a href="{{ route('admin.products.edit', ['id'=> $product->id]) }}" class="btn btn-primary">Edit</a><br>
        <a href="{{ route('admin.products.delete', ['id'=> $product->id]) }}"  class="btn btn-danger"  onclick="return confirmDelete();">Delete</a>
                  </p></td>
                </tr>
 @endforeach                
                </tbody>
                </table>
     </div>
     
     <?php echo $products->render(); ?>
     
    

@stop