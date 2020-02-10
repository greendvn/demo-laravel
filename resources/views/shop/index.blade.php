@extends('layout.shop')
@section('content')

    <!-- start banner Area -->
    @include('layout.bannerIndex')
    <!-- End banner Area -->

    <!-- start features Area -->
    @include('layout.features')
    <!-- end features Area -->

    <!-- Start category Area -->
{{--    @include('layout.category')--}}
    <!-- End category Area -->

    <!-- start product Area -->
        <!-- single product slide -->
        <div class="single-product-slider">
            <div class="container">
                @if(\Illuminate\Support\Facades\Session::has('succes'))
                    {{ \Illuminate\Support\Facades\Session::get('succes')}}
                @endif
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="section-title">
                            <h1>Latest Products</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore
                                magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                    <!-- single product -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{asset('storage/images/products/'.$product->image)}}" alt="">
                            <div class="product-details">
                                <h6>{{$product->name}}</h6>
                                <div class="price">
                                    <h6>${{$product->price}}</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="{{ route('shop.addToCart', $product->id) }}" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
        <!-- single product slide -->




    <!-- end product Area -->

    <!-- Start exclusive deal Area -->
{{--    @include('layout.exclusive')--}}
    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->
    @include('layout.branch')
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    @include('layout.related-product')
    <!-- End related-product Area -->


@endsection
