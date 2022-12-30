@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">Add Category Form</div>
                        <div class="card-body">
                            <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                            <form action="{{ route('category.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">category Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Category Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" name="description"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Category Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-outline-success px-5" value="Create New Category">
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
