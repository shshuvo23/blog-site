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
                            <h2 class="text-center text-success">{{ Session::get('message') }}</h2>
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
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->category->name }}</td>
                                            <td>
                                                <img src="{{ asset($blog->image) }}" alt="" height="100"
                                                    width="100">
                                            </td>
                                            <td>{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
                                                <a href="{{ route('blog.show', $blog->id) }}"
                                                    class="btn btn-success btn-sm">Detail</a>
                                                <a href="" onclick="setValue({{ $blog }}, '{{ asset($blog->image) }}')"
                                                    class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Edit</a>

                                                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onsubmit="return confirm('Are you sure to delete')">Delete</button>
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Blog Form</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center text-success">{{ Session::get('message') }}</h2>
                            <form action="{{ route('blog.update', $blog->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <input type="text" id="id" name="id" hidden>

                                    <label for="category_id" class="col-md-3">category Name</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option id="category_id"> -- Category Name -- </option>
                                            @foreach ($categories as $category)
                                                <option id="option{{ $category->id }}" value="{{ $category->id }}"
                                                    {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Blog Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="title" value="{{ $blog->title }}" class="form-control"
                                            name="title" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Short Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" id="short_description" name="short_description">{{ $blog->short_description }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Long Description</label>
                                    <div class="col-md-9">
                                        <textarea type="text" class="form-control" id="long_description" name="long_description">{{ $blog->long_description }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3">Blog Image</label>
                                    <div class="col-md-9">
                                        <input type="file" id="inImage" class="form-control" name="image" />
                                        <img src="{{ asset($blog->image) }}" id="image" alt="" height="100" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="updateBlog()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function setValue(blog, img){
            $("#id").val(blog.id);
            // $("#category_id").val(blog.category_id);
            document.getElementById('option' + blog.category_id).selected = true;
            $("#title").val(blog.title);
            $("#short_description").val(blog.short_description);
            $("#long_description").val(blog.long_description);
            $("#description").val(blog.description);
            document.getElementById('image').src = img;
        }
    </script>


<script>
    function updateBlog() {
        // let id = document.getElementById('id').value;
        // let name = document.getElementById('name').value;
        // let description = document.getElementById('description').value;
        // let image = document.getElementById('inImage')


        var formData = new FormData();
        formData.append("id", $("[name='id']").val());
        formData.append("category_id", $("[name='category_id']").val());
        formData.append("title", $("[name='title']").val());
        formData.append("short_description", $("[name='short_description']").val());
        formData.append("long_description", $("[name='long_description']").val());
        // console.log($('#inImage'));
        var image = $('#inImage')[0].files[0];

        formData.append('image', image);

        // formData.append("image", $("#inImage")[0].files[0]);
        // console.log(formData);
        // console.log('Image value: ', image);
        // return


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: '/blog',
            type: 'post',
            data: formData,

            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
            }
        });


    }
</script>
@endsection
