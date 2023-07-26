<div>
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
                            <a href="{{ url('/collections/' . $item->categoryGetName->slug . '/' . $item->slug) }}">
                                <img src="{{ asset($item->productImages[0]->image) }}" alt="{{ $item->name }}">
                        @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{ $item->brand }}</p>
                        <h5 class="product-name">
                            {{-- categoryGetName là method link category_id trên bảng products đến bảng categories để lấy slug  --}}
                            <a href="{{ url('/collections/' . $item->categoryGetName->slug . '/' . $item->slug) }}">
                                {{ $item->name }}
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">${{ $item->selling_price }}</span>
                            <span class="original-price">${{ $item->original_price }}</span>
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
