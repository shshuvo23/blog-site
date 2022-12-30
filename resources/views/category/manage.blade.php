@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            All Category Information
                        </div>

                        <div class="card-body">
                            <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <th>SL NO</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($categoris as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <img src="{{asset($category->image)}}" alt="" height="100" width="100">
                                    </td>
                                    <td>
                                        <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{route('category.delete', ['id' => $category->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete')">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
