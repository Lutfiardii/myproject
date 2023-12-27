<?php

namespace App\Http\Controllers\User;

use App\Brand;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use App\Attribute;
use App\Contact;
use App\Customer;
use App\Cart;
use App\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        $brands = Brand::get();
        $categories = Category::get();
        $products = Product::get();
        return view('User.guest',compact('brands','categories','products'));
    }

    public function product()
    {
        $products = Product::get();
        $attributes = Attribute::get();
        return view('User.product.index',compact('products','attributes'));
    }

    public function detailproduct($id)
    {
        $products = Product::findOrfail($id);
        $attributes = $products->attributes;
        return view('User.product.detail',compact('products','attributes'));
    }

    public function category($id)
    {
        $categories = Category::findOrFail($id);
        $products = Product::where('category_id', $categories->id)->get();
        return view('User.category.index', compact('categories', 'products'));
    }

    public function contact($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('User.contact.index',compact('contacts'));
    }

    public function attributeValue($id)
    {
        $attributes = Attribute::get();
        $values = AttributeValue::find($id);
        if ($values) {
            $products = Product::whereHas('attributeValues', function ($query) use ($values) {
                $query->where('attribute_value_id', $values->id);
            })->get();
    
            return view('User.attributeValue.index', compact('products', 'values','attributes'));
        } else {
            // Handle jika atribut tidak ditemukan
            // Misalnya, tampilkan pesan error atau redirect ke halaman lain
        }
    }

    public function keranjang($id)
    {
        $carts = Product::findOrfail($id);

        $cartItems = Cart::where('customer_id', Auth::guard('customer')->id())
        ->where('product_id', $id)
        ->get();
        return view('User.product.keranjang',compact('carts','cartItems'));
    }

    public function profile($id)
    {
        $customers = Customer::findOrfail($id);
        return view('User.profile.index',compact('customers'));
    }

    // public function cartstore(Request $req,$id)
    // {
    //     $cart = new Cart();
    //         // $cart->customer_id = Auth::guard('Customer')->id();
    //         $cart->customer_id = auth('customer')->user()->id;
    //         $cart->product_id = $req->input('product_id');
    //         // $cart->customer_id = $req->input('customer_id');
    //         $cart->subtotal = $req->input('subtotal');
    //         $cart->kuantitas = $req->input('kuantitas');
    //         $cart->save();
    //         return redirect('/cart/' . $id);
    // }
    public function cartstore(Request $req, $id)
{
    // Mendapatkan data yang dibutuhkan dari request
    $product_id = $req->input('product_id');
    $subtotal = $req->input('subtotal');
    $kuantitas = $req->input('kuantitas');

    // Membuat objek Cart
    $cart = new Cart();
    $cart->customer_id = auth('customer')->user()->id;
    $cart->product_id = $product_id;
    $cart->subtotal = $subtotal;
    $cart->kuantitas = $kuantitas;

    // Simpan objek Cart ke database
    $cart->save();

    // Mengarahkan pengguna kembali ke halaman keranjang
    return redirect('/cart/' . $id);
}

public function search(Request $request)
{
    $cari = $request->input('cari');
    $products = Product::where('product_name', 'like', "%$cari%")->get();
    return view('User.product.search', compact('products'));
}

public function delete($id)
{
    $cartItem = Cart::findOrFail($id);
    $cartItem->delete();

    return redirect()->back()->with('success', 'Item keranjang berhasil dihapus');
}


}
