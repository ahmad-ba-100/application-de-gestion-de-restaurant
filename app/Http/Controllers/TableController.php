<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TableController extends Controller
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
        //
        return view("managements.tables.index")->with(["tables"=> Table::paginate(5)
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("managements.tables.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "nom" => "required|unique:tables,nom",
            "status" => "required|boolean"
            
        ]);
        //store data
       
       
        Table::Create([
            "nom" => $request->nom,
            "slug" => Str::slug($request->nom),
            "status" => $request->status,
            
            
 
        ]);
        //redirect
        return redirect()->route("tables")->with([
            "success" => "table ajoutée avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //

        return view("managements.tables.edit")->with([
            "table" => Table::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {  $table =Table::findOrfail($id);
        //validation
        $this->validate($request, [
            "nom" => "required|unique:tables,nom," . $table->id,
            "status" => "required|boolean"
        ]);
        //redirect
        $table =Table::findOrfail($id);
        $table->update([
            "nom" => $request->nom,
            "slug" => Str::slug($request->nom),
            "status" => $request->status,
        ]);
         //redirect user
       
         return  redirect()->route('tables')->with([
            "success" => "la table est   modifié avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tables=Table::findOrFail($id);
        $tables->delete();
        //redirect
        return redirect()->route("tables")->with([
            "success" => "table supprimée avec succés"
        ]);
    }
}
