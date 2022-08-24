<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products', [
            'title' => 'Halaman | Produk',
            'products' => Product::latest()->filter(request(['search']))->paginate(5),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'p_name' => 'required|max:255',
            'slug' => 'required|unique:products',
            'p_price' => 'required',
            'quantity' => 'required',
            'image' => 'image|file|max:2048',
            'p_description' => 'required'
        ]);
        $validatedData['p_excerpt'] = Str::limit(strip_tags($request->p_description), 200);

        try {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->store('storage/post-images', $fileName);
            $validatedData['image'] = $path;
            $response = Product::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'sucecss',
                'data' => $response
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Err',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function updating(Request $request, $id)
    {
        $validatedData = $request->validate([
            'p_name' => 'required|max:255',
            'slug' => 'required|unique:products',
            'p_price' => 'required',
            'quantity' => 'required',
            // 'image' => '',
            'p_description' => 'required'
        ]);
        $validatedData['p_excerpt'] = Str::limit(strip_tags($request->p_description), 200);

        try {
            // if ($request->file('image')) {
            //     $fileName = time() . $request->file('image')->getClientOriginalName();
            //     $path = $request->file('image')->store('storage/post-images', $fileName);
            //     $validatedData['image'] = $path;
            // }
            $response = Product::find($id);
            $response->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'sucecss',
                'data' => $response
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Err',
                'error' => $e->getMessage()
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.show', [
            'product' => $product
        ]);
    }
    public function test()
    {
        $data = Product::paginate(1);

        return response()->json($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        return view('dashboard.edit', [
            'title' => 'Halaman | Edit Produk',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        // return $products;
        $rules = [
            'p_name' => 'required|max:255',
            'p_price' => 'required',
            'quantity' => 'required',
            'image' => 'image|file|max:2048',
            'p_description' => 'required'
        ];

        if ($request->slug != $products->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['p_excerpt'] = Str::limit(strip_tags($request->p_description), 200);
        Product::where('id', $products->id)->update($validatedData);

        return redirect('/dashboard/crud')->with('success', 'Produk baru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        try {
            $product = Product::find($id);
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
            //code...
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Err',
                'error' => $e->getMessage()
            ]);
        }
        //
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
