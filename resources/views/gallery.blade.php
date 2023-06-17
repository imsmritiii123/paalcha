@extends('master')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Photo Gallery</h3><br>   
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
      <button class="btn btn-primary" data-toggle="modal" data-target="#addImageModal" style="background-color: #4CAF50; border: none; color: white; padding: -5px 24px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;"><i class="uil uil-image-plus"></i> Insert Photo</button>


      <div class="image-gallery">
  @foreach($galleries as $gallery)
  <div class="image-item">
    <img src="{{ asset('images/'.$gallery->image) }}" alt="alt">
    <a href="deletegallery/{{$gallery->id}}" class="delete-icon"><i class="uil uil-trash"></i></a>
  </div>
  @endforeach
</div>


      <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addImageModalLabel">Add Image to Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
          @csrf
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
   width:60%;
   max-width: none;
 }
  .modal-dialog {
    margin-top: 60px;
} 

.image-gallery {
  display: flex;
  flex-wrap: wrap;
}

.image-item {
  width: 22%; /* Each image takes 25% of the row width to display four images in a row */
  padding: 10px;
  box-sizing: border-box;
}

.image-item img {
  width: 100%;
  height: auto;
  border-radius: 8px;
}

.delete-icon {
  display: block;
  text-align: center;
  margin-top: 5px;
}

.delete-icon i {
  color: red;
}

  </style>
@endsection
  