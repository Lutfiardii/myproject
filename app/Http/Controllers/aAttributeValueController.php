<?php

namespace App\Http\Controllers;

use App\AttributeValue;
use App\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class aAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexvalue($id)
    {
        $attributes = Attribute::findOrFail($id);
        return view('Admin.attributeValue.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function valuecreate($id)
    {
        $attributes = Attribute::findOrFail($id);
        return view('Admin.attributeValue.formAdd', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function valuestore(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'value_name' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Dapatkan entitas Attribute berdasarkan $id
        $attributes = Attribute::find($id);
        
        // Buat array data atribut nilai
        $attributeData = [
            'value_name' => $req->input('value_name'),
            'attribute_id' => $attributes->id,
        ];

        // Buat entitas AttributeValue
        AttributeValue::create($attributeData);

        return redirect('/admin/attributeValues/' .$attributes->id)->with('sukses', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeValue $attributeValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function valueedit($id,$value_id)
    {
        $attribute = Attribute::findOrFail($id);
        $value = AttributeValue::where('id', $value_id)->first();
        return view('Admin.attributeValue.formEdit', compact('attribute', 'value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function valueupdate(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'value_name' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Temukan entitas Attribute berdasarkan $id
        $attribute = Attribute::findOrFail($id);
        // Temukan entitas AttributeValue berdasarkan 'value_id'
        $value = AttributeValue::findOrFail($req->input('value_id'));

        // Perbarui data dalam database
        $value->update([
            'value_name' => $req->input('value_name'),
            'attribute_id' => $attribute->id,
        ]);

        return redirect('/admin/attributeValues/' . $attribute->id)->with('success', 'Attribute value updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttributeValue  $attributeValue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $value = AttributeValue::findOrFail($id);
        $value->delete();

        return redirect()->back()->with('success', 'Attribute value deleted successfully.');
    }
}
