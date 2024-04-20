<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //Menampilkan User
    public function index()
    {
        $user = User::latest()->get();
      
        return view('Register',compact('user')); 
        
    }

    //Menambahkan User
    public function create()
    {
        return view('Register');
    }

    //Menyimpan data User (Auth)
    public function store()
    {
        $this->validate(request(), [
            'full_name' => 'required',
            'birth_date'=> 'required',
            'address'=>'required',
            'email' => 'required|email',
            'username'=>'required',
            'password' => 'required',
            'status' => 'required'
        ]);
        
        $user = User::create(request(['full_name','birth_date','address', 'email', 'username','password', 'status']));
        
        auth()->login($user);
        
        return redirect()->to('/login');
    }

    //Mengedit data user
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('edit_user', compact('user'));
    }

    //Mengupdate data User
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'birth_date' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            // Anda dapat menambahkan validasi lain sesuai kebutuhan
        ]);
    
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Pengguna tidak ditemukan.');
        }
    
        $user->update($request->all());
    
        return redirect()->route('users.index')->with('success', 'Informasi pengguna berhasil diperbarui.');
    }

    //Menghapus User
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'Pengguna tidak ditemukan.');
        }
    
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
