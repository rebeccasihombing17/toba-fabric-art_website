<?php

namespace App\Http\Controllers;

use App\Models\Wishlists;
use App\Models\products; // Make sure to use the correct namespace for your Products model
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class WishlistsController extends Controller
{
    // Menampilkan Wishlist
    public function indexview()
    {
        $user = Auth::user();
        $wishlists = $user->wishlists()->latest()->get();

        return view('wishlist', compact('wishlists'));
    }


    // Tambahkan Wishlist
    public function addToWishlist(products $products)
    {
        $user = Auth::user();

        Wishlists::create([
            'user_id'            => $user->user_id,
            'product_name'       => $products->product_name,
            'product_price'      => $products->product_price,
            'product_description' => $products->product_description,
            'stock'              => $products->stock,
            'image_product'      => $products->image_product,
        ]);

        return redirect()->route('wishlist')->with('success', 'Produk berhasil ditambahkan ke wishlist.');
    }

    // Menghapus Wishlist
    public function removeFromWishlist($wishcode)
    {
        $wishlist = Wishlists::find($wishcode);

        if (!$wishlist) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan dalam wishlist.');
        }

        $wishlist->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari wishlist.');
    }

    //Connecting to API
    public function index(): JsonResponse
    {
        $wishlist = Wishlists::all();
        
        $formattedwish = $wishlist->map(function ($wishlist) {
            return [
                'wishlist' => $wishlist,
                'links' => $wishlist->getLinks(),
            ];
        });

        return response()->json([
            'wishlists' => $formattedwish,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        // Ambil user_id dan code_product dari permintaan
        $user_id = $request->input('user_id');
        $code_product = $request->input('code_product');

        // Cari user berdasarkan user_id
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['error' => 'User tidak ditemukan'], 404);
        }

        // Cari produk berdasarkan code_product
        $product = products::where('code_product', $code_product)->first();

        if (!$product) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        // Buat wishlist
        $wishlist = Wishlists::create([
            'user_id'            => $user->user_id,
            'product_name'       => $product->product_name,
            'product_price'      => $product->product_price,
            'product_description' => $product->product_description,
            'stock'              => $product->stock,
            'image_product'      => $product->image_product,
        ]);

        return response()->json([
            'wishlists' => $wishlist,
            'links' => $wishlist->getLinks()
        ]);
    }


    public function show($id): JsonResponse
    {
        $wishlist = Wishlists::findOrFail($id);
        
        return response()->json([
            'wishlists' => $wishlist,
            'links' => $wishlist->getLinks()
        ]);
    }

    public function destroy($wishcode): JsonResponse
        {
        $wishlist = Wishlists::findOrFail($wishcode);
        $wishlist->delete();
        
        return response()->json([
            'message' => 'Wishlist deleted successfully',
        ]);
    }

}
