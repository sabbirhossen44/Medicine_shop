@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.info.update')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="text" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control" value="{{$admin->name}}">
                            @error('name')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Email</label>
                            <input type="email" disabled name="email" id="" class="form-control" value="{{$admin->email}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Changes Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.password.update')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control" id="">
                            @error('old_password')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="">
                            @error('password')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="">
                            @error('password_confirmation')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Admin Photo</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.photo.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="photo" class="form-label">Change Photo</label>
                            <input type="file" name="photo" class="form-control" id=""
                                onchange="document.getElementById('frofile_photo').src= window.URL.createObjectURL(this.files[0])">
                            @error('photo')
                                <strong class="text-danger">{{$message}}</strong>
                            @enderror
                            <div class="mt-3">
                                <img src="{{asset('uploads/users/'. $admin->photo)}}" id="frofile_photo" alt=""
                                    class="w-20 h-20 rounded-circle">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Photo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script>
        @if (session('info_update'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('info_update')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if (session('password_update'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('password_update')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if (session('photo'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('photo')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
        @if (session('password_not_match'))
            Swal.fire({
                position: "top-end",
                icon: "info",
                title: "{{session('password_not_match')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
@endsection