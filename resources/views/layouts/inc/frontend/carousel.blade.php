<!-- intro -->
<section class="pt-3">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row gx-3">
            <main class="col-lg-9">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-inner rounded-5">
                        @foreach ($sliders as $key => $item)
                            <div class="carousel-item {{ $key == '0' ? 'active' : '' }}">
                                @if ($item->image)
                                    <img src="{{ asset("$item->image") }}" class="d-block w-100" alt="..."
                                        style="max-height: 680px;">
                                @endif
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $item->title }}</h5>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!--End carousel-->
            </main>
            <aside class="col-lg-3">
                <div class="card-banner h-100 rounded-5 d-flex justify-content-center align-items-center"
                    style="background-color: #1e04b3;">
                    <div class="text-center">
                        <h1 style="color: #b3040d" class="font-weight-light">COMING SOON</h1>
                        <hr>
                        <div id="countDownTime" class="tex-center font-weight-light"
                            style="font-size: 1.5rem; color:#dbc036"></div>
                    </div>
                </div>
            </aside>
        </div>
        <!-- row //end -->



    </div>
    <!-- container end.// -->
</section>
<!-- intro -->

{{-- Trending product --}}

<div class="py-5 bg-white">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h3>Welcome to E-lectronix.com</h3>
            <div class="underline mx-auto">
            </div>
            Hmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-4"></div>
            </div>
            @if ($trendingProducts)

                <div class="col-md-12">
                    {{-- Carousel trending products --}}
                    <div class="owl-carousel owl-theme trending-product">
                        @foreach ($trendingProducts as $item)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

                                        @if ($item->productImages->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $item->categoryGetName->slug . '/' . $item->slug) }}">
                                                <img src="{{ asset($item->productImages[0]->image) }}"
                                                    alt="{{ $item->name }}">
                                        @endif
                                    </div>


                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $item->brand }}</p>
                                        <h5 class="product-name">
                                            {{-- categoryGetName là method link category_id trên bảng products đến bảng categories để lấy slug  --}}
                                            <a
                                                href="{{ url('/collections/' . $item->categoryGetName->slug . '/' . $item->slug) }}">
                                                {{ $item->name }}
                                            </a>
                                        </h5>
                                        <div class="price">
                                            <span class="selling-price">{{ number_format($item->selling_price) }}
                                                VND</span>
                                            <span class="original-price">{{ number_format($item->original_price) }}
                                                VND</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- Carousel trending products --}}

                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h3>No Product Available for {{ $category->name }}</h3>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>

{{-- End Trending product --}}
