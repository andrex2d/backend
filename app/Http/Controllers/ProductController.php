<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return response()->json($products,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->validated();
        $product = Product::create($request->all());
        return response()->json([
            'message' => 'Producto creado correctamente',
            ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            "producto" => $product,
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();
        $product->update($request->all());
        return response()->json([
            'message' => 'Producto modificado correctamente',
            ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            "message" => "Producto eliminado correctamente",
            ],200);
    }

    /**
     * restore specific product
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();

        return response()->json([
            "message" => "Se restauro correctamente",
            ],200);
    }

    /**
     * restore all products
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreAll()
    {
        Product::onlyTrashed()->restore();

        return response()->json([
            "message" => "Se restauro correctamente",
            ],200);
    }
}
