<!DOCTYPE html>
<html>

<head>
 @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    
  </div>
  <!-- end hero area -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

        <div class="col-md-10">
          <div class="box">
              <div class="img-box">
                <img width="200" src="/products/{{$data->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$data->title}}</h6>
                <h6>
                  Price
                  <span>
                    ${{$data->price}}
                  </span>
                </h6>
             
        </div>
        <div class="detail-box">
                <h6>Category:: <span> {{$data->category}}</span></h6>
                <h6>
                  Available
                  <span>
                    ${{$data->quantity}}
                  </span>
                </h6>
             
        </div>
        <div class="detail-box">
          <a class="btn btn-success" href="{{url('add_cart',$data->id)}}">Add Cart</a>
        </div>

       
        
      </div>
      
    </div>
  </section>





 

   

  <!-- info section -->

  @include('home.footer')

</body>

</html>