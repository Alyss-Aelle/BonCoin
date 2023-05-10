<?php

namespace App\Http\Controllers\public;

use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id=0)
    {
        //

        

        if ($id != 0) {
        
            $annonces = Annonce::where('category_id',$id)->orderBy('created_at','desc')->paginate(5);//liste categorie
        } else{

            $annonces = Annonce::all();
        }

        $categories = Category::orderBy('name','asc')->get();
        return view('welcome',compact('annonces','categories'));

        

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
    public function show(string $id)
    {
        //
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
