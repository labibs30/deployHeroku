@extends('dashboard.layouts.main')

@section('container')
<div class="border-bottom">
    <h1 class="mb-4">{{$title}}</h1>
</div>
<div class="container-fluid bg-white p-3">

    <form class="ml-3 mt-3 d-none d-sm-inline-block form-inline navbar-search ">
        <div class="input-group">
            <form action="/dashboard/products">
                <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </form>
        </div>
    </form>
    <div class="row center">
        @foreach( $products as $product)
        <div class="col-md-3 mb-3 mt-5">
            <div class="col">
                <div class="card h-100 text-center product_data">
                    @if($product->image)
                    <img style="max-height:200px" src="{{asset('storage/'.$product->image)}}" alt="{{ $product->p_name }}">
                    @else
                    <img src="..." class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$product->p_name}}</h5>
                        <p class="card-text">Rp. {{$product->p_price}}</p>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-4">
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                            <div class="row input-group text-center mb-3" style="width: 130px;">
                                <span class="col input-group-text decrement-btn">-</span>
                                <input type="col text" name="quantity" id="quantity" value="1" class="form-control qty-input text-center">
                                <span class="col input-group-text increment-btn">+</span>
                            </div>
                        </div>
                    </div>

                    <a href="" class="card-footer addToCartBtn" style="text-decoration:none;">Tambah</a>

                </div>
            </div>

        </div>
        @endforeach
    </div>
    <div class="ml-3">
        {{$products->links()}}
    </div>

</div>
@endsection