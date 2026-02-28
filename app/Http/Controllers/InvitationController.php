<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationvalideRequest;
use App\Mail\Mailinvetation;
use App\Models\colocation;
use App\Models\invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public string $email;
    // public string $token;
    
     public function __construct($email)
    {
        // $this->user = $user;
        $this->email = $email;
    }
public function send(InvitationvalideRequest $request) {

    $token = Str::random(40);

    $user = Auth::user();
    

    $colocation = User::find($user)->colocations()->wherePivot('status', 'active')->first();


    $invetation = invitation::create([
        'email' => $request->email,
        'token' => $token,
        'user_id' => $user->id,
        'status' => 'pending', 
        'colocation_id' => $colocation->id
    ]);


    $details = [
        'url' => url('/join/' . $token),
        'sender' => $user->name,
        'colocation_name' => $colocation->name
    ];

    Mail::to($request->email)->send(new Mailinvetation($details));

    return back()->with('success', 'Invitation envoyée avec succès !');
}
}
//id	email	colocation_id	user_id	token	status	created_at	updated_at
