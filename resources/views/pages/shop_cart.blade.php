@extends('layout.index')
@section('content')
    

    <!-- Breadcrumb Section Begin -->

    <!-- Breadcrumb Section End -->


 
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>

                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_oders as $cart)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <h5>{{substr($cart->products->name,0,50)}}</h5><br>
                                        <img style="width: 100px; height:100px" src="uploads/products/{{$cart->products->image}}" alt="">
                                    </td>
                                    
                                    <td class="shoping__cart__price">
                                        {{number_format($cart->products->unit_price).'$'}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="quantity" value="{{$cart->quantity}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{number_format($cart->products->unit_price * $cart->quantity ).'$'}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('user_shop')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <button type="submit" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            @foreach ($list_oders as $oders)
                                <li>{{substr($oders->products->name,0,50)}}<span>{{number_format($oders->products->unit_price * $oders->quantity).'$' }}</span></li>
                            @endforeach

                            <li>Total<span>{{number_format($list_oders->sum('total')).'$'}}</span></li>

                        </ul>
                        <a href="{{route('check_out')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    @endsection



