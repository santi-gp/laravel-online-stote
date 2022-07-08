<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// import Order and Product models
use App\Models\Order;
use App\Models\Product;
// ------------------------------

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'quantity',
        'order_id',
        'product_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function getOrder()
    {
        return $this->order;
    }
    public function setOrder($order)
    {
        $this->order = $order;
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getProduct()
    {
        return $this->product;
    }
    public function setProduct($product)
    {
        $this->product = $product;
    }
}
