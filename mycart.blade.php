<!DOCTYPE html>
<html>

<head>
 @include('home.css')
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
     .form-container {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-title {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

 
    <!-- end slider section -->
  </div>
      <div class="container table-container">
  <h2 class="mb-4">User Information</h2>
    <div class="form-container">
      <h4 class="form-title">Receiver Information Form</h4>
      <form action="{{url('comfirm_order')}} " method="post">
         @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Full Name</label>
          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" name="address" rows="3" value="{{Auth::user()->address}}"></textarea>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" name="phone" value="{{Auth::user()->phone}}" >
        </div>
        <button type="submit" class="btn btn-primary w-100">Cash On Delivery</button>
        <a class="btn btn-success" href="{{url('stripe')}}">Pay Using Card</a>
      </form>
    </div>
  <table class="table table-bordered custom-table table-hover">
    <thead class="table-light">
     
      <tr>
        <th>Product Title</th>
        <th>Price</th>
        <th>Image</th>
        <th>Remove</th>
      </tr>
      <?php
            $value=0;
        ?>
    </thead>
    <tbody>
       @foreach($cart as $cart)
      <tr>
        <td>{{$cart->product->title}}</td>
        <td>{{$cart->product->price}}</td>
        <td>
          <img src="products/{{$cart->product->image}}"  width="150" />
        </td>
        <td>
           <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
        </td>
        <?php
            $value=$value+$cart->product->price;
        ?>

        @endforeach
      </tr>
      <!-- More rows as needed -->
    </tbody>
  </table>
  
</div>    
<div class="text-center pd-3">
    <h3>Total value of cart is: ${{$value}}</h3>
</div>

  <!-- info section -->

  @include('home.footer')

</body>

</html>