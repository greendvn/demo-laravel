@extends('layout.shop')
@section('content')



    <!-- Start Banner Area -->
    @include('layout.bannerCart')
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        {{ \Illuminate\Support\Facades\Session::get('success')}}
                    @endif
                        @if(\Illuminate\Support\Facades\Session::has('delete_error'))
                            {{ \Illuminate\Support\Facades\Session::get('delete_error')}}
                        @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(Session::has('cart'))
                            @foreach($cart->items as $product)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('storage/images/products/'.$product['item']->image)}}" width="100px" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$product['item']->name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <h5>{{number_format($product['item']->price,0,',','.')}} VND</h5>
                            </td>
                            <form action="{{ route('shop.updateProductIntoCart', $product['item']->id) }}" method="post">
                                @csrf
                            <td>
                                <div class="product_count">
                                    <input type="number" name="qty" id="sst" maxlength="12" value="{{ $product['qty'] }}" title="Quantity:"
                                           class="input-text qty">
                                </div>
                            </td>
                            <td>
                                <h5>{{ number_format($product['price'],0,',','.')  }} VND</h5>
                            </td>
                            <td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-refresh"></i></button>
                                    <a class="btn btn-danger btn-sm" href="{{ route('shop.deleteProductIntoCart', $product['item']->id) }}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </td>
                            </form>

                        </tr>
                        @endforeach


                        <tr class="bottom_button">
                            <td>
                                <a class="gray_btn" href="#">Update Cart</a>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Coupon</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>{{number_format( $cart->totalPrice,0,',','.') }} VND</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li><a href="#">Flat Rate: $5.00</a></li>
                                        <li class="active"><a href="#">Free Shipping</a></li>
                                        <li><a href="#">Flat Rate: $10.00</a></li>
                                        <li><a href="#">Local Delivery: $2.00</a></li>
                                    </ul>
                                    <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input type="text" placeholder="Postcode/Zipcode">
                                    <a class="gray_btn" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="#">Continue Shopping</a>
                                    <a class="primary-btn" href="#">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>
                        @else
                            <tr>
                                <td colspan="5" class="text-center"><p>{{ "Bạn chưa mua sản phẩm nào" }}</p></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->


@endsection
