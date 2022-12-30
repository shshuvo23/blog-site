@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Blog Information
                        </div>

                        <div class="card-body">
                            <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <th>SL NO</th>
                                <th>Blog Title</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->category->name}}</td>
                                        <td>
                                            <img src="{{asset($blog->image)}}" alt="" height="100" width="100">
                                        </td>
                                        <td>{{$blog->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            <a href="{{route('blog.show', $blog->id)}}" class="btn btn-success btn-sm">Detail</a>
                                            <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-success btn-sm">Edit</a>

                                            <form action="{{route('blog.destroy', $blog->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onsubmit="return confirm('Are you sure to delete')">Delete</button>
                                            </form>

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
