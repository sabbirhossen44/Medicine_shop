@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>All Category</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Category Icon</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($categories as $sl => $category)
                            <tr>
                                <td>{{$categories->firstItem() + $sl}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    <img src="{{asset('uploads/category/' . $category->icon)}}" alt="">
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-icon category_delete"
                                        data-link="{{route('category.delete', $category->id)}}">
                                        <i data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt-2 d-flex justify-content-end">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>New Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" id="">
                            @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category Icon</label>
                            <input type="file" name="icon" class="form-control" id="">
                            @error('icon')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script>
        @if (session('category_add'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('category_add')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if (session('category_delete'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('category_delete')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        $('.category_delete').click(function (e) {
            e.preventDefault();
            var link = $(this).attr('data-link');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    setTimeout(() => {
                        window.location.href = link;
                    }, 2000);
                }
            });
        })
    </script>
@endsection