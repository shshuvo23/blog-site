@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{asset($blog->image)}}" alt="" height="250"/>
                        <div class="card-body">
                            <p>{{$blog->title}}</p>
                            <hr/>
                            <a href="{{route('blog-detail', ['id' => $blog->id])}}" class="btn btn-outline-success">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
