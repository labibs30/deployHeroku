@extends('dashboard.layouts.main')

@section('container')
<div class="border-bottom">
    <h1 class="mb-4">{{$title}}</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{session('success')}}
</div>
@endif
<div class="table-responsive col-lg-8">
    <a class="btn btn-primary my-3" href="/dashboard/create">Create new product</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product->p_name}}</td>
                <td>{{$product->p_price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <a class="badge bg-info" href="/dashboard/detail/{{ $product->slug }}">
                        <i class="bi bi-eye fa-lg"></i>
                    </a>
                    <a class="badge bg-warning" href="/dashboard/detail/{{$product->slug}}/edit">
                        <i class="bi bi-pencil-square fa-lg"></i>
                    </a>

                    <form action="/dashboard/crud/{{ $product->id}}" method="get" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete this')"><i class="bi bi-x-circle-fill fa-lg"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection