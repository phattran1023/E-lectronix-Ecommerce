<div>
    <div class="row">
        <div class="col-md-2">
            @if ($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h3>Brands</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $brandItem)
                            <label class="d-block">
                                <input type="checkbox" wire:model="brandInputs"
                                    value="{{ $brandItem->name }}">{{ $brandItem->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h3>Price</h3>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" wire:model="priceInput"
                            value="high-to-low" name="priceSort">High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" wire:model="priceInput"
                            value="low-to-high" name="priceSort">Low to High
                    </label>
                </div>
            </div>


        </div>
        <div class="col-md-10">
            <div class="row">
                @forelse ($products as $item)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($item->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif

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
                                <div>
                                    <span class="selling-price">{{ number_format($item->selling_price) }} VND</span>
                                    <span class="original-price">{{ number_format($item->original_price) }} VND</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h3>No Product Available for {{ $category->name }}</h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
