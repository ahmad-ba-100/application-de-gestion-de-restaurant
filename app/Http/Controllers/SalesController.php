<?php

namespace App\Http\Controllers;
use App\Models\Servants;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
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
        $sales = Sales::orderBy("created_at", "DESC")->paginate(10);
        return view("managements.sales.index")->with([
            "sales" => $sales
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
            "table_id" => "required",
            "menu_id" => "required",
            "servant_id" => "required" ,
            "quantite" => "required|numeric",
            "prix_total" => "required|numeric",
            "total_reçu" => "required|numeric",
            "reste" => "required|numeric",
            "type_paiement" => "required",
            "status_payment" => "required",
        ]);
        //store
        $sale = new Sales();
        $sale->servant_id = $request->servant_id;
        $sale->quantite = $request->quantite;  
        $sale->prix_total = $request->prix_total;
        $sale->total_reçu = $request->total_reçu;
        $sale->reste = $request->reste;
        $sale->type_paiement = $request->type_paiement;
        $sale->status_payment = $request->status_payment;
        $sale->save();
        $sale->tables() ->sync($request->table_id);
        $sale->menus() ->sync($request->menu_id);
       //redirect user
       return redirect()->back()->with([
        "success" => "Paiement modifié avec succés"
    ]);
        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //get 
        $sales= Sales::findOrFail($id);
        $tables = $sales->tables()->where('sales_id', $sales->id)->get();
        //get table menus
        $menus = $sales->menus()->where('sales_id', $sales->id)->get();
        return view("managements.sales.edit")->with([
            "tables" => $tables,
            "menus" => $menus,
            "sale" => $sales,
            "servants" => Servants::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
          //validation
          $this->validate($request, [
            "table_id" => "required",
            "menu_id" => "required",
            "servant_id" => "required",
            "quantite" => "required|numeric",
            "prix_total" => "required|numeric",
            "total_reçu" => "required|numeric",
            "reste" => "required|numeric",
            "type_paiement" => "required",
            "status_payment" => "required",
        ]);
        //get sale to update
        $sales= Sales::findOrFail($id);
        //update data
        $sales->servant_id = $request->servant_id;
        $sales->quantite = $request->quantite;
        $sales->prix_total = $request->prix_total;
        $sales->total_recçu = $request->total_reçu;
        $sales->reste = $request->reste;
        $sales->status_payment = $request->status_payment;
        $sales->type_paiement = $request->type_paiement;
        $sales->update();
        $sales->menus()->sync($request->menu_id);
        $sales->tables()->sync($request->table_id);
        //redirect user
        return redirect()->back()->with([
            "success" => "Paiement modifié avec succés"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
