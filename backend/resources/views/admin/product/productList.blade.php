@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Product</h4>
                </div>
                <div class="card-body">
                    <table id="myTable" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Power</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Slod Count</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $sl => $product)
                                <tr>
                                    <td>{{$sl +1}}</td>
                                    <td>{{$product -> product_name}}</td>
                                    <td>{{$product -> power}}</td>
                                    <td>{{$product -> pro_to_cat -> category_name}}</td>
                                    <td>{{$product -> price}}</td>
                                    <td>{{$product -> discount}}</td>
                                    <td>{{$product -> sold_count}}</td>
                                    <td>{{$product -> status}}</td>
                                    <td>
                                        <a href="{{route('inventory.index', $product->id)}}" class="btn btn-secondary btn-icon">
                                            <i data-feather="layers"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-icon">
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
    </div>
@endsection
@section('footer_scripts')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection