@extends('layout.shop')
@section('content')


    <!-- Start Banner Area -->
    @include('layout.bannerCategory')
    <!-- End Banner Area -->
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('succes'))
            {{ \Illuminate\Support\Facades\Session::get('succes')}}
        @endif
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Categories</div>
                    <ul class="main-categories">
                        @foreach($categories as $category)
                            <li class="main-nav-list"><a href={{route('shop.filterCategory',$category->id)}}><span class="lnr lnr-arrow-right"></span>{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div class="pagination">
                        {{$products->links()}}
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <!-- single product -->
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{asset('storage/images/products/'.$product->image)}}" alt="">
                                <div class="product-details">
                                    <h6>{{$product->name}}</h6>
                                    <div class="price">
                                        <h6>${{$product->price}}</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="{{route('shop.addToCart',$product->id)}}" class="social-info">
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
                </section>

                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div class="pagination">
                        {{$products->links()}}
                    </div>
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>

    <!-- Start related-product Area -->
    @include('layout.related-product')
    <!-- End related-product Area -->

    <!-- start footer Area -->
    @include('layout.footer')
    <!-- End footer Area -->

@endsection
