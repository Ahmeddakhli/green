<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    use HasFactory;
    protected $fillable = [
        'product_name',
        'img',
        'user_id',
        'discription',
        'discound',
        'price',
        'country',
        'made_by',
        'quantity','categore'
   
    ];
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.product_name' => 10,
            'products.country' => 10,

            
        ],
       
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function setImgAttribute($value)
    {
          $this->attributes['img'] = json_encode($value);
    }

    protected $casts = [
       
        'created_at' => 'datetime:Y-m-d',

    ];
}
