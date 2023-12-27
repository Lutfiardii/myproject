<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class aContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $contacts = Contact::all();
        return view('Admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactcreate()
    {
        return view('Admin.contact.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contacttore(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|string|min:2',
            'alamat' => 'required|string|min:2',
            'no_telp' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
         
         $upload = new Contact();
         $upload->email = $req->input('email');
         $upload->no_telp = $req->input('no_telp');
         $upload->alamat = $req->input('alamat');
         $upload->save();
 
         return redirect('/admin/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function contactedit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('Admin.contact.formEdit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function contactupdate(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|string|min:2',
            'alamat' => 'required|string|min:2',
            'no_telp' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact = Contact::findOrFail($id);
        $contact->email = $req->input('email');
        $contact->no_telp = $req->input('no_telp');
        $contact->alamat = $req->input('alamat');
        $contact->save();

        return redirect('/admin/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where('id',$id)->delete();
        return redirect('/admin/contacts')->with('success', 'Data berhasil dihapus');
    }
}
