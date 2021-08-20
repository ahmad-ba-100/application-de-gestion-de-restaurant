<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $menu = Menu::with('Category:id,titre')->get();
        return view("managements.menus.index")->with([
            "menus" => Menu::paginate(5)
            
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
        return view("managements.menus.create")->with([
            "categories" => Category::all()
        ]);
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
        //validation
        
        
        //store data
        if ($request->hasFile("image")) {
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);
            $titre = $request->titre;
            Menu::create([
                "titre" => $titre,
                "slug" => Str::slug($titre),
                "description" =>  $request->description,
                "prix" =>  $request->prix,
                "category_id" =>  $request->category_id,
                "image" =>  $imageName,
            ]);
            //redirect user
            return redirect()->route("menus")->with([
                "success" => "menu ajouté avec succés"
            ]);







        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu,$id)
    {
        //
        return view("managements.menus.edit")->with([
            "categories" => Category::find($id),
            "menu" => Menu::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
        $this->validate($request, [
            "titre" => "required|min:3|unique:menus,titre," . $menu->id,
            "description" => "required|min:5",
            "image" => "image|mimes:png,JPG,jpg,jpeg|max:2048",
            "prix" => "required|numeric",
            "category_id" => "required|numeric",
        ]);

         //store data
         if ($request->hasFile("image")) {
            unlink(public_path('images/menus/' . $menu->image));
            $file = $request->image;
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);
            $titre = $request->titre;
            Menu::create([
                "titre" => $titre,
                "slug" => Str::slug($titre),
                "description" =>  $request->description,
                "prix" =>  $request->prix,
                "category_id" =>  $request->category_id,
                "image" =>  $imageName,
            ]);
            //redirect user
            return redirect()->route("menus")->with([
                "success" => "menu modifié avec succés"
            ]);
        }
        else {
            $titre = $request->titre;
            $menu->update([
                "titre" => $titre,
                "slug" => Str::slug($titre),
                "description" =>  $request->description,
                "prix" =>  $request->prix,
                "category_id" =>  $request->category_id
            ]);
            //redirect user
            return redirect()->route("menus")->with([
                "success" => "menu modifié avec succés"
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        //remove image
        unlink(public_path('images/menus/' .$menu->image));
        $menu->delete();
        //redirect user
        return redirect()->route("menus")->with([
            "success" => "menu supprimé avec succés"
        ]);
    }
}
