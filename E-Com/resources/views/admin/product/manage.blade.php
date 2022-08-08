@extends('admin.master')
@section('title')
    Manage Products
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Products</h4>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <span class="text-success">{{ Session::get('message') }}</span>
                        @endif
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product name</th>
                                    <th>Category name</th>
                                    <th>Brand name</th>
                                    <th>Product Description</th>
                                    <th>Product Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" alt="" style="height: 80px; width: 80px">
                                        </td>
                                        <td>{{ $product->status == 1 ? "Published" : "Unpublished" }}</td>
                                        <td>
                                            <a href="{{ route('edit-product', ['id' => $product->id]) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('delete-product', ['id' => $product->id]) }}" onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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
@endsection
