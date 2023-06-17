@extends('master')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Employee Information</h3><br>    
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
      <button class="btn btn-primary" data-toggle="modal" data-target="#insertEmployeeModal" style="background-color: #4CAF50; border: none; color: white; padding: -5px 24px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;"><i class="uil uil-user-plus"></i> Insert Employees</button>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>SNo.</th>
            <th>Name</th>
            <th>Post</th>
            <th>Salary</th>
            <th>Contact</th>
            <th>Address</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        @php
            $serialNumber = 1;
        @endphp
          @foreach($employees as $employee)
          <tr>
          <td>{{$serialNumber++}}</td>
            <td>{{ $employee->emp_name }}</td>
            <td>{{ $employee->post }}</td>
            <td>{{ $employee->salary }}</td>
            <td>{{ $employee->contact }}</td>
            <td>{{ $employee->address }}</td>
            <td><a href="#" class="editEmployee" data-id="{{ $employee->id }}" data-toggle="modal" data-target="#editEmployee"><i class="uil uil-edit"></i></a></td>
            <td><a href="deleteemployee/{{$employee->id}}"><i class="uil uil-trash"></i></a></td>

          </tr>
          @endforeach
        </tbody>

        


      </table>
      

      </div> 
    </div>

  </div>
      

<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="editEmployeeLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editEmployeeLabel">Edit Employee Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('update', ['id' => $employee->id]) }}">
          @csrf
          <input type="hidden" name="id" id="editId">
          <div class="form-group">
            <label for="emp_name">Employee Name:</label>
            <input type="text" class="form-control" id="editName" name="emp_name" value="{{$employee->emp_name}}">
          </div>
          <div class="form-group">
            <label for="post">Post:</label>
            <input type="text" class="form-control" id="editPost" name="post" value="{{$employee->post}}">
          </div>
          <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="text" class="form-control" id="editSalary" name="salary" value="{{$employee->salary}}">
          </div>
          <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" id="editContact" name="contact" value="{{$employee->contact}}">
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="editAddress" name="address" value="{{$employee->address}}">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    
  </div>
</div>
 </div> 
  
  <div class="modal fade" id="insertEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="insertEmployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertEmployeeModalLabel">Insert Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="{{ route('store') }}">
        @csrf
        
          <div class="form-group">
            <label for="emp_name">  Full Name</label>
            <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter Full name" required>
          </div>
          <div class="form-group">
            <label for="post">Post</label>
            <input type="text" class="form-control" id="post" name="post" placeholder="Enter post" required>
          </div>
          <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" placeholder="Enter salary" required>
          </div>
          <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact" required>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
  <style>
 body {
 
 overflow-x: hidden; /* Hide horizontal scrollbar */
}
 .container {
   margin-left: -23px;
 }
 .table {
   width:90%;
   max-width: none;
 }
  .modal-dialog {
    margin-top: 60px;
} 
  </style>

  @endsection
