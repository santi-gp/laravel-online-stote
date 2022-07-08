<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $viewProduct = [];
        $viewProduct['title'] = 'Productos';
        $viewProduct['subtitle'] = 'Lista de productos';
        $viewProduct['products'] = Product::all();
        return view('product.index')
            ->with('viewProduct', $viewProduct);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        $viewShowProduct = [];
        $viewShowProduct['title'] = $product['name'].' Tienda Online';
        $viewShowProduct['subtitle'] = $product['name']. ' - Información';
        $viewShowProduct['product'] = $product;
        return view('product.show')->with('viewShowProduct',$viewShowProduct);
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
