@extends('layouts.app')

@section('title', 'Featured Products')

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                {{-- Carousel trending products --}}
                @forelse ($featuredProducts as $item)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>

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
                                <div class="price">
                                    <span class="selling-price">{{ number_format($item->selling_price) }}
                                        VND</span>
                                    <span class="original-price">{{ number_format($item->original_price) }}
                                        VND</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-2 col-md-12">
                        <h3>No Featured Product Available</h3>
                    </div>
                @endforelse
                {{-- Carousel trending products --}}

                <div class="text-center">
                    <a href="{{url('collections')}}" class="btn btn-primary">View More</a>
                </div>

            </div>
        </div>
    </div>

@endsection
