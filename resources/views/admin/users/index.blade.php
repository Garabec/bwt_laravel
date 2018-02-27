@extends('admin')

@section('content')
    

<h3>Users</h3>
    
    <a href="{{ route('admin.user.add')}}" class="btn btn-danger">Add User</a>
    <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
 @foreach($users as $user)                   
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email}}</td>
                  <td>{{ $user->role}}</td>
                  <td>{{ date('Y-m-d', strtotime($user->updated_at))}}</td>
                  <td><p>
        
        <a href="{{ route('admin.user.edit', ['id'=> $user->id]) }}" class="btn btn-primary">Edit</a><br>
        <a href="{{ route('admin.user.delete', ['id'=> $user->id]) }}"  class="btn btn-danger"  onclick="return confirmDelete();">Delete</a>
                  </p></td>
                </tr>
 @endforeach                
                </tbody>
                </table>
     </div>
     
     <?php echo $users->render(); ?>
     
     

@stop