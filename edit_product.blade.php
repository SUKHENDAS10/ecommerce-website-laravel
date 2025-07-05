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

         <form action="{{url('update_product',$data->id)}}" method="post" >
            @csrf
            <div class="mb-3">
          <label for="name" class="form-label">Product Title</label>
          <input type="text" class="form-control" name="name" value="{{$data->title}}">
        </div>

        <!-- Description Field -->
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="4" value="{{$data->description}}"></textarea>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Price</label>
          <input type="text" class="form-control" name="price" value="{{$data->price}}">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Quantity</label>
          <input type="text" class="form-control" name="quantity" placeholder="Enter name" required>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Product Category</label>
            <select name="category" required>
    <option value="">Select a category</option>
    <option value="electronics">Electronics</option>
    <option value="books">Books</option>
    <!-- other categories -->
</select>

        </div>
        <!-- Image Upload Field -->
        <div class="mb-3">
          <label for="image" class="form-label">Upload Image</label>
          <input class="form-control" type="file" name="image" accept="image/*" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
         </form>
         

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