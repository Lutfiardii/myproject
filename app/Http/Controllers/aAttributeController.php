<?php

namespace App\Http\Controllers;

use App\Attribute;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class aAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attribute()
    {
        $attributes = Attribute::all();
        return view('Admin.attribute.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attributecreate()
    {
        $attribute = Attribute::get();
        return view('Admin.attribute.formAdd',compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attributestore(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'attribute_name' => 'required|string|min:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         
         $upload = new Attribute();
         $upload->attribute_name = $req->input('attribute_name');
         $upload->description = $req->input('description');
         $upload->save();
 
         return redirect('/admin/attributes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function attributeedit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('Admin.attribute.formEdit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function attributeupdate(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'attribute_name' => 'required|string|min:2',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $attribute = Attribute::findOrFail($id);
        $attribute->attribute_name = $req->input('attribute_name');
        $attribute->description = $req->input('description');
        $attribute->save();
    
        return redirect('/admin/attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attribute::where('id',$id)->delete();
        return redirect('/admin/attributes')->with('success', 'Data berhasil dihapus');
    }
}
