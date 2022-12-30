@extends('master')


@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Edit Category Form</div>
                        <div class="card-body">
                            <h2 class="text-success">{{Session::get('message')}}</h2>
                            <form action="{{route('category.update', ['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" value="{{$category->name}}" class="form-control" name="name"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Category Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" name="description">{{$category->description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Category Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image"/>
                                        <img src="{{asset($category->image)}}" alt="" height="100" width="100">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success px-5" value="Update Category Info">
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

