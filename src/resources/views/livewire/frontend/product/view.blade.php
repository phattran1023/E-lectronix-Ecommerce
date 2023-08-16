<div>
    <div class="py-3 py-md-5 ">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    {{-- wire:ignore để exzoom ko bể format --}}
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImages)
                            {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img"> --}}
                            <div class="exzoom" id="exzoom">
                                <!-- Images -->
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @foreach ($product->productImages as $itemImg)
                                            <li><img src="{{ asset($itemImg->image) }}" /></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <!-- Nav Buttons -->
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn">
                                        < </a>
                                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                        @else
                            No image added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->categoryGetName->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ number_format($product->selling_price) }}đ</span>
                            <span class="original-price">{{ number_format($product->original_price) }}đ</span>
                        </div>
                        <div>
                            {{-- check if product is In stock --}}
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    {{-- Show product color selection --}}
                                    @foreach ($product->productColors as $colorItem)
                                        {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}">{{ $colorItem->color->name }} --}}
                                        <label class="colorSelectionLabel"
                                            style="background-color: {{ $colorItem->color->code }}"
                                            wire:click="colorSelected( {{ $colorItem->id }} )">{{ $colorItem->color->name }}</label>
                                    @endforeach
                                @endif
                                <div></div>
                                <div>

                                    @if ($this->prodColorSelectedQuantity == 'outOfStock')
                                        <label class="btn btn-sm py-1 text-white bg-danger">Out of Stock</label>
                                    @elseif ($this->prodColorSelectedQuantity > 0)
                                        <label class="btn btn-sm py-1 text-white bg-success">In Stock</label>
                                    @endif
                                </div>
                            @else
                                @if ($product->quantity)
                                    <label class="btn btn-sm py-1 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn btn-sm py-1 text-white bg-danger">Out of Stock</label>
                                @endif

                            @endif


                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}"
                                    class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                            <button type="button" wire:click="addToWishList( {{ $product->id }} )" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishList">
                                    @if (session('checkWishlist')===true)
                                        <i class="fa fa-heart" style="color: rgb(169, 14, 0)"></i>
                                    @else
                                        <i class="fa fa-heart"></i> Add To Wishlist
                                    @endif
                                </span>
                                <span wire:loading wire:target="addToWishList">Adding ... </span>
                            </button>

                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {!! $product->small_description !!}
                        </p>
                    </div>
                </div>
                <div class="row mt-3 mx-auto ">
                    <div class="col-md-12 mt-3" style="padding: 0;">
                        <div class="card">
                            <div class="card-header bg-white ">
                                <h4>Description</h4>
                            </div>
                            <div class="card-body">
                                <p class="">
                                    {!! $product->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div>
                        <div class="card" style=" background-color: #7C73C0;">
                            <div class="card-header" style=" background-color: #7C73C0;">
                                <h4 style="text-align: center;" class="text-white">Comment field</h4>
                            </div>
                            <div class="card-body mx-auto " style="width: 100%;">
                                @if (session('messageComment'))
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Fail!</strong>&nbsp; <span>{{ session('messageComment') }}</span>
                                    </div>
                                @endif
                                <h6 class="card card-title bg-white" style="text-align: center">Leave a comment</h6>


                                <form action="{{ url('collections/comment') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <input type="hidden" name="post_slug"value="{{ $product->slug }}">

                                                <span>
                                                    <textarea name="comment_body" required class="form-control" rows="3" placeholder="Comment.....">{{ old('post_slug') }}</textarea>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                            @forelse ($product->comments as $comment)
                                <div class=" row  d-flex justify-content-center">
                                    <div class="col-md-6">
                                        <div class=" comment-container card p-3">

                                            <div class="d-flex justify-content-between align-items-center">

                                                <div class="user d-flex flex-row align-items-center">

                                                    @if (empty(Auth::user()->userAvatar))
                                                        <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}"
                                                            width="30px" style="border-radius:  50%">&nbsp;&nbsp;
                                                    @endif
                                                    <span><small class="font-weight-bold text-primary">
                                                            <strong>
                                                                @if ($comment->user)
                                                                    {{ $comment->user->name }}
                                                                @endif
                                                            </strong>
                                                        </small>
                                                    </span>
                                                    &nbsp; &nbsp;
                                                    <span> <small
                                                            class="font-weight-bold">{!! $comment->comment_body !!}</small></span>
                                                </div>
                                                &nbsp;&nbsp;<span><small>{{ $comment->created_at->format('d/m/Y') }}</small></span>

                                            </div>
                                            <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                <div>
                                                    <button type="button" value="{{ $comment->id }}"
                                                        class="fa fa-flag text-danger reportComment"
                                                        style="text-decoration: none; border: none"
                                                        data-bs-toggle="modal" data-bs-target="#reportModal"></button>
                                                    &nbsp;&nbsp;
                                                    <button href="" class="fa fa-comments text-primary"
                                                        style="text-decoration: none; border: none"></button>
                                                    &nbsp;&nbsp;

                                                    @if (Auth::id() == $comment->user_id)
                                                        <button type="button" value="{{ $comment->id }}"
                                                            class="fa fa-trash text-danger deleteComment"
                                                            style="text-decoration: none; border: none"></button>
                                                    @endif
                                                </div>
                                                <div class="icons align-items-center">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @empty
                                <div class="col-md-12">No comment yet!</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="reportModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">



            <div class="modal-content">


                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporting @if (Auth::user())
                            <span class="comment-name text-primary"></span>'s comment
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body " style="background: #6489e4">
                    <div class="row">
                        <div class="col-sm-8 ">
                            <div class="" style="padding-left: 20px">
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch">Ngôn ngữ lăng mạ</label>
                                    <input class="form-check-input" type="checkbox" name="badWord">
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch">Spamming comment</label>
                                    <input class="form-check-input" type="checkbox" name="spamming">

                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch">Bad attitude</label>
                                    <input class="form-check-input" type="checkbox" name="badAttitude">

                                </div>

                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch">Else</label>


                                </div>
                            </div>
                        </div>


                        <div class="col-md-4" style="border-left: solid black">
                            <span> <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}"
                                    width="30px" style="border-radius:  50%"></span>&nbsp;
                            @if (Auth::user())
                                <span class="comment-name"></span>
                            @endif


                            <div class="card hmm" style="margin-top: 5px">

                                <span style="padding: 3px 3px 3px 3px" class="comment-content"></span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Commit report</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    {{-- Related Products --}}
    <div class="py-3 py-md-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Realted
                        @if ($category)
                            {{ $category->name }}
                        @endif
                        Products
                    </h4>
                    <div class="underline"></div>
                </div>

                @if ($category->relatedProducts)
                    <div class="col-md-12">
                        {{-- Carousel trending products --}}
                        <div class="owl-carousel owl-theme trending-product">
                            @foreach ($category->relatedProducts as $item)
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
                                                <span
                                                    class="original-price">{{ number_format($item->original_price) }}
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
                            <h3>No Related Product Available for {{ $category->name }}</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Report script --}}
@section('reportComment')
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.reportComment', function() {
                var reportClick = $(this);
                var comment_id = reportClick.val();
                $.ajax({
                    type: "get",
                    url: "/takeCommentInfor",
                    data: {
                        'comment_id': comment_id
                    },
                    success: function(res) {
                        if (res.status == 200) {

                            $(".comment-content").text(res.comment.comment_body);
                            $(".comment-name").text(res.user.name);
                        } else {
                            alert(res.message);
                            $(".modal").modal('hide');
                        }
                    }
                });
            });
        });
    </script>
@endsection
{{-- Deleting script --}}
@section('commentScript')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.deleteComment', function() {
                if (confirm('Are you sure deleting this comment?')) {
                    var deleteClick = $(this);
                    var comment_id = deleteClick.val();

                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        success: function(res) {
                            if (res.status == 200) {
                                deleteClick.closest('.comment-container').remove();

                            } else {
                                alert(res.message);
                            }
                        }
                    });
                }
            });
        });
    </script>
    <script></script>
@endsection

{{-- Realted Product Carousel Script --}}
@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 15,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection

{{-- Script call zooom img --}}
@push('scripts')
    <script>
        $(function() {

            $("#exzoom").exzoom({

                // thumbnail nav options
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,

                // autoplay
                "autoPlay": false,

                // autoplay interval in milliseconds
                "autoPlayTimeout": 2000

            });

        });
    </script>
@endpush
