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
                                <div class="exzoom_img_box ">
                                    <ul class=' exzoom_img_ul'>
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
                                    @if (session('checkWishlist') === true)
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
                        <div class="card" style="width: 100%; background-color: #7C73C0;">
                            <div class="card-header" style=" background-color: #7C73C0;">
                                <h4 style="text-align: center;" class="text-white">Comment Here</h4>
                            </div>
                            <div class="card-body mx-auto " style="width: 100%;">
                                @if (session('messageComment'))
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Fail!</strong>&nbsp; <span>{{ session('messageComment') }}</span>
                                    </div>
                                @endif
                                @if (session('reportComment'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Success!</strong>&nbsp; <span>{{ session('reportComment') }}</span>
                                    </div>
                                @endif


                                <form action="{{ url('collections/comment') }}" method="post">
                                    @csrf


                                    <div class="row">
                                        <div>
                                            <div>


                                                @if (session('avatar'))
                                                    <img src="{{ session('avatar') }}" width="30px"
                                                        style="border-radius:  50%; padding-bottom: 3px">&nbsp;
                                                @else
                                                    <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}"
                                                        width="30px" style="border-radius:  50%">&nbsp;
                                                @endif
                                                @if (Auth::user())
                                                    <strong class="text-warning">{{ Auth::user()->name }}</strong>
                                                @else
                                                    Unknow user :/
                                                @endif


                                            </div>
                                            <div>
                                                <input type="hidden" name="post_slug"value="{{ $product->slug }}">

                                                <span class="d-flex">
                                                    <div class="d-flex justify-content-start" style="width: 70%">
                                                        <input id="inputText" name="comment_body" style="width: 80%"
                                                            class="form-control" value="{{ old('comment_body') }}"
                                                            placeholder="Comment....."
                                                            oninput="updateCharacterCountdown()">

                                                    </div>

                                                    <div class="d-flex justify-content" id="countCommentBox">
                                                        @php
                                                            $commentCount = 0; //variable to count the total comment
                                                        @endphp
                                                        @foreach ($product->comments->sortByDesc('created_at') as $comment)
                                                            @php
                                                                $commentCount++; // Increment the comment count
                                                            @endphp
                                                        @endforeach

                                                        <p style="text-align: center; padding: 0 5px 0 5px">Total
                                                            Comments: {{ $commentCount }}</p>
                                                    </div>

                                                </span>
                                                <span>
                                                    <div>
                                                        <p class="text-white " style="font-weight: 20px">Characters
                                                            remaining: <span id="countdown">50&nbsp;</span></p>
                                                    </div>

                                                </span>

                                            </div>
                                        </div>

                                    </div>



                                </form>
                            </div>

                            @forelse ($product->comments->sortByDesc('created_at') as $comment)
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8">
                                        <div class=" comment-container card p-3" style="width: 100%">

                                            <div class="d-flex justify-content-between align-items-center">

                                                <div class="user d-flex flex-row align-items-center">

                                                    @if (session('avatar'))
                                                        <img src="{{ session('avatar') }}" alt=""
                                                            width="30px" style="border-radius:  50%">
                                                    @else
                                                        <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}"
                                                            width="30px" style="border-radius:  50%">
                                                    @endif
                                                    &nbsp; &nbsp;
                                                    <small class="font-weight-bold text-primary">
                                                        <strong>
                                                            @if ($comment->user)
                                                                {{ $comment->user->name }}
                                                            @endif
                                                        </strong>
                                                    </small>
                                                    &nbsp; &nbsp;
                                                    <small class="font-weight-bold">{!! $comment->comment_body !!}</small>
                                                </div>
                                                &nbsp;&nbsp;<small>{{ $comment->created_at->diffForHumans() }}</small>

                                            </div>
                                            <div class="action d-flex justify-content-between mt-2 ">
                                                <div>
                                                    @if (Auth::id() != $comment->user_id)
                                                        <button type="button" value="{{ $comment->id }}"
                                                            class="fa fa-flag text-danger reportComment"
                                                            style="text-decoration: none; border: none"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#reportModal"></button>
                                                        &nbsp;&nbsp;
                                                    @endif

                                                    <button value="{{ $comment->id }}"
                                                        class="fa fa-comments text-primary replyComment"
                                                        style="text-decoration: none; border: none"></button>
                                                    &nbsp;&nbsp;

                                                    @if (Auth::id() == $comment->user_id)
                                                        <button type="button" value="{{ $comment->id }}"
                                                            class="fa fa-trash text-danger deleteComment"
                                                            style="text-decoration: none; border: none"></button>
                                                    @endif
                                                </div>
                                                <div class=" align-items-center">
                                                    <input id="toggle-heart" type="checkbox" />
                                                    <label for="toggle-heart">❤</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <br>

                                {{-- Fake form --}}
                                <form id="commitReport"
                                    action="{{ route('storeReportComment', ['commentId' => $comment->id, 'userId' => Auth::user()->id]) }}"
                                    method="post" style="display: none">
                                    @csrf
                                    <input class="form-check-input" type="number" id="form-violence"
                                        name="form_violence">
                                    <input class="form-check-input" type="number" id="form-hate" name="form_hate">
                                    <input class="form-check-input" type="number" id="form-suicide"
                                        name="form_suicide">
                                    <input class="form-check-input" type="number" id="form-misinformation"
                                        name="form_misinformation">
                                    <input class="form-check-input" type="number" id="form-frauds"
                                        name="form_frauds">
                                    <input class="form-check-input" type="number" id="form-deceptive"
                                        name="form_deceptive">
                                    <input class="form-check-input" type="text" id="form-else" name="form_else">


                                </form>

                            @empty
                                <div class="col-md-12">No comment yet :< "Be the first one to comment" </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Pop up modal --}}
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

                <div class="modal-body " style="background: #6489e4; box-shadow: inset 0 0 10px #2c2c2b;">
                    <div class="row">
                        <div class="col-sm-8">
                            <div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch"><strong>Viloence and abuse
                                        </strong></label>{{-- Real Viloence and abuse form report --}}
                                    <input class="form-check-input violence" id="modal-violence" type="checkbox">
                                    &nbsp;&nbsp; <img src="{{ asset('/uploads/reportIcons/violence.png') }}"
                                        width="30px" style="float: right">
                                    <p></p>
                                    <hr>
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch"><strong>Hate and
                                            harassment</strong></label>{{-- Real Hate and harassment form report --}}
                                    <input class="form-check-input hate" id="modal-hate" type="checkbox">
                                    &nbsp;&nbsp; <img src="{{ asset('/uploads/reportIcons/hate.png') }}"
                                        width="30px" style="float: right">
                                    <hr>
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch"><strong>Suicide and
                                            self-harm</strong></label>{{-- Real Suicide and self-harm form report --}}
                                    <input class="form-check-input suicide" id="modal-suicide" type="checkbox">
                                    &nbsp;&nbsp; <img src="{{ asset('/uploads/reportIcons/suicide.png') }}"
                                        width="30px" style="float: right">
                                    <hr>
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label"
                                        for="mySwitch"><strong>Misinformation</strong></label>{{-- Real Misinformation form report --}}
                                    <input class="form-check-input misinformation" id="modal-misinformation"
                                        type="checkbox">
                                    &nbsp;&nbsp; <img src="{{ asset('/uploads/reportIcons/misinformation.png') }}"
                                        width="30px" style="float: right">

                                    <hr>
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch"><strong>Frauds and
                                            scams</strong></label>{{-- Real Frauds and scams form report --}}
                                    <input class="form-check-input frauds" id="modal-frauds" type="checkbox">
                                    &nbsp;&nbsp;<img src="{{ asset('/uploads/reportIcons/fraud-alert.png') }}"
                                        width="30px" style="float: right">

                                    <hr>
                                </div>
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="mySwitch"><strong>Deceptive behavior and
                                            spam</strong></label>{{-- Real Deceptive behavior and spam form report --}}
                                    <input class="form-check-input deceptive" id="modal-deceptive" type="checkbox">
                                    &nbsp;&nbsp; <img src="{{ asset('/uploads/reportIcons/deceptive.png') }}"
                                        width="30px" style="float: right">

                                    <hr>
                                </div>
                                <button id="elseBtn"
                                    style="border-radius: 15%"><strong>Else</strong></button>{{-- Real else form report --}}&nbsp;
                                <small class="text-white ">Characters
                                    remaining: <span id="countdown2">50&nbsp;</span></small>
                                <input type="text" style="display: none" id="modal-else"
                                    oninput="CharacterCountdown()" class="elseInput"
                                    placeholder="Please tell us more.......">
                                @if (session('errorElse'))
                                    <small><span class="text-danger">The words must lower than 50</span></small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4" style="border-left: solid black; text-align: center">
                            @if (session('avatar'))
                                <img src="{{ session('avatar') }}" width="30px"
                                    style="border-radius:  50%; padding-bottom: 3px">&nbsp;
                            @else
                                <img src="{{ asset('/uploads/userImg/defaultAvatar/download.jpg') }}" width="30px"
                                    style="border-radius:  50%">
                            @endif
                            @if (Auth::user())
                                <span class="comment-name"></span>
                            @endif
                            <div style="margin-top:5px">
                                <span style="padding: 4px 4px 4px 4px"
                                    class="comment-content bg-white form-control"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="commitReport()">Commit report</button>
                </div>
            </div>

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
{{-- Reply comment --}}
@section('commentReply')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $(document).on('click', '.replyComment', function() {
                var replyClick = $(this);
                var replyId = replyClick.val();
                $.ajax({
                    type: "post",
                    url: "/replyComment",
                    data: {
                        'replyId': replyId
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
{{-- Report script --}}
@section('commitReport')
    <script>
        function commitReport() {
            var modalViolence = document.getElementById("modal-violence");
            var modalHate = document.getElementById("modal-hate");
            var modalSuicide = document.getElementById("modal-suicide");
            var modalMisinformation = document.getElementById("modal-misinformation");
            var modalFrauds = document.getElementById("modal-frauds");
            var modalDeceptive = document.getElementById("modal-deceptive");
            var modalElse = document.getElementById("modal-else");

            function updateValues() {
                modalViolence.value = modalViolence.checked ? "1" : "0";
                modalHate.value = modalHate.checked ? "1" : "0";
                modalSuicide.value = modalSuicide.checked ? "1" : "0";
                modalMisinformation.value = modalMisinformation.checked ? "1" : "0";
                modalFrauds.value = modalFrauds.checked ? "1" : "0";
                modalDeceptive.value = modalDeceptive.checked ? "1" : "0";
            }

            // Add event listeners to each checkbox
            modalViolence.addEventListener("change", updateValues);
            modalHate.addEventListener("change", updateValues);
            modalSuicide.addEventListener("change", updateValues);
            modalMisinformation.addEventListener("change", updateValues);
            modalFrauds.addEventListener("change", updateValues);
            modalDeceptive.addEventListener("change", updateValues);

            // Update hidden form inputs based on modal checkbox values
            updateValues();

            // Assign checkbox values to the form inputs
            document.getElementById('form-violence').value = modalViolence.value;
            document.getElementById('form-hate').value = modalHate.value;
            document.getElementById('form-suicide').value = modalSuicide.value;
            document.getElementById('form-misinformation').value = modalMisinformation.value;
            document.getElementById('form-frauds').value = modalFrauds.value;
            document.getElementById('form-deceptive').value = modalDeceptive.value;
            document.getElementById('form-else').value = modalElse.value;

            // Submit the form
            const commit = document.getElementById('commitReport');
            commit.submit();

            // Reset the form
            commit.reset();
        }
    </script>
@endsection
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
@section('deleteComment')
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
{{-- Coutn maximum word script --}}
@section('countMaximumWords')
    <script>
        function CharacterCountdown() {
            const maxCharacters2 = 50;
            const inputText2 = document.getElementById("modal-else").value;
            const remainingCharacters2 = maxCharacters2 - inputText2.length;


            const minus20_2 = "Stop >:(";

            const countdownElement2 = document.getElementById("countdown2");
            countdownElement2.textContent = remainingCharacters2;

            if (remainingCharacters2 < 0) {

                countdownElement2.style.color = "red";

                if (remainingCharacters2 < -20) {
                    countdownElement2.textContent = minus20_2;
                    countdownElement2.style.color = "red";

                }


            } else {
                countdownElement2.style.color = "hsl(144, 70%, 64%)";
            }
        }

        function updateCharacterCountdown() {
            const maxCharacters = 50; // Change this to your desired maximum character count
            const inputText = document.getElementById("inputText").value;
            const remainingCharacters = maxCharacters - inputText.length;

            const minus10 = "Bro pay attention to your comment maximum words";
            const minus20 = "Hey you need to stop!";
            const minus25 = "Bro you letting me no choice!";
            const countdownElement = document.getElementById("countdown");
            countdownElement.textContent = remainingCharacters;

            if (remainingCharacters < 0) {
                countdownElement.textContent = minus10;
                countdownElement.style.color = "red";

                if (remainingCharacters < -20) {
                    countdownElement.textContent = minus20;
                    countdownElement.style.color = "red";

                }
                if (remainingCharacters < -25) {
                    countdownElement.textContent = minus25;
                    countdownElement.style.color = "red";
                }
                if (remainingCharacters < -30) {
                    var newUrl = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
                    window.open(newUrl, '_blank');
                }
            } else {
                countdownElement.style.color = "hsl(144, 70%, 64%)";
            }
        }
    </script>
@endsection
{{-- End  Coutn maximum word script --}}
{{-- Script for else btn --}}
@section('elseBtn')
    <script>
        // Get references to the button and input elements
        const elseBtn = document.getElementById('elseBtn');
        const elseInput = document.querySelector('.elseInput');

        // Add a click event listener to the button
        elseBtn.addEventListener('click', () => {
            // Change the display property of the input element
            elseInput.style.display = 'block';

            // Set the width style of the input element
            elseInput.style.width = '100%';

        });
    </script>
@endsection
{{-- End  Script for else btn --}}
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
