@extends('master')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Customer Information</h3>     
<br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>SNo.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
          </tr>
        </thead>
        <tbody>
        @php
            $serialNumber = 1;
        @endphp
          @foreach($users as $user)
          <tr>
          <td>{{ $serialNumber++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
</div>
</div>
<style>
      body {
 
 overflow-x: hidden; /* Hide horizontal scrollbar */
}
 .container {

   /* display: flex;
   width:100%; */
   margin-left: -23px;
   /* padding-top:75px;
   justify-content: center; */
 }
 .table {
   /* font-size: 16px; */
   width:80%;
   max-width: none;
 }
  </style>

      @endsection
