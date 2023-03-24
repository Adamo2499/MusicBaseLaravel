<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Playlists;
use App\Models\PLElements;
use App\Models\Songs;
use App\Models\Artists;
use App\Models\Albums;

class PlaylistsController extends Controller
{
    public function list() {
        $user = auth()->user();
        $myPlaylists = DB::table('playlists')
            ->join('users','playlists.ownerid','=','users.id')
            ->where('playlists.ownerid',$user->id)
        ->get(['playlists.name','playlists.size']);
        $songsOnPlaylists = DB::table('songs')
            ->join('plelements','plelements.songid','=','songs.id')
            ->get('*');
            $myArtists = Artists::all();
            $myAlbums = Albums::all();
        return view('playlists.list',[
            'playlists' => $myPlaylists,
            'songs' => $songsOnPlaylists,
            "artists" => $myArtists,
            "albums" => $myAlbums,
        ]);
    }

    public function create(){
        $user = auth()->user();
        $myPlaylists = Playlists::all()->where('onwerid',$user->id);
        $mySongs = Songs::all();
        return view('playlists.add',[
            'playlists' => $myPlaylists,
            'songs' => $mySongs,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "playlistname" => "required|string|min:3"
        ]);

        if($validated) {
            return redirect('/playlist/list');
        }
    }

    public function expand(){
        $myPlaylists = DB::table('playlists');
    }
}
