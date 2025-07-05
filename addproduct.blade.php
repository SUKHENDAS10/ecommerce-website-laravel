<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
    /* Optional custom styling */
    .form-container {
      max-width: 600px;
      margin: 50px auto;
      background: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-label {
      font-weight: 500;
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
             <div class="form-container">
      <h2 class="mb-4">Submit Details</h2>
      <form method="post" action="{{ url('uploadproduct') }}" enctype="multipart/form-data">

        @csrf
        <!-- Name Field -->
        <div class="mb-3">
          <label for="name" class="form-label">Product Title</label>
          <input type="text" class="form-control" name="name" placeholder="Enter name" required>
        </div>

        <!-- Description Field -->
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="4" placeholder="Enter description" required></textarea>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Price</label>
          <input type="text" class="form-control" name="price" placeholder="Enter name" required>
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