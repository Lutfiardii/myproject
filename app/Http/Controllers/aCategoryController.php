<?php

namespace App\Http\Controllers;

use App\Category;
use App\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class aCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        $categories = Category::all();
        return view('Admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categorycreate()
    {
        $attributes = Attribute::get();
        return view('Admin.category.formAdd',compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function categorytore(Request $req)
    // {
    //     $validator = Validator::make($req->all(), [
    //         'category_name' => 'required|string|min:2',
    //         // 'category_img' => 'required|image',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //      // Proses gambar image
    //         $rand = 'category-'.Str::random(10);
    //         $category_img = $req->file('category_img');
    //         if ($category_img) {
    //         $image = $rand.'.'.$category_img->getClientOriginalExtension();
    //         $upload = $category_img->move('imagescategory/', $image);
    //         } else {
    //             $image = null;
    //         }
    
    //         $upload = new Category();
    //         $upload->category_name = $req->input('category_name');
    //         // create nama file gambar image pada database
    //         $upload->category_img = $image;
    //         $upload->save();
            
    //         // Ambil attribute_id yang terkait dengan kategori (asumsi ada input field untuk attribute_id)
    //         $attributeIds = $req->input('attribute_id', []);

    //         // Attach attribute_id ke kategori
    //         $upload->attributes()->attach($attributeIds);
 
    //      return redirect('/admin/categories');
    // }

    public function categorytore(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'category_name' => 'required|string|min:2',
            // 'category_img' => 'required|image',
            'attribute_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses gambar image
        $rand = 'category-' . Str::random(10);
        $category_img = $req->file('category_img');
        $image = null;

        if ($category_img) {
            $image = $rand . '.' . $category_img->getClientOriginalExtension();
            $category_img->move('imagescategory/', $image);
        }

        // Buat objek Category
        $category = new Category();
        $category->category_name = $req->input('category_name');
        // Simpan nama file gambar image pada database
        $category->category_img = $image;
        $category->save();

        // Ambil attribute_id yang terkait dengan kategori (asumsi ada input field untuk attribute_id)
        $attributeIds = $req->input('attribute_id', []);

        // Attach attribute_id ke kategori
        $category->attributes()->attach($attributeIds);

        return redirect('/admin/categories');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryedit($id)
    {
        $category = Category::findOrFail($id);
        $attributes = Attribute::get();
        return view('Admin.category.formEdit',compact('category','attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function categoryupdate(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'category_name' => 'required|string|min:2',
        // 'category_img' => 'required|image',
        'attribute_id' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $category = Category::findOrFail($id);

    if ($request->hasFile('category_img')) {
        $rand = 'category-' . Str::random(10);
        $category_img = $request->file('category_img');
        $image = $rand . '.' . $category_img->getClientOriginalExtension();
        @unlink('imagescategory/', $image);
        $upload = $category_img->move('imagescategory/', $image);

        // Simpan nama file gambar image pada database
        $category->category_img = $image;
    }

        $category->category_name = $request->input('category_name');
        $category->save();

        // Ambil attribute_id yang terkait dengan kategori (asumsi ada input field untuk attribute_id)
        $attributeIds = $request->input('attribute_id', []);

        // Gunakan sync untuk mengupdate relasi many-to-many dengan atribut
        $category->attributes()->sync($attributeIds);

        return redirect('/admin/categories')->with('success', 'Kategori berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
        return redirect('/admin/categories')->with('success', 'Data berhasil dihapus');
    }
}
