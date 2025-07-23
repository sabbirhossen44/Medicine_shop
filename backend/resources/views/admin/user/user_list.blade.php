@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>All User</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Number</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $sl => $customer)
                                <tr>
                                    <td>{{$sl + 1}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->number}}</td>
                                    <td>
                                        <img src="{{asset('uploads/users/' . $customer->photo)}}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit', $customer->id)}}" class="btn btn-secondary btn-icon">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-icon user_delete"
                                            data-link="{{route('user.delete', $customer->id)}}">
                                            <i data-feather="trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>New User</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="text" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                            @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                            @error('email')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Number</label>
                            <input type="number" name="number" id="" class="form-control">
                            @error('number')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" id="" class="form-control">
                            @error('photo')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" name="password" id="" class="form-control">
                            @error('password')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Confrim Password</label>
                            <input type="password" name="password_confirmation" id="" class="form-control">
                            @error('password_confirmation')
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
        @if (session('user_store'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('user_store')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if (session('user_delete'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('user_delete')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        $('.user_delete').click(function (e) {
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