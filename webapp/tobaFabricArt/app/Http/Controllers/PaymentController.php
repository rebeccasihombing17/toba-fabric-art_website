<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\products;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
     // Menampilkan Payment
     public function index($code_product)
     {
        $user = Auth::user();
        $payments = $user->payments()->latest()->get();
        $product = products::where('code_product', $code_product)->first();
        
        if (!$product) {
            return abort(404); // Tampilkan halaman 404 jika produk tidak ditemukan
        }
        return view('payment', compact('payments', 'product'));
        
     }

     public function index2($payment_id)
     {
         // Retrieve a specific payment by its ID
         $payment = Payment::where('payment_id', $payment_id)->first();
 
         // Check if the payment exists
         if (!$payment) {
             return abort(404);
         }
 
         // Render the 'SeePayment' view with the payments and the specific payment
         return view('SeePayment', compact('payment'));
     }

     public function index3()
     {
         $user = Auth::user();
         $payments = $user->payments()->with('product')->latest()->get();
 
         return view('PaymentHistory', compact('payments'));
     }
 
     public function index4()
     {
         $payments = Payment::latest()->get();
 
         return view('PaymentConfir', compact('payments'));
     }

     // Tambahkan Payment
     public function addPayment(Request $request, $code_product)
     {
         $user = Auth::user();

         $this->validate($request, [
            'buyer_name' => 'required',
            'address' => 'required',
            'product_taken' => 'required',
            'payment_method'=> 'required',
            'proof_of_payment'=> 'required',
        ]);

        $product = products::where('code_product', $code_product)->first();
        $productTaken = $request->input('product_taken', 0); // Replace 1 with the desired default value

        $newPayment = Payment::create([
             'user_id'            => $user->user_id,
             'buyer_name'         => $request->input('buyer_name'),
             'code_product'      => $product->code_product,
             'product_taken'      => $request->input('product_taken'),
             'amount'            => ($product-> product_price) * $productTaken,
             'address'            => $request->input('address'),
             'payment_method'     => $request->input('payment_method'),
             'proof_of_payment'   => $request->input('proof_of_payment'),
         ]);
        
         $product -> update([
            'stock' => ($product->stock)-($newPayment->product_taken)
         ]);

         $paymentId = $newPayment->payment_id;
         
         return redirect()
        ->route('see', ['payment_id' => $paymentId])
        ->with('success', 'Pembelian berhasil! Terima kasih telah berbelanja.');
     }

            // Contoh dalam controller

    public function confirmPayment($payment_id)
    {
        $payment = Payment::find($payment_id);

        if ($payment) {
            $payment->confirmPayment();
            return response()->json(['status' => 'confirmed']);
        } else {
            return response()->json(['status' => 'error'], 404);
        }
    }

 
}
