<?php

namespace App\Http\Controllers;

use App\Models\Servants;
use Illuminate\Http\Request;

class ServantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("managements.serveurs.index")->with([
            "servants"=>Servants::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // Validation
        $this->validate($request,[
            "nom"=>"required|min:3"
        ]);
        //store data
       
        Servants::create([
            "nom" => $request->nom,
            "adresse" => $request->adresse
        ]);
        //redirect user
        return redirect()->route("serveurs")->with([
            "succces"=>"serveur ajoutée avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function show(Servants $servants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       // dd($id);
        
        return view("managements.serveurs.edit")->with([
            "servant" => Servants::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
         //validation
         $this->validate($request, [
            "nom" => "required|min:3"
        ]);
      //  $servants = Servants::findOrFail($id);
      $servants = Servants::findOrFail($id);
        $servants->update([
            "nom" => $request->nom,
            "adresse" => $request->adresse
        ]);
        //redirect user
       
        return redirect()->route("serveurs")->with([
            "success" => "serveur modifié avec succés"
        ]);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        //
        $servant = Servants::findOrFail($id);
        $servant->delete();
        //redirect user
        return redirect()->route("serveurs")->with([
            "success" => "serveur supprimé avec succés"
        ]);


    }
}
