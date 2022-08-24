@extends('user.layouts.main')
@section('container')
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="text-dark font-weight-bold">AVENYS</h1>
                <p class="lead text-muted">We aim to use the safest most effective ingredients in our skincare formulation. We believe that that all users deserve to clearly know the ingredients in their skincare and its effects.</p>
            </div>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cdn.shopify.com/s/files/1/1738/5031/files/Merdeka-Promo-MYR-01_1500x.png?v=1660572265" class="d-block w-100" alt="...">
                    <!-- <div class="carousel-caption d-none d-md-block">
                        <div class="row py-lg-5">
                            <div class="col-lg-6 col-md-8 mx-auto">
                                <h1 class="text-dark font-weight-bold">Selamat Datangs</h1>
                                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.shopify.com/s/files/1/1738/5031/files/panel-set-lengkap-skincare_1500x.png?v=1648806957" class="d-block w-100" alt="...">
                    <!-- <div class="carousel-caption d-none d-md-block">
                        <div class="row py-lg-5">
                            <div class="col-lg-6 col-md-8 mx-auto">
                                <h1 class="text-dark font-weight-bold">Selamat Datang</h1>
                                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.shopify.com/s/files/1/1738/5031/files/Kaolin-WEB-Banner_1500x.png?v=1655289458" class="d-block w-100" alt="...">
                    <!-- <div class="carousel-caption d-none d-md-block">
                        <div class="row py-lg-5">
                            <div class="col-lg-6 col-md-8 mx-auto">
                                <h1 class="fw-light">Selamat Datangs</h1>
                                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>

                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section>

    <div class="album py-5 bg-light">

        <div class="container">
            <div class="row mb-4 justify-content-center">
                <div class="col-md-6">
                    <form action="/home">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search for..." name="search" value="{{request('search')}}">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>

                    </form>
                </div>
            </div>
            @if($products->count())
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-4">
                @foreach($products as $product)
                <div class="col">
                    <div class="card shadow-sm">
                        <img style="max-height:200px" src="{{asset('storage/'.$product->image)}}" alt="{{ $product->p_name }}">
                        <!-- <svg class="bd-placeholder-img card-img-top bg-danger" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        </svg> -->

                        <div class="card-body">
                            <p class="card-text">{{ $product->p_name }}</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <!-- <a href="/{{ $product->slug }}" class="btn btn-sm btn-outline-primary">Lihat</a> -->
                                    <a href="/home/detail/{{ $product->slug }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                                    <a href="/pesan" class="btn btn-sm btn-outline-success">Pesan Sekarang</a>
                                </div>
                                <small class="text-muted">Rp {{$product->p_price}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <h2 class="text-center">Produk tidak ditemukan</h2>
            @endif

            {{$products->links()}}
        </div>
    </div>


</main>
@endsection