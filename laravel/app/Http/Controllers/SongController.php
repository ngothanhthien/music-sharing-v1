<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;

class SongController extends Controller
{
    function insertSongFromYID(Request $request){
        $yid=$request->yid;
    }
    function deleteFromUser(Song $song, User $user){
        
    }
    function banSong(Song $song){

    }
    function showFromUser(User $user){

    }
    function showFromDB(){

    }
    function showByTagsAnd(Request $request){

    }
    function showByTagsOr(Request $request){

    }
    function suggestSong(){

    }
}
