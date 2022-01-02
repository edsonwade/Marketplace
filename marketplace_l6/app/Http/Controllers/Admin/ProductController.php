<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $products = $this->product->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        $stores = Store::all(['id', 'name']);
        return view('admin.products.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function store(Request $request)
    {
        $request->validate(

            [
                'nome' => 'required|string|min:5',
                'slug' => 'required|string|min:10',
                'description' => 'required|string|min:10',
                'body' => 'required|string|min:10',
                'price' => 'required|',
            ]);
        $store = Store::findOrFail(20);
        $product = $store->products()->create([
            'nome' => $request->input('nome'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'price' => $request->input('price'),

        ]);
        return redirect()->route('product.index')->with('message', 'new store created with success!!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $product
     *
     */
    public function show($product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $product
     * @return
     */
    public function edit($product)
    {
        $product = $this->product->findOrFail($product);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $product
     * @return
     */
    public function update(Request $request, $product)
    {
        $request->validate(

            [
                'nome' => 'required|string|min:5',
                'slug' => 'required|string|min:10',
                'description' => 'required|string|min:10',
                'body' => 'required|string|min:10',
                'price' => 'required|',
            ]);
        $product = $this->product->findOrFail($product);
        $product->update([
            'nome' => $request->input('nome'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'price' => $request->input('price'),

        ]);
        return redirect()->route('product.index')->with('message', 'product updated with success!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $product
     *
     */
    public function destroy($product)
    {
        $product = $this->product->findOrFail($product);
        $product->delete();
        return redirect()->route('product.index')->with('message', 'product deleted with success!!!!');
    }
}
