<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
      .table-container {
      margin: 50px auto;
      max-width: 900px;
    }

    .custom-table th {
      background-color: #f8f9fa;
    }

    .action-btn {
      margin-right: 5px;
    }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.Sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

           <h2 class="mb-4">User Information</h2>
  <table class="table table-bordered custom-table table-hover">
    <thead class="table-light">
     
      <tr>
        <th>Customer Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Status</th>
        <th>Change Status</th>
        <th>Print</th>
      </tr>
    </thead>
    <tbody>
       @foreach($data as $data)
      <tr>
        <td>{{$data->name}}</td>
        <td>{{$data->address}}</td>
        <td>{{$data->phone}}</td>
        <td>{{$data->product->title}}</td>
        <td>{{$data->product->price}}</td>
        <td>
          <img src="products/{{$data->product->image}}" width="150" alt="">
        </td>
        <td>
          @if($data->status=='in progess')
          <span style="color:red">{{$data->status}}</span>
         @elseif($data->status=='on the way')
          <span style="color:skyblue">{{$data->status}}</span>
        @else
        <span style="color:yellow">{{$data->status}}</span>
        @endif
        </td>
        <td><a class="btn btn-primary" href="{{url('way',$data->id)}}">On the way</a>
        <a class="btn btn-success" href="{{url('delevired',$data->id)}}">Delivered</a>
        <td><a class="btn btn-secondary" href="{{url('print',$data->id)}}">Print PDF</a></td>
    </td>
        @endforeach
        
      </tr>
      <!-- More rows as needed -->
    </tbody>
  </table>
 
</div>
        </div>  
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}]"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>