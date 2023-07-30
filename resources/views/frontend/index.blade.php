@extends('layouts.app')

@section('title', 'Home page')

@section('content')
<!-- intro -->
<section class="pt-3">
  <div class="container">
    <div class="row gx-3">
      <main class="col-lg-9">
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-inner rounded-5">
              @foreach ($sliders as $key => $item)
                  <div class="carousel-item {{$key == '0' ? 'active':''}}">
                      @if ($item->image)
                          <img src="{{ asset("$item->image") }}" class="d-block w-100" alt="..." style="max-height: 680px;">
                      @endif
                      <div class="carousel-caption d-none d-md-block">
                          <h5>{{ $item->title }}</h5>
                          <p>{{ $item->description }}</p>
                      </div>
                  </div>
              @endforeach
          </div>
        
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!--End carousel-->
      </main>
      <aside class="col-lg-3">
          <div class="card-banner h-100 rounded-5 d-flex justify-content-center align-items-center" style="background-color: #1e04b3;">
              <div class="text-center">
                  <h1 style="color: #b3040d">COMING SOON</h1>
                  <hr>
                  <p id="countDownTime" style="font-size: 30px; color: #b34715;"></p>
              </div>
          </div>
      </aside> 
    </div>
    <!-- row //end -->
  </div>
  <!-- container end.// -->
</section>
<!-- intro -->

  <section>
      <div class="container my-5">
          <header class="mb-4">
              <h3>New products</h3>
          </header>

          <div class="row">
              @foreach($newestProducts as $product)
              <div class="col-md-3 d-flex">
                  <div class="card mb-4 shadow-sm flex-fill">
                      <!-- Add Bootstrap card classes -->
      
                      <!-- Remove the ribbon code for simplicity -->
                      
                      <!-- Card body -->
                      <div class="card-body">
                          <!-- Add image div here -->
                          <div class="d-flex justify-content-center">
                              <img src="{{ asset($product->productImages->first()->image) }}" alt="" style="max-width: 100%; max-height: 150px;">
                          </div>
                          
                          <h5 class="card-title">{{ $product->brand }}</h5>
                          <p class="card-text">{{ $product->name }}</p>
      
                          <!-- Add Bootstrap classes for pricing -->
                          <div class="row">
                              <div class="d-flex justify-content-between align-items-center col">
                                  <div>
                                      <strike class="text-muted">${{ $product->original_price }}</strike>
                                      <span class="ml-2"> - ${{ $product->selling_price }}</span>
                                  </div>
                              </div>
          
                              <!-- Add Bootstrap classes for rating -->
                              <div class="d-flex align-items-end flex-column bd-highlight mb-3 col">
                                  <div class="text-muted">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </section>
  <!-- Products -->
  <section>
    <div class="container my-5">
        <header class="mb-4">
            <h3>Highest Discounts</h3>
        </header>

        <div class="row">
            @foreach($discount_Products as $product)
            <div class="col-md-3 d-flex">
                <div class="card mb-4 shadow-sm flex-fill">
                    <!-- Add Bootstrap card classes -->
    
                    <!-- Remove the ribbon code for simplicity -->
                    
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Add image div here -->
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset($product->productImages->first()->image) }}" alt="" style="max-width: 100%; max-height: 150px;">
                        </div>
                        <i class="fa fa-certificate" style="font-size: 48px; color: yellow; position: relative; display: inline-block;">
                            <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 12px; color: red;">
                                {{ number_format($product->discount_percent) }}%
                            </span>
                        </i>
                        <h5 class="card-title">{{ $product->brand }}</h5>
                        <p class="card-text">{{ $product->name }}</p>
    
                        <!-- Add Bootstrap classes for pricing -->
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center col">
                                <div>
                                    <strike class="text-muted">${{ $product->original_price }}</strike>
                                    <span class="ml-2"> - ${{ $product->selling_price }}</span>
                                </div>
                            </div>
        
                            <!-- Add Bootstrap classes for rating -->
                            <div class="d-flex align-items-end flex-column bd-highlight mb-3 col">
                                <div class="text-muted">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
  
  
@endsection
