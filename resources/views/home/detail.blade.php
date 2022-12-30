@extends('master')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <div class="card card-body">
                       <h1>{{$blog->title}}</h1>
                       <img src="{{asset($blog->image)}}" alt=""/>
                       <p class="mb-3">{{$blog->short_description}}</p>
                       <p>{{$blog->long_description}}</p>
                       <hr/>
                       <h4>Write Your Comment</h4>
                       <form action="{{route('new-blog-comment', ['id' => $blog->id])}}" method="POST">
                           <div class="row mb-3">
                               <input type="text" class="form-control" name="name">
                           </div>
                           <div class="row mb-3">
                               <textarea class="form-control" rows="8"></textarea>
                           </div>
                           <div class="row mb-3">
                               <input type="submit" class="btn btn-outline-danger" value="Comment" />
                           </div>
                       </form>
                   </div>
               </div>
            </div>
        </div>
    </section>

@endsection
