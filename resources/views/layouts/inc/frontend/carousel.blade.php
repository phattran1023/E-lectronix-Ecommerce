<!-- intro -->
<section class="pt-3">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
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
                    <h1 style="color: #b3040d" class="font-weight-light">COMING SOON</h1>
                    <hr>
                    <div id="countDownTime" class="tex-center font-weight-light" style="font-size: 1.5rem; color:#dbc036"></div>
                </div>
            </div>
        </aside> 
      </div>
      <!-- row //end -->
    </div>
    <!-- container end.// -->
  </section>
  <!-- intro -->
