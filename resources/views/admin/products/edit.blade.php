@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                        <h4 class="alert alert-success">{{session('message')}}</h4>
                    @endif
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product
                        <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $item)
                                <div>{{ $item }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Home</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag" data-bs-toggle="tab" data-bs-target="#seotag-pane"
                                    type="button" role="tab" aria-controls="seotag-pane" aria-selected="false">SEO
                                    Tags</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">Product
                                    Image</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade border d-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control" id="">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $product->name }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" class="form-control"
                                        value="{{ $product->slug }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand" class="form-control" id="">
                                        @foreach ($brands as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $product->brand ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description</label>
                                    <textarea type="text" name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea type="text" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                                </div>
                            </div>


                            <div class="tab-pane fade border d-3" id="seotag-pane" role="tabpane2" aria-labelledby="seotag"
                                tabindex="0">
                                <div class="mb-3">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $product->meta_title }}" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                </div>
                            </div>


                            <div class="tab-pane fade border d-3" id="details-tab-pane" role="tabpane3"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Original Price</label>
                                            <input type="number" class="form-control" name="original_price"
                                                value="{{ $product->original_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Selling Price</label>
                                            <input type="number" class="form-control" name="selling_price"
                                                value="{{ $product->selling_price }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" class="form-control" name="quantity"
                                                value="{{ $product->quantity }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" style="width: 50px; height:50px;"
                                                {{ $product->trending == '1' ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" style="width: 50px; height:50px;"
                                                {{ $product->status == '1' ? 'checked' : '' }} />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade border d-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Upload Product Image</label>
                                </div>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>

                            {{-- Show product's images --}}
                            <div>
                                @if ($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $item)
                                            <div class="col-md-2">
                                                <img src="{{ asset($item->image) }}" alt=""
                                                    style="width:80px; height:80px" class="me-4 border">
                                                <a href="{{url('admin/product-image/'. $item->id.'/delete')}}" class="d-block">Remove</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h4>No Image Added</h4>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
