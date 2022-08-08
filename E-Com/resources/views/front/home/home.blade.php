@extends('front.master')

@section('title')
    Home
@endsection
@section('body')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
                            @foreach($products as $product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset($product->image) }}" alt="">
                                        <div class="product-hover">
                                            <a href="{{ route('product-details', ['id' => $product->id]) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>
                                    <h2><a href="{{ route('product-details', ['id' => $product->id]) }}">{{ $product->name }}</a></h2>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
@endsection
