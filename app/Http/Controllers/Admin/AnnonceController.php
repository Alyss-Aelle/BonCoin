<?php

namespace App\Http\Controllers\Admin;



use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $annonces = Annonce::all();
        return view('admin.annonce.lister', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $annonceCategories = Category::orderBy('name','asc')->get();
        return view('admin.annonce.ajouter',compact('annonceCategories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //creation d'une instance categorie

       $AnnonceModel = new Annonce ; 

       //verification des données du formulaire
       /**
        * titre oligatoire requiere 5 charactères min
        */

        $request->validate(['formTitre','formDescription','formLieux'=>'required|min:5']) ; 
        $request->validate(['formPrix'=>'required|min:1']) ; 
        

        
               //gestion de l'upload de l'image
            if ($request->file()) {

                $formImg = $request->formImg->store('public/images') ;
                
                $AnnonceModel->image = $formImg ;
            }
            
       //injection de la donnée du formulaire dans le model
       $AnnonceModel->name = $request->formTitre;
       $AnnonceModel->user_id = Auth::user()->id ;
       $AnnonceModel->category_id = $request->category ;
       $AnnonceModel->description = $request->formDescription;
       $AnnonceModel->prix = $request->formPrix;
       $AnnonceModel->lieux = $request->formLieux;
       //enregistrement données
       $AnnonceModel->save();
       return redirect(route('admin.annonce') ) ;
        
        
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
        $annonce = Annonce::findOrFail($id) ;
         //classer categorie par ordre croissant
         $annonceCategories = Category::orderBy('name','asc')->get();
        return view('admin.annonce.modifier',compact('annonce','annonceCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $annonce = Annonce::findOrFail($id) ;
        $request->validate(['formTitre','formDescription','formLieux'=>'required|min:5']) ; 
        $request->validate(['formPrix'=>'required|min:1']) ; 
       
        if ($request->file()) {

            //dd('dans iffile');
            //ecrase l'image precedente
            if ($annonce->image != '') {
                //dd('dans iffile');
                Storage::delete($annonce->image) ;
            }

            $formImg = $request->formImg->store('public/images') ;
            $annonce->image = $formImg;
        }
        $annonce->user_id = Auth::user()->id ;
        $annonce->category_id = $request->category ;
        $annonce->description = $request->formDescription;
        $annonce->prix = $request->formPrix;
        $annonce->lieux = $request->formLieux;
        $annonce->name = $request->formTitre;
        $annonce->save() ; //enregistrement données
         
        return redirect(route('admin.annonce') ) ;
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //recuperation d'une categorie par son identifiant
         $annonce = Annonce::findOrFail($id) ;

        //verification existance du fichier
        if ($annonce->image !='') {
            
            //suppression images dans base de donnée
            Storage::delete($annonce->image) ;
            }
         //suppression de la categorie a partir de l'identifiant
         $annonce->delete();
         return 'destroy' ;
    }
}
