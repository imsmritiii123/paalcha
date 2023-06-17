@extends('master')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Reservation Information</h3> <br>
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 
      <button class="btn btn-primary" data-toggle="modal" data-target="#insertReservationModal" style="background-color: #4CAF50; border: none; color: white; padding: -5px 24px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;"><i class="uil uil-file-plus"></i> Insert Reservation</button>
<br>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>SNo.</th>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>No. of Guest</th>
            <th>Contact</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        @php
            $serialNumber = 1;
        @endphp
          @foreach($reservations as $reservation)
          <tr>
            <td>{{ $serialNumber++ }}</td>
            <td>{{ $reservation->r_name }}</td>
            <td>{{ $reservation->date }}</td>
            <td>{{ $reservation->time }}</td>
            <td>{{ $reservation->guest }}</td>
            <td>{{ $reservation->phone_no }}</td>
            <td><a href="{{ route('updatereservation', ['id' => $reservation->id]) }}" class="editReservation" data-id="{{ $reservation->id }}" data-toggle="modal" data-target="#editReservation"><i class="uil uil-edit"></i></a></td>
            <td><a href="{{ route('deletereservation', ['id' => $reservation->id]) }}"><i class="uil uil-trash"></i></a></td>

          </tr>
          @endforeach
        </tbody>

        


      </table>
     



      </div> 
    </div>

  </div>


  <div class="modal fade" id="editReservation" tabindex="-1" role="dialog" aria-labelledby="editReservationLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editReservationLabel">Edit Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('updatereservation', ['id' => $reservation->id]) }}" method="POST">

          @csrf
          <input type="hidden" name="id" id="editId" value="{{$reservation->id}}">
          <div class="form-group">
            <label for="editName">Name</label>
            <input type="text" class="form-control" id="editName" name="r_name" value="{{$reservation->r_name}}" required>
          </div>
          <div class="form-group">
            <label for="editDate">Date</label>
            <input type="date" class="form-control" id="editDate" name="date" value="{{$reservation->date}}" required>
          </div>
          <div class="form-group">
            <label for="editTime">Time</label>
            <input type="time" class="form-control" id="editTime" name="time" value="{{$reservation->time}}" required>
          </div>
          <div class="form-group">
            <label for="editGuest">No. of Guests</label>
            <input type="number" class="form-control" id="editGuest" name="guest" value="{{$reservation->guest}}" required>
          </div>
          <div class="form-group">
            <label for="editPhone">Contact</label>
            <input type="text" class="form-control" id="editPhone" name="phone_no" value="{{$reservation->phone_no}}" required>
          </div>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



  <div class="modal fade" id="insertReservationModal" tabindex="-1" role="dialog" aria-labelledby="insertReservationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertReservationModalLabel">Insert Reservation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Reservation form goes here -->
        <form method="POST" action="{{ route('reservations.store') }}">
          @csrf
          <div class="form-group">
            <label for="r_name">Name</label>
            <input type="text" name="r_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="time">Time</label>
            <input type="time" name="time" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="guest">No. of Guests</label>
            <input type="number" name="guest" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="phone_no">Contact Number</label>
            <input type="text" name="phone_no" class="form-control" required>
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
   width:85%;
   max-width: none;
 }
  .modal-dialog {
    margin-top: 65px;
} 
  </style>

  @endsection
