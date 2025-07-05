<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">

       @foreach($products as $pro) 
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
              <div class="img-box">
                <img src="products/{{$pro->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$pro->title}}</h6>
                <h6>
                  Price
                  <span>
                    ${{$pro->price}}
                  </span>
                </h6>
              </div style="padding:10px">
              <a class="btn btn-primary" href="{{url('product_details',$pro->id)}}">Details</a>
              <a class="btn btn-success" href="{{url('add_cart',$pro->id)}}">Add Cart</a>
          </div>
        </div>

       @endforeach
        
      </div>
      
    </div>
  </section>