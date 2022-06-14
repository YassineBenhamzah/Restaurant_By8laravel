<?php

namespace App\Http\Controllers;

use App\Servant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServantController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("managements.serveurs.index")->with([
            "servants" => servant::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("managements.serveurs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validation
         $this->validate($request, [
            "name" => "required|min:3",
            
        ]);
        //store data
         
        servant::create([
            "name" => $request->name,
            "address" => $request->address
            
        ]);
        //redirect user
        return redirect()->route("servants.index")->with([
            "success" => "serveur ajoutée avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function show(Servant $servant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function edit(Servant $servant)
    {
        return view("managements.serveurs.edit")->with([
            "servant" => $servant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servant $servant)
    {
        //validation
        $this->validate($request, [
            "name" => "required|min:3",
            
        ]);
        //store data
         
        $servant->update([
            "name" => $request->name,
            "address" => $request->address
            
        ]);
        //redirect user
        return redirect()->route("servants.index")->with([
            "success" => "serveur modifier avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servant  $servant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servant $servant)
    {
         //delete category
         $servant->delete();
         //redirect user
         return redirect()->route("servants.index")->with([
             "success" => "serveur supprimée avec succés"
         ]);
    }
}
