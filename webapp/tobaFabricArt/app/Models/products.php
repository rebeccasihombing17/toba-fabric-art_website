<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    
    public static $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    protected $primaryKey = 'code_product';
    protected $fillable = [
        'product_name','product_price','product_description','stock', 'image_product'
    ];

    public static function store($data)
    {
        // Validasi ekstensi file
        $extension = strtolower($data['image_product']->getClientOriginalExtension());
        if (!in_array($extension, self::$allowedExtensions)) {
            // File yang diunggah memiliki ekstensi yang tidak diperbolehkan
            return false;
        }

        // Simpan file gambar
        $path = Storage::putFile('product_images', new File($data['image_product']));

        // Simpan path file gambar di dalam database
        $product = new Product([
            'image_product' => $path,
        ]);
        $product->save();

        return $product;
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'code_product', 'code_product');
    }

    public function getLinks(): array
    {
        $baseUri = '/api/productstoba' . $this->id;
        
        return [
            'products_list' => [
                'href' => $baseUri,
                'method' => 'GET',
                'type' => 'application/json',
                'description' => 'Get product details',
            ],
            'update_product' => [
                'href' => $baseUri . '/' . $this->code_product,
                'method' => 'PUT',
                'type' => 'application/json',
                'description' => 'Update product details',
            ],
            'store_product' => [
                'href' => $baseUri,
                'method' => 'POST',
                'type' => 'application/json',
                'description' => 'Update product details',
            ],
            'delete_product' => [
                'href' => $baseUri . '/' . $this->code_product,
                'method' => 'DELETE',
                'type' => 'application/json',
                'description' => 'Delete product',
            ],
        ];
    }

}
