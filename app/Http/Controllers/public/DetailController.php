<?php

namespace App\Http\Controllers\public;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id=0)
    {
        //
        if ($id != 0) {
        
            $annonces = Annonce::where('category_id',$id)->orderBy('created_at','desc')->limit();//liste categorie
        } else{

            $annonces = Annonce::orderBy('created_at','desc');//Tout lister
        }
        return view('publicclient.detail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
       // $annonces = Annonce::where('category_id',$annonce->category_id)->all('environnement')->limit();
        dd($annonce->category_id);
        return view('publicclient.detail',compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
