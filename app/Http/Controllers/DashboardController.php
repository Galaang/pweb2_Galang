<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function tampil(){
        $Barang = barang::all();
        return view('dashboard.dashboard',compact(['Barang']));
    }

    public function edit($id){
        $barang = barang::find($id);
        return view('dashboard.edit', compact(['barang']));
    }

    public function update($id, Request $request)
    {
        $barang = barang::find($id);
        $barang->update($request->except(['_token','submit']));
        return redirect('/dashboard');
    }

    public function delete($id){
        $barang = barang::find($id);
        $barang->delete();
        return redirect('/dashboard');
    }
}
