@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="firstname">Last Name</label>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="firstname">Phone Number</label>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="firstname">Address</label>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    Order Details
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)
                            @php
                            $total = $item->prod_qty * $item->products->p_price
                            @endphp
                            <tr>
                                <td>{{$item->products->p_name}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{ $item->products->p_price }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button class="btn btn-primary float-end">Process</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection