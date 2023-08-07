@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
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
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="color-tab" data-bs-toggle="tab"
                                    data-bs-target="#color-tab-pane" type="button" role="tab">
                                    Product Color</button>
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
                                            <option value="{{ $item->name }}"
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


                            <div class="tab-pane fade border d-3" id="seotag-pane" role="tabpane2"
                                aria-labelledby="seotag" tabindex="0">
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

                            <div class="tab-pane fade border d-3" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <h3>Add Product Colors</h3>
                                    <label for="">Select Color</label>
                                    <hr>

                                    <div class="row">
                                        @forelse ($colors as $item)
                                            {{-- $colors lấy từ ProductController-create-compact()  --}}
                                            <div class="col-md-3">
                                                <div class="p-2 border mb-3">

                                                    Color : <input type="checkbox" name="colors[{{ $item->id }}]"
                                                        value="{{ $item->id }}" />{{ ' ' . $item->name }}
                                                    <br>
                                                    Quantity : <input
                                                        type="number"name="colorquantity[{{ $item->id }}]"style="width: 70px; border: 1px solid">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No color found.</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>Color Name</td>
                                                    <td>Quantity</td>
                                                    <td>Delete</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product->productColors as $item)
                                                    <tr class="prod-color-tr">
                                                        <td>
                                                            @if ($item->color)
                                                                {{ $item->color->name }}
                                                            @else
                                                                No Color Found
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <div class="input-group mb-3" style="width: 150px">
                                                                <input type="text" value="{{ $item->quantity }}"
                                                                    class="productColorQuantity form-control form-control-sm">
                                                                <button type="button" value="{{ $item->id }}"
                                                                    class="updateProductColorBtn btn btn-primary btn-sm">Update</button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" value="{{ $item->id }}"
                                                                class="deleteProductColorBtn btn btn-danger btn-sm">Delete</button>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Show product's images --}}
                            <div>
                                @if ($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $item)
                                            <div class="col-md-2">
                                                <img src="{{ asset($item->image) }}" alt=""
                                                    style="width:80px; height:80px" class="me-4 border">
                                                <a href="{{ url('admin/product-image/' . $item->id . '/delete') }}"
                                                    class="d-block">Remove</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h4>No Image Added</h4>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary float-end">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- Script check xem jquery load chưa --}}
    {{-- <script>
    if (typeof jQuery == 'undefined') {
        alert('jQuery is not loaded!');
    } else {
        alert('jQuery is loaded!');
    }
</script> --}}

    <script>
        $(document).ready(function() {

            // checking for the CSRF token as a POST parameter, lấy từ laravel.com (document X-CSRF)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColorBtn', function(event) {

                event.preventDefault();

                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
                // alert(prod_color_id);

                if (qty <= 0) {
                    alert('Quantity is required');
                    return false;
                }

                var data = {
                    '_token': '{{ csrf_token() }}',
                    'product_id': product_id,
                    'prod_color_id': prod_color_id,
                    'qty': qty
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/" + prod_color_id,
                    data: data,
                    success: function(response) {
                        alert(response.message);
                    }
                });
            });



            //Delete Product's color
            $(document).on('click', '.deleteProductColorBtn', function(event) {

                event.preventDefault();
                var prod_color_id = $(this).val();
                var thisClick = $(this);
                var data = {
                    '_token': '{{ csrf_token() }}',
                };

                $.ajax({
                    type: "DELETE", // Change the request method to DELETE
                    url: "/admin/product-color/" + prod_color_id + "/delete",
                    data: data,
                    success: function(response) {
                        thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                    }
                });
            });
        });
    </script>
@endsection
