<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    public function index()
    {
        return ProductsResource::collection(Products::paginate());
    }

    public function store(Request $request)
    {
        $product = Products::create($request->only('title','description','image','price'));

        return response(new ProductsResource($product), Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return new ProductsResource(Products::find($id));
    }

    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->update($request->only('title','description','image','price'));

        return response(new ProductsResource($product), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Products::destroy($id);

        return \response(null, Response::HTTP_NO_CONTENT);
    }
}
