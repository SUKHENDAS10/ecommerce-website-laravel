<!DOCTYPE html>
<html>
  <head>
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
   @include('admin.css')

  </head>
  <body>
    @include('admin.header')
    @include('admin.Sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

         <div class="container table-container">
  <h2 class="mb-4">User Information</h2>
  <table class="table table-bordered custom-table table-hover">
    <thead class="table-light">
     
      <tr>
        <th>Product Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
       @foreach($product as $pro)
      <tr>
        <td>{{$pro->title}}</td>
        <td>{{$pro->description}}</td>
        <td>{{$pro->category}}</td>
        <td>{{$pro->price}}</td>
        <td>{{$pro->quantity}}</td>
        <td>
          <img src="products/{{$pro->image}}" class="rounded-circle" width="50" height="50"/>
        </td>
<td>
         <a class="btn btn-danger" href="{{url('edit_product',$pro->id)}}">Edit</a>
          <a class="btn btn-danger" href="{{url('delete_product',$pro->id)}}">Delete</a>
       
        </td>
        @endforeach
      </tr>
      <!-- More rows as needed -->
    </tbody>
  </table>
  {{$product->links()}}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>