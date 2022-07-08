<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product; // import Model Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // import Storage

class AdminProductController extends Controller
{
    
    public function index()
    {
        $viewAdminProduct = [];
        $viewAdminProduct['title'] = 'Admin - Productos';
        $viewAdminProduct['subtitle'] = 'Lista de Productos';
        $viewAdminProduct['products'] = Product::all();
        return view('admin.product.index')
            ->with('viewAdminProduct', $viewAdminProduct);
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        Product::validate($request);
        $adminNewProduct = new Product();
        $adminNewProduct->name = $request->name;
        $adminNewProduct->price = $request->price;
        $adminNewProduct->description = $request->description;
        $adminNewProduct['image'] = 'game.png';
        $adminNewProduct->save();
        if ($request->hasFile('image')) {
            $imageName = $adminNewProduct->id . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $adminNewProduct->image = $imageName;
            $adminNewProduct->save();
        }
        return back();
    }

   
    public function show(Product $product)
    {
        //
    }

   
    public function edit(Product $product)
    {
        $editProduct = [];
        $editProduct['title'] = 'Admin - Editar Producto';
        $editProduct['subtitle'] = 'Editar Producto';
        //$editProduct['product'] = Product::FindOrFail($id);
        $editProduct['product'] = $product;
        return view('admin.product.edit')
            ->with('editProduct', $editProduct);
    }

   
    public function update(Request $request, Product $product)
    {
        //$updateProduct = Product::findOrFail($id);
        $updateProduct = $product;
        $updateProduct->name = $request->name;
        $updateProduct->price = $request->price;
        $updateProduct->description = $request->description;
        //$updateProduct['image'] = 'game.png';
        if ($request->hasFile('image')) {
            $imageName = $updateProduct->id . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $updateProduct->$imageName;
        }
        $updateProduct->save();
        return redirect()->route('admin.product.index');
    }

   
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
