<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use Illuminate\Http\Request;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('exercice');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $exercices = Exercice::all();
        return view('exercice', compact('exercices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $exerciceModel = new Exercice ;

        $request->validate(['formDescription'=>'required|min:1']) ; 
        $exerciceModel->description = $request->FormDescription;
        $exerciceModel->save();
        return redirect(route('create') ) ;

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
