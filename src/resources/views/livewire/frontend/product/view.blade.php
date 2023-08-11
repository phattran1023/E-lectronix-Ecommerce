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
                                    <i class="fa fa-heart"></i> Add To Wishlist
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="container">
                <div class="row">
                    <div>
                        <div class="card" style=" background-color: #5e2fb6;">
                            <div class="card-header" style=" background-color: #5e2fb6;">
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
                                        <div class="col-sm-8">
                                            <div class="mb-3">
                                                <input type="hidden" name="post_slug"value="{{ $product->slug }}">

                                                <span>
                                                    <textarea name="comment_body" required class="form-control" rows="3" placeholder="Comment.....">{{ old('post_slug') }}</textarea>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                        </div>
                                    </div>




                                </form>

                            </div>
                            @forelse ($product->comments as $comment)
                                <div class=" row  d-flex justify-content-center">

                                    <div class="col-md-8">





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
                               No comment yet!
                            @endforelse




                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reporting {{ Auth::user()->name }}'s comment
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background: #5e2fb6">
                        <div class="row">
                            <div class="col-sm-8 ">
                                <div class="card " style="padding-left: 20px">
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
                            <div class="col-md-4">
                                <span> <img src="{{ asset('/uploads/userImg/avatarDefault/defaultAvatar.jpg') }}"
                                        width="30px" style="border-radius:  50%"></span>&nbsp;<span
                                    style="color: aliceblue">{{ Auth::user()->name }}</span>

                                <div class="card" style="margin-top: 5px">
                                    @forelse ($product->comments as $comment)
                                        <span style="padding: 3px 3px 3px 3px">{!! $comment->comment_body !!}</span>
                                    @empty
                                        No comment yet.
                                    @endforelse
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
</div>
</div>
@section('reportComment')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.reportComment',function(){
                var a = $(this);
                var reportVal = a.val();

                $.ajax({
                        type: "get",
                        url: "/displayReport",
                        data: {
                            'reportVal': reportVal
                        },
                        success: function(data) {
                           
                        }
                    });
            });
        });
    </script>
@endsection
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
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();

                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        success: function(res) {
                            if (res.status == 200) {
                                thisClicked.closest('.comment-container').remove();
                               
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
