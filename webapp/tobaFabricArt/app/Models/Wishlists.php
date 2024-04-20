<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    public static $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    protected $primaryKey = 'code_wish';
    protected $fillable = [
        'user_id','product_name','product_price','product_description','stock', 'image_product'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function getLinks(): array
    {
        $baseUri = '/api/wishliststoba/';
        $product = products::where('product_name', $this->product_name)->first();

        return [
            'self' => [
                'href' => $baseUri. $this->code_wish,
                'method' => 'GET',
                'type' => 'application/json',
                'description' => 'Get wishlists details',
            ],
            'store_wishlist' => [
                'href' => $baseUri . $this->user_id . '/' . optional($product)->code_product,
                'method' => 'POST',
                'type' => 'application/json',
                'description' => 'Create wishlist details',
            ],
            'delete' => [
                'href' => $baseUri . $this->code_wish,
                'method' => 'DELETE',
                'type' => 'application/json',
                'description' => 'Delete wishlists',
            ],
        ];
    }


}
