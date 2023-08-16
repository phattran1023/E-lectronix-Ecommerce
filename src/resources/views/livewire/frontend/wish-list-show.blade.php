<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div style="border-bottom:1px solid"><h3>My wishlist</h3></div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>Price</h4>
                                </div>
                                
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        {{-- show all products in wishlist table --}}
                        @forelse ($wishlist as $wishlistItem)
                            @if ($wishlistItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{url('collections/'.$wishlistItem->product->categoryGetName->slug.'/'.$wishlistItem->product->slug)}}">
                                                <label class="product-name">
                                                    <img src="{{ $wishlistItem->product->productImages[0]->image }}"
                                                        style="width: 50px; height: 50px"
                                                        alt="{{ $wishlistItem->product->name }}">
                                                    {{ $wishlistItem->product->name }}
                                                    {{-- @if ($cartItem->productColor)
                                                        <br>
                                                        @if ($cartItem->productColor->color)
                                                            <span>With color:<span class="color-square d-inline"
                                                                    style="color: {{ $cartItem->productColor->color->name }};">
                                                                    &#9632; {{ $cartItem->productColor->color->name }}
                                                                </span>
                                                            </span>
                                                        @endif
                                                    @endif --}}
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-4 my-auto">
                                            <label class="price">{{ number_format($wishlistItem->product->selling_price) }}đ </label>
                                        </div>

                                        <div class="col-md-2 col-12 my-auto">
                                            <div class="remove">
                                                <button href="" wire:click="removeWishlistItem({{$wishlistItem->id}})" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removeWishlistItem({{$wishlistItem->id}})"><i class="fa fa-trash"></i> Remove</span>
                                                    <span wire:loading wire:target="removeWishlistItem({{$wishlistItem->id}})"><i class="fa fa-trash"></i>Removing...</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        @empty
                            <h3>No wishlish item.</h3>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
