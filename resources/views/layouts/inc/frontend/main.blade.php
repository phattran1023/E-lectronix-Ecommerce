<section class="pt-5 pb-5">
    

    <div class="container">
        <h1 class="display-6">New Products</h1>
        <hr>
        <div class="row mb-md-2">
            @foreach ($newestProducts as $product)
                <div class="col-md-4 col-lg-3">
                    <div class="card shadow-sm border-light mb-4">
                        <a href="{{ url('collections/' . $product->categoryGetName->slug . '/' . $product->slug) }}"
                            class="position-relative">
                            <img src="{{ asset($product->productImages->first()->image) }}" class="card-img-top"
                                alt="image" height="200px">
                        </a>
                        <div class="card-body">
                            <a class="card-title"
                                href="{{ url('collections/' . $product->categoryGetName->slug . '/' . $product->slug) }}">
                                <h5 class="font-weight-normal"
                                    style="text-decoration: none; overflow:hidden; height:50px">
                                    {{ $product->name }}
                                </h5>
                            </a>
                            <div class="post-meta"><span class="small lh-120"><i
                                        class="fas fa-map-marker-alt mr-2"></i>{{ $product->brand }}</span>
                            </div>
                            <div class="d-flex my-4">
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i> <span
                                    class="badge badge-pill badge-secondary ml-2">5.0</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Price</span>
                                    <span class="h5 text-dark font-weight-bold">${{ $product->original_price }}</span>
                                </div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sale</span> <span
                                        class="h5 text-dark font-weight-bold">${{ $product->selling_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h1 class="display-6">Highest Discounts</h1>
        <hr>
        <div class="row mb-md-2">
            @foreach ($discount_Products as $product)
                <div class="col-md-4 col-lg-3">
                    <div class="card shadow-sm border-light mb-4">
                        <a href="{{ url('collections/' . $product->categoryGetName->slug . '/' . $product->slug) }}"
                            class="position-relative">
                            <img src="{{ asset($product->productImages->first()->image) }}" class="card-img-top"
                                alt="image" height="200px"> </a>
                        <div class="card-body">
                            <a class="card-title"
                                href="{{ url('collections/' . $product->categoryGetName->slug . '/' . $product->slug) }}">
                                <h5 class="font-weight-normal"
                                    style="text-decoration: none; overflow:hidden; height:50px">
                                    {{ $product->name }}</h5>
                            </a>
                            <div class="post-meta"><span class="small lh-120"><i
                                        class="fas fa-map-marker-alt mr-2"></i>{{ $product->brand }}</span></div>
                            <div class="d-flex my-4">
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i>
                                <i class="star fa fa-star text-warning"></i> <span
                                    class="badge badge-pill badge-secondary ml-2">5.0</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="col pl-0"><span class="text-muted font-small d-block mb-2">Price</span>
                                    <span class="h5 text-dark font-weight-bold">${{ $product->original_price }}</span>
                                </div>
                                <div class="col pl-0">
                                    <i class="fa fa-certificate"
                                        style="font-size: 48px; color: yellow; position: relative; display: inline-block;">
                                        <span
                                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 12px; color: red;">
                                            {{ number_format($product->discount_percent) }}%
                                        </span>
                                    </i>
                                </div>
                                <div class="col pr-0"><span class="text-muted font-small d-block mb-2">Sale</span> <span
                                        class="h5 text-dark font-weight-bold">${{ $product->selling_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">

        </div>
    </div>
</section>
