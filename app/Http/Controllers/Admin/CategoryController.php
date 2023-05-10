<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name','asc')->get();
        return view('admin.category.index',compact('categories'));
    }

    
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //creation d'une instance categorie

        $categoryModel = new Category ; 

        //verification des données du formulaire
        /**
         * titre oligatoire requiere 5 charactères min
         */

        $request->validate(['category'=>'required|min:5']) ; 

        //injection de la donnée du formulaire dans le model
        $categoryModel->name = $request->category;
        $categoryModel->icone = 'icone';
        
        //enregistrement données
        $categoryModel->save();
        return 
        redirect(route('admin.category') ) ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //creation instance du model news a modifier a partir de id

       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
        $categoryModel = Category::findOrFail($id) ;
        $request->validate(['category'=>'required|min:5']) ; 

        $categoryModel->name = $request->category;
        $categoryModel->icone = 'icone';

        $categoryModel->save() ; //enregistrement données
         
        return 
        redirect(route('admin.category') ) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
                //recuperation d'une categorie par son identifiant
                $category = Category::findOrFail($id) ;

        
                //suppression de la categorie a partir de l'identifiant
                $category->delete();
                return 'destroy' ;
    }
}
