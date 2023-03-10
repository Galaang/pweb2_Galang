<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $barang = barang::all();
        return view('dashboard.pendataan',compact(['barang']));
    }

    public function store(Request $request){
        // dd($reques t->except(['_token','submit']));
        barang::create($request->except(['_token','submit']));
        return redirect('/dashboard');
    }  
}
