<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use Socialite;

use App\User;

use Auth;

class Authenticate extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }   
    


    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try 
        {
            $user = Socialite::driver('google')->user();
            //dd($user);
        } 
        catch (Exception $e) 
        {
            return Redirect::to('auth/google');
        }

        if($user->id)
        {
           return redirect('/'); 
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');


    }

    private function findOrCreateUser($googleUser)
    {
        if ($authUser = User::where('google_id', $googleUser->id)->first()) 
        {
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar
        ]);
    }
}
