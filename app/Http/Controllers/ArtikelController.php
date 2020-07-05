<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtikelModel;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = ArtikelModel::get_all();
        $compact = compact("artikel");
        return view("artikel.index", $compact);
    }

    public function create(){
        return view("artikel.form");
    }

    public function store(Request $request){
        $data = $request->all();
        unset($data["_token"]); //array asosiatif key _token biar ga ikut
        $data["slug"] = Str::slug($data["judul"], "-");
        $artikelsave = ArtikelModel::save($data);
        if($artikelsave){
            return redirect("/artikel");
        }
    }

    public function show($id){
        $artikel = ArtikelModel::find_by_id($id);
        $compact = compact("artikel");
        return view("artikel.show", $compact);
    }

    public function edit($id){
        $artikel = ArtikelModel::find_by_id($id);
        $compact = compact("artikel");
        return view("artikel.edit", $compact);
    }

    public function update($id, Request $request){
        $data = $request->all();
        unset($data["_token"]);
        $data["slug"] = Str::slug($data["judul"], "-");
        $artikel = ArtikelModel::update($id, $data);
        return redirect("/artikel");
    }

    public function destroy($id){
        $deletedartikel = ArtikelModel::destroy($id);
        return redirect("/artikel");
    }
}
