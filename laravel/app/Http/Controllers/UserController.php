<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function authWithGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
    function authCallback()
    {
        $userGoogle = Socialite::driver('google')->stateless()->user();
        $google_id = $userGoogle->getId();
        $name=$userGoogle->getName();
        $userDB = User::where('google_id',$google_id)->first();
        if ($userDB) {
            $userDB->tokens()->delete();
        }else{
            $userDB = User::create([
                'google_id' => $google_id,
                'nickname' => $name
            ]);
        }
        $tokenSanctum = $userDB->createToken('User Token', ['user-level'])->plainTextToken;
        return response([
           'token' => $tokenSanctum
        ]);
    }
    function listUser()
    {
        $users=User::all();
        return response(['users'=>$users]);
    }
    function banUser(User $user)
    {
        $user->isBanned=true;
        $user->save();
        return response(200);
    }
    function unBanUser(User $user)
    {
        $user->isBanned=false;
        $user->save();
        return response(200);
    }
    function getById(User $user)
    {
        return response(['user'=>$user]); 
    }
}
