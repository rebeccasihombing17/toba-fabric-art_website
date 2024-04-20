<?php

namespace App\Http\Controllers; 
use App\Models\products;
use Illuminate\Http\JsonResponse;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Menampilkan product di Dashboard
    public function indexview()
    {
        $product = products::latest()->get();
      
        return view('Dashboard',compact('product'));
    }

    public function indexviewseller()
    {
        $product = products::latest()->get();
      
        return view('DashboardSeller',compact('product'));
    }

    //Menampilkan produt di Management Product
    public function index2view()
    {
        $product = products::latest()->get();
      
        return view('ManagementProduct',compact('product'));  
    }

    //Menampilkan produk
    public function showview($code_product)
    {
        $product = products::where('code_product', $code_product)->first();
        
        if (!$product) {
            return abort(404); // Tampilkan halaman 404 jika produk tidak ditemukan
        }
    
        return view('ProductDetail', compact('product'));  
    }
    

    //Menambahkan product 
    public function createview()
    {
        return view('AddProduct');
    }

    //Menyimpan product ke database
    public function storeview(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_price'=> 'required',
            'product_description'=>'required',
            'stock'=>'required',
            'image_product' => 'required|image',
        ]);

        $imagePath = $request->file('image_product')->store('public');
        $imagePath = str_replace('public/', '', $imagePath);

        $product = products::create([
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'product_description' => $request->input('product_description'),
            'stock' => $request->input('stock'),
            'image_product' => $imagePath, // Path gambar yang sudah diunggah
        ]);

        return redirect()->to('/seller');
    }

    //Mengedit Product
    public function editview($id)
    {
        $product = products::find($id);
        return view('EditProduct', compact('product'));
    }    

   //Mengupdate Product
    public function updateview(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'sometimes|required',
            'product_price' => 'sometimes|required',
            'product_description' => 'sometimes|required',
            'stock' => 'sometimes|required',
            'image_product' => 'sometimes|required',
        ]);        
    
        $product = products::find($id);
        $product->update($request->only(['product_name', 'product_price', 'product_description', 'stock','image_product']));
    
        return redirect()->to('/seller');
    }
    

    //Menghapus Product
    public function destroyview($id)
    {
        $product = products::find($id);
        $product->delete();
    
        return redirect()->to('/seller');
    }

    //Connecting to API
    public function index(): JsonResponse
    {
        $product = products::all();
        
        $formattedProducts = $product->map(function ($product) {
            return [
                'product' => $product,
                'links' => $product->getLinks(),
            ];
        });

        return response()->json([
            'products' => $formattedProducts,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_price'=> 'required',
            'product_description'=>'required',
            'stock'=>'required',
            'image_product' => 'required',
        ]);

        $imagePath = $request->file('image_product')->store('public');
        $imagePath = str_replace('public/', '', $imagePath);

        $product = products::create([
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'product_description' => $request->input('product_description'),
            'stock' => $request->input('stock'),
            'image_product' => $imagePath, // Path gambar yang sudah diunggah
        ]);

        return response()->json([
            'product' => $product,
            'links' => $product->getLinks(),
        ]);
    }
    
    public function show($id): JsonResponse
    {
        $product = products::findOrFail($id);
        
        return response()->json([
            'product' => $product,
            'links' => $product->getLinks(),
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $product = products::findOrFail($id);
        $product->update($request->all());
        
        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product,
            'links' => $product->getLinks(),
        ]);
    }
    
    public function destroy($id): JsonResponse
        {
        $product = products::findOrFail($id);
        $product->delete();
        
        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }   


}