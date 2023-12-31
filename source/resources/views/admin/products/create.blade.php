@extends('layouts.admin')
@section('title', 'Create New Product')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product
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
                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Tab List --}}
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
                                    data-bs-target="#color-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">Product
                                    Color</button>
                            </li>

                        </ul>


                        {{-- Tab Contents --}}
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade border d-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control" id="">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Product Slug</label>
                                    <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Select Brand</label>
                                    <select name="brand" class="form-control" id="">
                                        @foreach ($brands as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Small Description</label>
                                    <textarea id="editor1" type="text" name="small_description" value="{{ old('small_description') }}" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea id="editor2" type="text" name="description" value="{{ old('description') }}" class="form-control" rows="4"></textarea>
                                </div>
                            </div>


                            <div class="tab-pane fade border d-3" id="seotag-pane" role="tabpane2"
                                aria-labelledby="seotag" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Meta Tile</label>
                                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Description</label>
                                    <textarea type="text" name="meta_description" value="{{ old('meta_description') }}" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Meta Keyword</label>
                                    <textarea type="text" name="meta_keyword" value="{{ old('meta_keyword') }}" class="form-control" rows="4"></textarea>
                                </div>
                            </div>


                            <div class="tab-pane fade border d-3" id="details-tab-pane" role="tabpane3"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Original Price</label>
                                            <input type="number" class="form-control" name="original_price" value="{{ old('original_price') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Selling Price</label>
                                            <input type="number" class="form-control" name="selling_price" value="{{ old('selling_price') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" style="width: 50px; height:50px;" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Featured</label>
                                            <input type="checkbox" name="featured" style="width: 50px; height:50px;" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status" style="width: 50px; height:50px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade border d-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Upload Product Image</label>
                                    <input type="file" name="image[]" multiple class="form-control">

                                </div>
                            </div>
                            <div class="tab-pane fade border d-3" id="color-tab-pane" role="tabpanel"
                                aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
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
                                                    Quantity : <input type="number"
                                                        name="colorquantity[{{ $item->id }}]"
                                                        style="width: 70px; border: 1px solid">
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h1>No color found.</h1>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const divIds = ["editor1", "editor2"];

            divIds.forEach(divId => {
                ClassicEditor
                    .create(document.querySelector(`#${divId}`))
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
@endsection
