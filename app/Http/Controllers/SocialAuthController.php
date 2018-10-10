<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class SocialAuthController extends Controller
{

    public function redirectToProvider($provider)
    {
        //return Socialite::driver('facebook')->redirect();

        return Socialite::driver($provider)
            ->fields([
                'accounts', 'id', 'name', 'email'
            ])->scopes([
                'manage_pages'
            ])->redirect();
    }


    public function handleProviderCallback($provider)
    {

         $user = Socialite::driver('facebook')->fields([
             'accounts', 'id', 'name', 'email', 'gender', 'birthday'
         ])->user();
        dd($user);
        // $user = Socialite::driver('facebook')->user(); // Fetch authenticated user

        // dd($user->gender);

        $user     = Socialite::driver($provider)->user();
        $authUser = $this->updateOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->to('/');
    }

    protected function updateOrCreateUser($user, $provider)
    {

        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        $data =  new User();
        $data->email    = $user->email;
        $data->name     = $user->name;
        $data->save();
        $data->socialaccounts()->create([
            'user_id'         => $data->id,
            'token_social'    => $user->token,
            'provider_name'   => $provider,
         ]);
        return $data;
    }
}
