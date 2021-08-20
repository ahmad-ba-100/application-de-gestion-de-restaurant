<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
//use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view("managements.categories.index")->with([
            "categories"=>Category::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("managements.categories.create");
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
        $this->validate($request,[
            "titre"=>"required|min:3"
        ]);
        //store data
        $titre=$request->titre;
        Category::Create([
        "titre"=>$titre,
       "slug"=>Str::slug($titre)
        ]);
        //redirect user
        return redirect()->route("categories")->with([
            "succces"=>"categorie ajoutée avec succés"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       // dd($category);
        //
        return view("managements.categories.edit")->with([
            "category"=> Category::findOrFail($id)
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        //validate
        $this->validate($request, [
            "titre" => "required|min:3"
        ]);
        $category=Category::findOrFail($id);
        
        // store data
        $titre=$request->titre;
        $category->update([
            "titre" => $titre,
            "slug" => Str::slug($titre)
    ]);
    
        return redirect()->route('categories')
                        ->with('success','Produit mis à jour avec succès');
       

    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        //delete category
        $category->delete();
        //redirect user
        return redirect()->route('categories')->with(
            'success' ,'catégorie supprimée avec succés'

  );
    }
}
