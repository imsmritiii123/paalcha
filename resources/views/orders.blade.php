@extends('master')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Order Details</h3>     
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<br>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>SNo.</th>
            <th>Customer name</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Time</th>
            <th>Total</th>
            <th>Phone</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        @php
            $serialNumber = 1;
        @endphp
        @foreach($orders as $order)
                            <tr>
                            <td>{{ $serialNumber++ }}</td>
                                <!-- <td>{{ $order->id }}</td> -->
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->menu_item }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->time }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->phone }}</td>
                                <td><a href="deleteorder/{{$order->id}}"><i class="uil uil-trash"></i></a></td>

                            </tr>
                            @endforeach
        </tbody>
      </table>
     </div>
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
    width:85%;
    max-width: none;
  }

  </style>
@endsection
