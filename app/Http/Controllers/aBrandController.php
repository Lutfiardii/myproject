<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class aBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brand()
    {
        $brands = Brand::all();
        return view('Admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function brandcreate()
    {
        return view('Admin.brand.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function brandtore(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'brand_name' => 'required|string|min:2',
            'brand_logo' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         // Proses gambar logo
            $rand = 'logo-'.Str::random(10);
            $brand_logo = $req->file('brand_logo');
            if ($brand_logo) {
            $logo = $rand.'.'.$brand_logo->getClientOriginalExtension();
            $upload = $brand_logo->move('imageslogo/', $logo);
            } else {
                $logo = null;
            }

            // Proses gambar banner
            $rand = 'banner-'.Str::random(10);
            $brand_banner = $req->file('brand_banner');
            if ($brand_banner) {
            $banner = $rand.'.'.$brand_banner->getClientOriginalExtension();
            $upload = $brand_banner->move('imagesbanner/', $banner);
            } else {
                $banner = null;
            }

            
    
            $upload = new Brand();
            $upload->brand_name = $req->input('brand_name');
            $upload->description = $req->input('description');
            // create nama file gambar logo dan banner pada database
            $upload->brand_logo = $logo;
            $upload->brand_banner = $banner;
            $upload->save();
 
         return redirect('/admin/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function brandedit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('Admin.brand.formEdit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function brandupdate(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'brand_name' => 'required|string|min:2',
            'brand_logo' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses gambar logo
        $rand = 'logo-'.Str::random(10);
        $brand_logo = $req->file('brand_logo');
        if ($brand_logo) {
        $logo = $rand.'.'.$brand_logo->getClientOriginalExtension();
        @unlink('imageslogo/', $logo);
        $brand_logo->move('imageslogo/', $logo);
        } else {
            $logo = null;
        }

        // Proses gambar banner
        $rand = 'banner-'.Str::random(10);
        $brand_banner = $req->file('brand_banner');
        if ($brand_banner) {
        $banner = $rand.'.'.$brand_banner->getClientOriginalExtension();
        @unlink('imagesbanner/', $banner);
        $brand_banner->move('imagesbanner/', $banner);
        } else {
            $banner = null;
        }

        // Temukan merek yang ingin diupdate
        $brand = Brand::findOrFail($id);

        $brand->brand_name = $req->input('brand_name');

        // Update logo dan banner jika ada
        if ($logo) {
            $brand->brand_logo = $logo;
        }
        if ($banner) {
            $brand->brand_banner = $banner;
        }
        $brand->save();

        return redirect('/admin/brands')->with('success', 'Merek berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::where('id',$id)->delete();
        return redirect('/admin/brands')->with('success', 'Data berhasil dihapus');
    }
}
