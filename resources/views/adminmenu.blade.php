@extends('master')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Menu Information</h3><br>
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
      <button class="btn btn-primary" data-toggle="modal" data-target="#insertMenu" style="background-color: #4CAF50; border: none; color: white; padding: -5px 24px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;"><i class="uil uil-file-plus"></i> Insert Menu</button>
<table class="table table-striped">
  <thead>
    <tr>
      <th>SNo.</th>
      <th>Menu</th>
      <th>Category</th>
      <th>Description</th>
      <th>Price</th>
      <th>Image</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  @php
            $serialNumber = 1;
        @endphp
    @foreach($menus as $menu)
    <tr>
    <td>{{ $serialNumber++ }}</td>
      <td>{{ $menu->menu }}</td>
      <td>{{ $menu->category }}</td>
      <td>{{ $menu->description }}</td>
      <td>{{ $menu->price }}</td>
      <td><img src="{{ asset('foodmenuimg/'.$menu->image) }}" alt="Menu Image" width="55" height="50"></td>
      <td><a href="deletemenu/{{$menu->id}}"><i class="uil uil-trash"></i></a></td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>

<!-- Insert Menu Modal -->
<div class="modal fade" id="insertMenu" tabindex="-1" role="dialog" aria-labelledby="insertMenu" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="insertMenu">Insert Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('storeMenu') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" class="form-control" id="menu" name="menu" required>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category" required>
              <option value="">Select Category</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
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
select.form-control:not([size]):not([multiple]) {
    height: calc(3.25rem + 2px);
}

.modal-dialog {
    margin-top: 60px;
} 

</style>

@endsection
