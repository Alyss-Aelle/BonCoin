<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use App\Models\Annonce;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    //AUTH::user()->id recupère l'identifiant de l'utilisateur connecté
    public function favorisAdd($id=0)
    {
        # code...
        $annonce = Annonce::FindOrFail($id);
        //Verifier que l'article existe
        $existFavori = Favori::where('annonce_id',$id)->where('user_id',Auth::user()->id)->first();
        
        if (!empty($existFavori)) {
            // si il existe deja 
            Favori::where('annonce_id',$id)->where('user_id',Auth::user()->id)->delete();
        } else {
            //on ajoute en favori
            $favorisModel = new Favori ;
            $favorisModel->annonce_id =$id ;
            $favorisModel->user_id = Auth::user()->id ;
            $favorisModel->save() ;
            
        }

             return back();


    
       
    }
}
