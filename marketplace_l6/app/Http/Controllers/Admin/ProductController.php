<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        //
    }
}
