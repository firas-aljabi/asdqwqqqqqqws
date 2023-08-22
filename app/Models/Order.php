<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query , array $filters){
        $query->when($filters['state'] ?? false , fn($query , $state) =>
            $query->where('order_state' , $state)
        );
    }

    public function table() {
        return $this->belongsTo(Table::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
