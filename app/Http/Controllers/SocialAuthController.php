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

//https://www.facebook.com/groups/494852607355018/?fref=nf
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->fields([
             'accounts', 'id', 'name', 'email', 'gender', 'birthday', 'groups.limit(200)',
         ])->user();
       //dd($user);


        $forech = $user->user['groups']['data'];      
        foreach ($forech as $key => $data)
        {
            echo  "<br/>".$data['id']."<br/>";
            echo  "<br/>".$data['name']."<br/>";
        }
        exit();
         
         $user = Socialite::driver($provider)->fields([
             'accounts', 'id', 'name', 'email', 'gender', 'birthday', 'groups',
         ])->user();
        dd($user->user['groups']['data'][7]['id']);
        // $user = Socialite::driver('facebook')->user(); // Fetch authenticated user

        // dd($user->gender); https://developers.facebook.com/tools/explorer

        $user     = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->to('/');
    }

    protected function findOrCreateUser($user, $provider)
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
