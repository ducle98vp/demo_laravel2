@extends('page.layouts.main')
@section('content')
<script type="text/javascript">
    function updateCart(rowId,quality)
    {
        $.get(
            "{{Route('cart.update')}}",
            {quality:quality,rowId:rowId},
            function()
            {
                location.reload();
            }
        );
    }
</script>
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inner">
                    <ul>
                        <li class="home">
                            <a href="index.html">Home</a>
                            <span><i class="fa fa-angle-right"></i></span>
                        </li>
                        <li class="category3"><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<!-- Shopping Table Container -->
<div class="cart-area-start">
    <div class="container">
    <form method="POST" action="{{Route('cart.update')}}">
        <!-- Shopping Cart Table -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Product name</th>
                                <th>Edit</th>
                                <th>Unit Price</th>
                                <th>Quality</th>
                                <th>Subtotal</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                <a href="#"><img src="/assets/uploads/{{$product->options->avatar}}" class="img-responsive" alt=""/></a>
                                </td>
                                <td>
                                <h6>{{$product->name}}</h6>
                                </td>
                                <td><a href="#">Edit</a></td>
                                <td>
                                <div class="cart-price">{{$product->price}}đ</div>
                                </td>
                                <td>
                                    
                                    <input type="number" value="{{$product->qty}}" name="quality" onchange="updateCart('{{$product->rowId}}',this.value)">
                                    
                                </td>
                                <td>
                                <div class="cart-subtotal">{{$product->price*$product->qty}}</div>
                                </td>
                            <td><a href="{{Route('cart.delete',$product->rowId)}}"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @endforeach
                           
                            <tr>
                                <td class="actions-crt" colspan="7">
                                    <div class="">
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-left"><a class="cbtn" href="#">Continue Shopping</a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 align-right"><a class="cbtn" href="#">CLEAR SHOPPING CART</a></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </form>
        <!-- Shopping Cart Table -->
        <!-- Shopping Coupon -->
        <div class="row">
            <div class="col-md-12 vendee-clue">
                <!-- Shopping Estimate -->
                <div class="shipping coupon">
                    <h5>Estimate Shipping and Tax</h5>
                    <p>Enter your destination to get a shipping estimate.</p>
                    <form>
                        <div class="shippingTitle"><p><span>*</span>Country</p></div>
                        <div class="selectOption">
                            <div class="selectParent">
                                <select>
                                    <option value="">Please Select</option>
                                    <option value="1">Country 1</option>
                                    <option value="2">Country 2</option>
                                    <option value="1">Country 3</option>
                                    <option value="2">Country 4</option>
                                    <option value="1">Country 5</option>
                                    <option value="2">Country 6</option>
                                    <option value="1">Country 7</option>
                                    <option value="2">Country 8</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="shippingTitle"><p>State/Province</p></div>
                        <div class="selectOption">
                            <div class="selectParent">
                                <select>
                                    <option value="">Please Select</option>
                                    <option value="1">Region 1</option>
                                    <option value="2">Region 2</option>
                                    <option value="1">Region 3</option>
                                    <option value="2">Region 4</option>
                                    <option value="1">Region 5</option>
                                    <option value="2">Region 6</option>
                                    <option value="1">Region 7</option>
                                    <option value="2">Region 8</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="shippingTitle"><p>Zip/Postal Code</p></div>
                        <div class="selectOption">
                            <input type="text">
                        </div>
                        <button type="submit">Get Quotes</button>
                    </form>
                </div>
                <!-- Shopping Estimate -->
                <!-- Shopping Code -->
                <div class="shipping coupon hidden-sm">
                    <div class=""><h5>Discount Codes</h5></div>
                    <p>Enter your coupon code if you have one.</p>
                    <form>
                        <input type="text" class="coupon-input">
                        <button class="pull-left" type="submit">APPLY COUPON</button>
                    </form>
                </div>
                <!-- Shopping Code -->
                <!-- Shopping Totals -->
                <div class="shipping coupon cart-totals">
                    <ul>
                    <li class="cartSubT">Subtotal:    <span>{{Cart::total()}}</span></li>
                        <li class="cartSubT">Grand total:    <span>$50.00</span></li>
                    </ul>
                    <a class="proceedbtn" href="#">PROCEED TO CHECK OUT</a>
                    <div class="multiCheckout">
                        <a href="#">Checkout with Multiple Addresses</a>
                    </div>
                </div>
                <!-- Shopping Totals -->
            </div>
        </div>
        <!-- Shopping Coupon -->
    </div>	
</div>
<!-- Shopping Table Container -->
@endsection