<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class aProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        $products = Product::all();
        return view('Admin.product.index', compact('products'));
    }

    public function productcategory(Request $req)
    {
        if($req->isMethod('POST')){

            $validator = Validator::make($req->all(), [
                'category_id' => 'required',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $category = $req->input('category_id');
            Session ::put('select_category',$category);
            return redirect('/admin/products/create');
        }

        $categories = Category::get();
        return view('Admin.product.productCategory', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productcreate()
    {
        $select_category = Session::get('select_category');
        $categories = Category::with('attributes')->get();
        $brands = Brand::get();
        return view('Admin.product.formAdd', compact('select_category','categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productstore(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'product_name' => 'required|string|min:2',
            'product_img' => 'required|image',
            'description' => 'required|min:2',
            'harga' => 'required',
            'stok' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_detail' => 'required',
            'trending' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         // Proses gambar logo
            $rand = 'product-'.Str::random(10);
            $product_img = $req->file('product_img');
            if ($product_img) {
            $logo = $rand.'.'.$product_img->getClientOriginalExtension();
            $upload = $product_img->move('imagesproduct/', $logo);
            } else {
                $logo = null;
            }
    
            $upload = new Product();
            $upload->product_name = $req->input('product_name');
            $upload->description = $req->input('description');
            $upload->harga = $req->input('harga');
            $upload->stok = $req->input('stok');
            $upload->product_detail = $req->input('product_detail');
            $upload->trending = $req->input('trending');
            $upload->category_id = $req->input('category_id');
            $upload->brand_id = $req->input('brand_id');
            // create nama file gambar logo pada database
            $upload->product_img = $logo;
            $upload->save();

            //pivot table
            $attribute_ids = $req->input('attribute_id');
            $attribute_value_ids = $req->input('attribute_value_id');
            

            foreach ($attribute_ids as $index => $attribute_id) {
                $value_id = $attribute_value_ids[$index];
                if($value_id!=null){
                $upload->attributes()->attach($attribute_id, ['attribute_value_id' => $value_id]);
                }
            }
 
         return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productedit($id)
    {
        $select_category = Session::get('select_category');
        $categories = Category::with('attributes')->get();
        $brands = Brand::get();
        $product = Product::findOrFail($id);
        return view('Admin.product.formEdit',compact('product','categories','brands','select_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function productupdate(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'product_name' => 'required|string|min:2',
            'description' => 'required|min:2',
            'harga' => 'required',
            'stok' => 'required',
            // 'category_id' => 'required',
            'brand_id' => 'required',
            'product_detail' => 'required',
            'trending' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::findOrFail($id);

        // Proses gambar logo jika ada perubahan
        if ($req->hasFile('product_img')) {
            $rand = 'product-' . Str::random(10);
            $product_img = $req->file('product_img');
            $logo = $rand . '.' . $product_img->getClientOriginalExtension();
            @unlink('imagesproduct/', $logo);
            $upload = $product_img->move('imagesproduct/', $logo);

            $product->product_img = $logo;
        }

            $product->product_name = $req->input('product_name');
            $product->description = $req->input('description');
            $product->harga = $req->input('harga');
            $product->stok = $req->input('stok');
            $product->product_detail = $req->input('product_detail');
            $product->trending = $req->input('trending');
            // $product->category_id = $req->input('category_id');
            $product->brand_id = $req->input('brand_id');
            $product->save();

            //pivot table
            $attribute_ids = $req->input('attribute_id');
            $attribute_value_ids = $req->input('attribute_value_id');
            
            $attributeValueData = [];
            foreach ($attribute_ids as $index => $attribute_id) {
                $value_id = $attribute_value_ids[$index];
                if($value_id!=null){
                    $attributeValueData[$attribute_id] = ['attribute_value_id' => $value_id];
                }
                    $product->attributes()->sync($attributeValueData);
            }

            return redirect('/admin/products');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
        return redirect('/admin/products')->with('success', 'Data berhasil dihapus');
    }
}
