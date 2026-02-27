<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecolocationRequest;
use App\Models\Categorie;
use App\Models\colocation;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Illuminate\Support\now;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $categories = Categorie::all();

        $colocationss = User::find($user->id)->colocations()->wherePivot('status', 'active')->exists();
        // dd($colocationss);
        return view('dashboard', compact('categories', 'colocationss'));
            // return view('dashboard', compact('colocationss', 'categories'));
            //  $colocationss = User::find($user->id)->colocations()->get();
            // $categories = Categorie::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createcolocation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecolocationRequest $request)
    
    {
        $user = Auth::user();
        $isActivememberchip = User::find($user->id)->colocations()->wherePivot('status', 'active')->exists();
        // dd($isActivememberchip);
        if ($isActivememberchip) {
            return redirect()->route('dashboard')->with('accses refusee');
        }
        $colocation = colocation::create([
            'name' => $request->name,
            'status' => 'actif'
        ]);
        Membership::create([
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'role' => 'owner',
            'joined_at' => now(),
            'left_at' => null,
            'status' => 'active'
        ]);
        return redirect()->route('colocation.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(colocation $colocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(colocation $colocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, colocation $colocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $colocation = Colocation::findOrFail($id);
        $chech = User::find($user->id)->colocations()->wherePivot('status', 'active')->exists();
        if ($chech) {
            $user = Auth::user();
            User::find($user->id)->colocations()->wherePivot('status', 'active')->updateExistingPivot($colocation, ['status' => 'desactive']);
            $colocation = colocation::find($colocation->id);
            $colocation->status = 'annule';
            $colocation->save();
            // $colocationss = User::find($user->id)->colocations()->get();
            // $categories = Categorie::all();
            return redirect()->route('colocation.index');
        }
        return redirect()->route('dashboard');
    }
    public function Macolocation()
    {
        $user = Auth::user();
        $categories = Categorie::all();
        $colocations = User::find($user->id)->colocations()->wherePivot('status', 'active')->first();
        return view('colocation', compact('colocations', 'categories'));
    }
}
