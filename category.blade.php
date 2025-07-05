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

         <form action="addcategory" method="post" >
            @csrf
            <div>
                <input type="text" name="category">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Add Category" >
            </div>
         </form>
         <div class="container table-container">
  <h2 class="mb-4">User Information</h2>
  <table class="table table-bordered custom-table table-hover">
    <thead class="table-light">
     
      <tr>
        <th>CategoryName</th>
      </tr>
    </thead>
    <tbody>
       @foreach($data as $data)
      <tr>
        <td>{{$data->categoryname}}</td>
        <td>
           <a class="btn btn-danger" href="{{url('edit_category',$data->id)}}">Edit</a>
          <a class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
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