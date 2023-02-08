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
                            <h2 class="text-center text-success">{{ Session::get('message') }}</h2>
                            <table class="table table-bordered table-hover" id="categoryTable">
                                <thead>
                                    <th>SL NO</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($categoris as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <img src="{{ asset($category->image) }}" alt="" height="100"
                                                    width="100">
                                            </td>
                                            <td>
                                                <a onclick="setDataToModel({{ $category }}, '{{ asset($category->image) }}')"
                                                    class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Edit</a>
                                                <a href="" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure to delete')">Delete</a>
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


    <a href=""></a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category Form</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="text-success">{{ Session::get('message') }}</h2>
                                            <form id="form"
                                                action="{{ route('category.update', ['id' => $category->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row mb-3">
                                                    <input type="text" id="id" name="id" hidden>
                                                    <label class="col-md-3">Category Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" value="{{ $category->name }}"
                                                            class="form-control" id="name" name="name" />
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-md-3">Category Description</label>
                                                    <div class="col-md-9">
                                                        <textarea type="text" class="form-control" id="description" name="description">{{ $category->description }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-md-3">Category Image</label>
                                                    <div class="col-md-9">
                                                        <input type="file" class="form-control" id="inImage"
                                                            name="image" />
                                                        <img src="{{ asset($category->image) }}" id="image"
                                                            alt="" height="100" width="100">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="updateCategory()" id="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function setDataToModel(category, img) {
            // alert(img);
            console.log(category);
            // document.getElementById('id').value = category.id;
            $("#id").val(category.id);
            $("#name").val(category.name);
            $("#description").val(category.description);
            document.getElementById('image').src = img;

        }
    </script>

    <script>
        function updateCategory() {
            // let id = document.getElementById('id').value;
            // let name = document.getElementById('name').value;
            // let description = document.getElementById('description').value;
            // let image = document.getElementById('inImage')


            var formData = new FormData();
            formData.append("id", $("[name='id']").val());
            formData.append("name", $("[name='name']").val());
            formData.append("description", $("[name='description']").val());
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
                url: '{{ route('category.update') }}',
                type: 'post',
                data: formData,

                processData: false,
                contentType: false,
                // {
                //     key: "shawon",
                //     'id': id,
                //     'name': name,
                //     'description': description,
                //     'image': image,
                //     data: formData
                // },
                success: function(data) {
                    // $("#tech-companies-1").html(data);
                    console.log(data);


                }
            });


        }
    </script>
@endsection
