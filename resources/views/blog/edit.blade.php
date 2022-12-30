@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Edit Blog Form</div>
                        <div class="card-body">
                            <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label class="col-md-3">category Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="category_id">
                                            <option> -- Category Name -- </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $blog->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Blog Title</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$blog->title}}" class="form-control" name="title"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" name="short_description">{{$blog->short_description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Long Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" name="long_description">{{$blog->long_description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Blog Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image"/>
                                        <img src="{{asset($blog->image)}}" alt="" height="100"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success px-5" value="Update Blog">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
