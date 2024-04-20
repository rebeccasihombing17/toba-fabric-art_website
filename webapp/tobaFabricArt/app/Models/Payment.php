<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'user_id',
        'buyer_name',
        'code_product',
        'amount',
        'product_taken',
        'address',
        'payment_method',
        'proof_of_payment',
        'status'
    ];

    protected $attributes = [
        'status' => 'pending', // Set the default value for 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(products::class, 'code_product', 'code_product');
    }

    public function confirmPayment()
    {
        $this->update(['status' => 'confirmed']);
    }

}
