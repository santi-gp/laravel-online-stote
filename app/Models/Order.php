<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// import User and Item model
use App\Models\User;
use App\Models\Item;
// --------------------------

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total',
        'user_id',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }
    
    public function setItems($items)
    {
        $this->items = $items;
    }
}
