<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'details',
        'quantity_in',
        'cost_in',
        'total_in',
        'quantity_out',
        'cost_out',
        'total_out',
        'quantity_balance',
        'cost_balance',
        'total_balance',
        'product_id',
        'warehouse_id',
        'inventoryable_id',
        'inventoryable_type',
    ];

    // Relacion uno a muchos inversa (muchos a uno)
    public function product()
    {
        return $this->belongsTo(Product::class);        
}

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);        
    }

    // Relacion polimorfica inversa
    public function inventoryable()
    {
        return $this->morphTo();
    }
}
