@extends('layouts.admin')
@section('title', 'Create a new Category')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" />
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" />
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description" />
                                @error('description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" />
                                @error('image') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label><br>
                                <input type="checkbox"  name="status" />
                                @error('status') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12">
                                <h4>SEO TAgs</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <textarea type="text" class="form-control" name="meta_title" rows="3"></textarea>
                                @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea type="text" class="form-control" name="meta_keyword" rows="3"></textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description" />
                                @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                               <button type="submit" class="btn btn-primary float-end">Save</button>
                               
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
