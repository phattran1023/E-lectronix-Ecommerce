@extends('layouts.app')

@section('title', 'Search Products')

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="col-md-12">
                <h4>Search Results</h4>
                <div class="underline mb-4"></div>
            </div>
            <div class="row justify-content-center">
                
                {{-- Carousel trending products --}}
                @forelse ($search as $item)
                    <div class="col-md-10">
                        <div class="product-card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

                                        @if ($item->productImages->count() > 0)
                                            <a
                                                href="{{ url('/collections/' . $item->categoryGetName->slug . '/' . $item->slug) }}">
                                                <img src="{{ asset($item->productImages[0]->image) }}"
                                                    alt="{{ $item->name }}"></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
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
                                            <span class="selling-price">{{ number_format($item->selling_price) }}
                                                đ</span>
                                            <span class="original-price">{{ number_format($item->original_price) }}
                                                đ</span>
                                        </div>
                                        <p style="height: 45px; white-space: nowrap; white-space: nowrap; text-overflow: ellipsis;">
                                            <b>Description:</b>{{ $item->description }}
                                        </p>
                                        <a href="{{ url('/collections/' . $item->categoryGetName->slug . '/' . $item->slug) }}"
                                            class="btn btn-outline-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-2 col-md-12">
                        <h3 class="text-center" style="height: 26.5vh">No Product Available</h3>
                    </div>
                @endforelse
                {{-- Carousel trending products --}}
                <div>
                    {{ $search->appends(request()->input())->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
