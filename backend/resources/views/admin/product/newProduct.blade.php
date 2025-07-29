@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>New Product</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="text" class="form-label">Category Name</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $sl => $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="text" class="form-label">Brand Name</label>
                                <select name="brand_id" id="" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $sl => $brand)
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="text" class="form-label">Power</label>
                                <input type="text" name="power" class="form-control" id="">
                                @error('power')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="text" class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" id="">
                                @error('name')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="text" class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" id="">
                                @error('price')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="text" class="form-label">Discount</label>
                                <input type="number" name="discount" class="form-control" id="">
                                @error('discount')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="text" class="form-label">Photo</label>
                                <input type="file" name="photo" class="form-control" id="" onchange="document.getElementById('photo').src= window.URL.createObjectURL(this.files[0])">
                                @error('photo')
                                    <strong class="text-danger">{{$message}}</strong>
                                @enderror
                                <div class="mt-3">
                                    <img src="" alt="" id="photo" class="w-20">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary ml-4">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script>
        @if (session('product_add'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{session('product_add')}}",
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
@endsection