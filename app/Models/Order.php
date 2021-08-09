<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'addres_detailes',
        'country_code','phone_number','number','country','city','status','product_id'
    
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $casts = [
       
        'created_at' => 'datetime:Y-m-d',

    ];
}
