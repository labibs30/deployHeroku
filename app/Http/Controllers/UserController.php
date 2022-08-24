<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $product =  Product::latest();

        // if (request('search')) {
        //     $product->where('p_name', 'like', '%' . request('search') . '%')
        //         ->orWhere('p_description', 'like', '%' . request('search') . '%');
        // }
        return view('user.index', [
            'products' => Product::latest()->filter(request(['search']))->paginate(3),

        ]);
    }
    public function show(Product $product)
    {
        return view('user.show', [
            'product' => $product
        ]);
    }

    public function howto()
    {
        return view('user.pesan');
    }
}
