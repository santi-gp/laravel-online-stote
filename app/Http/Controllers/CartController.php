<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;

use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $cartData = [];
        $cartData['title'] = "Carrito Online";
        $cartData['subtitle'] = "Cesta de la compra";
        $cartData['total'] = $total;
        $cartData['products'] = $productsInCart;
        return view('cart.index')->with('cartData', $cartData);
    }
    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);
        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $userId = Auth::user()->id;
            $order = new Order();
            $order->user_id = $request->user_id = $userId;
            $order->total = $request->total = 0;
            $order->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->id];
                $item = new Item();
                $item->quantity = $request->quantity = $quantity;
                $item->price = $request->price = $product->price;
                $item->order_id = $request->order_id = $order->id;
                $item->product_id = $request->product_id = $product->id;
                $item->save();
                $total = $total + ($product->price * $quantity);
            }
            $order->total = $request->total = $total;
            $order->save();

            $newBalance = Auth::user()->balance - $total;
            Auth::user()->balance = $newBalance;
            Auth::user()->save();

            $request->session()->forget('products');

            $purchaseData = [];
            $purchaseData["title"] = "Compra - Tienda Online";
            $purchaseData["subtitle"] =  "Estado de compra";
            $purchaseData["order"] =  $order;
            return view('cart.purchase')->with("purchaseData", $purchaseData);
        } else {
            return redirect()->route('cart.index');
        }
    }
}
