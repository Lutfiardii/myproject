<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('User.login');
    }

    public function loginpost(Request $req)
    {
        $data = $req->all();
        if (Auth::guard('customer')->attempt(['email' => $data['emaillogin'], 'password' => $data['passwordlogin']])) {
            // Dapatkan ID pengguna yang berhasil login
            // $userId = Auth::guard('customer')->user()->id;

            // Arahkan pengguna ke halaman cart dengan menyertakan ID
            // return redirect('/' . $userId);
            return redirect('/');
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Login gagal. Periksa email dan kata sandi Anda.']);
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }

    public function registerstore(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'customer_name' => 'required|string|min:2',
            'alamat' => 'required|string|min:2',
            'no_telp' => 'required|unique:customers,no_telp|min:8',
            'email' => 'required|unique:customers,email|min:2',
            'password' => 'required|min:6',
             // Add image validation rules
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $data = $req->only(['customer_name', 'alamat', 'no_telp', 'email']);
        $data['password'] = Hash::make($req->input('password'));
    
        if ($req->hasFile('customer_img')) {
            $customer_img = $req->file('customer_img');
            $rand = 'customer-' . Str::random(10);
            $logo = $rand . '.' . $customer_img->getClientOriginalExtension();
            $customer_img->move('imagesCustomer/', $logo);
            $data['customer_img'] = $logo;
        }
    
        $data['status'] = true;
        Customer::create($data);
    
        return redirect('/user/login')->with('success', 'Data berhasil disimpan!');
    }

    public function profileedit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('User.profile.formEdit', compact('customer'));
    }

    public function profileupdate(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'customer_name' => 'required|string|min:2',
            'alamat' => 'required|string|min:2',
            'no_telp' => 'required|unique:customers,no_telp,' . $id . ',id|min:8',
            'email' => 'required|unique:customers,email,' . $id . ',id|min:2',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::findOrFail($id);

        if ($req->hasFile('customer_img')) {
            $rand = 'customer-' . Str::random(10);
            $customer_img = $req->file('customer_img');
            $logo = $rand . '.' . $customer_img->getClientOriginalExtension();
            @unlink('imagesCustomer/', $logo);
            $upload = $customer_img->move('imagesCustomer/', $logo);

            $customer->customer_img = $logo;
        }

        $customer->customer_name = $req->input('customer_name');
        $customer->email = $req->input('email');
        $customer->no_telp = $req->input('no_telp');
        $customer->alamat = $req->input('alamat');
        $customer->password = $req->input('password');
        $customer->save();

        return redirect()->route('profile', ['id' => $id]);
    }
    
}
