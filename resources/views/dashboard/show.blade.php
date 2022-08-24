@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="{{ asset('storage/' . $product->image)}}" width="250" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70"> <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0"><a href="/dashboard/crud" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i> Back</a></h6>

                                <!-- <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i> -->
                            </div>
                            <div class="mt-4 mb-3">
                                <!-- <span class="text-uppercase text-muted brand">Orianz</span> -->
                                <h5 class="">{{ $product->p_name}}t</h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">Stok</span>
                                    <div class="ml-2">
                                        <small class="">{{$product->quantity}}</small>
                                    </div>
                                </div>
                            </div>
                            <!-- <p class="about">{{ $product->p_description}}</p> -->
                            {!!$product->p_description!!}

                            <!-- <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div> -->
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger mr-2 px-4">Rp {{ $product->p_price}}</button> </div>
                            <!-- <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection