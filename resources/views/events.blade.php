@extends('master')


@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Events</h3><br>

      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif 

      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Date</th>
            <th>Image</th>
            <th>Description</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($events as $events)
          <tr>
            <td>{{ $events->id }}</td>
            <td>{{ $events->title }}</td>
            <td>{{ $events->date }}</td>
            <td><img src="{{ asset('images/'.$events->image) }}" alt="alt" width="150" height="90"></td>
            <td class="description-column">{{ $events->description }}</td>
            <td>
                <a href="#" data-toggle="modal" data-target="#editModal{{ $events->id }}">
                    <i class="uil uil-edit"></i>
                </a>
            </td>
          </tr>
            <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $events->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $events->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $events->id }}">Edit Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('event.update', $events->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $events->title }}">
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" name="date" value="{{ $events->date }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ $events->description }}</textarea>
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
        <!-- End Edit Modal --> 
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
   margin-left: -23px;
 }
 .table {
   width:90%;
   max-width: none;
 }
  .modal-dialog {
    margin-top: 100px;
} 
  </style>
@endsection
