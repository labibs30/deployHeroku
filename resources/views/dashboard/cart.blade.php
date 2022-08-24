@extends('dashboard.layouts.main')

@section('container')
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                        <h6 class="mb-0 text-muted">
                                            @if(count($cartitems) > 0)
                                            {{count($cartitems)}} Products
                                            @else
                                            {{count($cartitems)}} Product
                                            @endif
                                        </h6>
                                    </div>
                                    <hr class="my-4">
                                    @php
                                    $total = 0;
                                    $totalQty=0;
                                    @endphp
                                    @foreach($cartitems as $cartitem)
                                    <div class="row mb-4 d-flex justify-content-between align-items-center product_data">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="{{asset('storage/' . $cartitem->products->image)}}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted">{{$cartitem->products->p_name}}</h6>
                                        </div>
                                        <!--  -->
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-4">
                                                <input type="hidden" value="{{$cartitem->prod_id}}" class="prod_id">
                                                <div class="input-group text-center mb-3" style="width: 130px;">
                                                    <span class="input-group-text changeQuantity decrement-btn">-</span>
                                                    <input type="text" name="quantity" id="quantity" value="{{$cartitem->prod_qty}}" class="form-control qty-input text-center">
                                                    <span class="input-group-text changeQuantity increment-btn">+</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-3">Rp {{$cartitem->products->p_price}}</h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <button type="button" class="btn btn-danger delete-cart-item  mb-3"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                                    @php
                                    $total += $cartitem->products->p_price * $cartitem->prod_qty ;
                                    $totalQty += $cartitem->prod_qty;
                                    @endphp
                                    @endforeach

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="/dashboard/products" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i> Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">Total Items</h5>
                                        <h5>{{$totalQty}}</h5>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>Rp {{$total}}</h5>
                                    </div>

                                    <a href="/checkout" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Checkout</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection