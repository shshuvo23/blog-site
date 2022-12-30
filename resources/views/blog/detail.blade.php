@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Blog Detail Information
                        </div>

                        <div class="card-body">
                            <h2 class="text-center text-success">{{Session::get('message')}}</h2>
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Blog Id</th>
                                    <td>{{$blog->id}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Title</th>
                                    <td>{{$blog->title}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Category</th>
                                    <td>{{$blog->category->name}}</td>
                                </tr>
                                <tr>
                                    <th>Blog short Description</th>
                                    <td>{{$blog->short_description}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Long Description</th>
                                    <td>{{$blog->long_description}}</td>
                                </tr>
                                <tr>
                                    <th>Blog Image</th>
                                    <td>
                                        <img src="{{asset($blog->image)}}" alt="" height="100">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Blog Publication Status</th>
                                    <td>{{$blog->status}}</td>
                                </tr>
                                <tr>
                                    <th>Total Hit Count</th>
                                    <td>{{$blog->hit_count}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
