<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }

    public function login()
    {
        return view('Admin.login');
    }

    public function loginpost(Request $req)
    {
        $data = $req->all();
        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect('admin/dashboard'); // Ganti dengan rute yang sesuai setelah berhasil login admin.
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Login gagal. Periksa email dan kata sandi Anda.']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function administrator()
    {
        $admins = Admin::orderBy('name', 'asc')->get();
        return view('Admin.administrator.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function administratorcreate()
    {
        return view('Admin.administrator.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function administratorstore(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|min:2',
            'tipe' => 'required|in:admin,superAdmin',
            'alamat' => 'required|string|min:2',
            'no_telp' => 'required|unique:admins,no_telp|min:8',
            'email' => 'required|unique:admins,email|min:2',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $req->only(['name', 'tipe', 'alamat', 'no_telp', 'email']);
        $data['password'] = Hash::make($req->input('password'));

        Admin::create($data);

        return redirect('/admin/administrator')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function administratoredit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('Admin.administrator.formEdit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function administratorupdate(Request $req, $id)
    {
        $admin = Admin::findOrFail($id);

        $this->validate($req, [
            'name' => 'required|string|min:2',
            'tipe' => 'required|in:admin,superAdmin',
            'alamat' => 'required|string|min:2',
            'no_telp' => 'required|unique:admins,no_telp,' . $id . ',id|min:8',
            'email' => 'required|min:2|unique:admins,email,' . $id . ',id' . ($req->input('email') !== $admin->email ? '|unique:admins,email' : ''),
            'password' => 'required|min:6',
        ]);

        $admin->update([
            'name' => $req->input('name'),
            'alamat' => $req->input('alamat'),
            'tipe' => $req->input('tipe'),
            'no_telp' => $req->input('no_telp'),
            'email' => $req->input('email'),
            'password' => Hash::make($req->input('password')),
        ]);

        return redirect('/admin/administrator')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id',$id)->delete();
        return redirect('/admin/administrator')->with('success', 'Data berhasil dihapus');
    }
}
