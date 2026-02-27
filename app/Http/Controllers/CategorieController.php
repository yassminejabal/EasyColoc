<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
// use app\Models\;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index() { 
    
$categories = Categorie::all();
 return view('colocation', ['categorie' => $categories]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('categoriesCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Categorie::create([
        'name' => $request->name,
    ]);
    return redirect()->route('colocation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

public function destroy($id)
{
    $categorie = Categorie::findOrFail($id);
    $categorie->delete();                     
       return redirect()->route('colocation.index');
}
}
