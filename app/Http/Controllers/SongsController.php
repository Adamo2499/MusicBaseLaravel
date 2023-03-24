<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Songs;
use App\Models\Artists;
use App\Models\Albums;

class SongsController extends Controller
{
    public function list(){
        $mySongs = Songs::all();
        $myArtists = Artists::all();
        $myAlbums = Albums::all();
        return view("songs.list",["songs" => $mySongs,"artists" => $myArtists,"albums" => $myAlbums]);
    }

    public function create(){
        $myArtists = Artists::all();
        $myAlbums = Albums::all();
        // $albums = Albums::get("name")->where('');
        return view("songs.add",["artists" => $myArtists,"albums" => $myAlbums,]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "songname" => "required|string",
            "songperformer" => "required",
            "songduration" => "required|regex:/^0[0-5]{1}\\:[0-5]{1}[0-9]{1}$/u",
            "songgenre" => "required|string",
            "songalbumid" => "required|numeric",
        ]);

        if($validated) {
            $newSong = new Songs();

            $newSong->title = $request->songname;
            $newSong->performer = $request->songperformer;
            $newSong->duration = $request->songduration;
            $newSong->genre = $request->songgenre;
            $newSong->albumid = $request->songalbumid;

            $newSong -> save();

            return redirect('/songs/list');
        }
    }

    public function show($id)
    {
        $mySong = Songs::find($id);
        $myArtists = Artists::all();
        $myAlbums = Albums::all();
        if ($mySong == null) {
            $error_message = "Nie znaleziono piosenki o id=" . $id;
            return view('songs.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($mySong->count() > 0) {
            return view('songs.show', ['song' => $mySong,"artists" => $myArtists,"albums" => $myAlbums,]);
        }
    }

    public function edit($id)
    {
        $mySong = Songs::find($id);
        $myArtists = Artists::all();
        $myAlbums = Albums::all();
        if ($mySong == null) {
            $error_message = "Nie znaleziono piosenki o id=" . $id;
            return view('songs.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($mySong->count() > 0) {
            return view('songs.edit', ['song' => $mySong,"artists" => $myArtists,"albums" => $myAlbums,]);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "songname" => "required|string",
            "songperformer" => "required",
            "songduration" => "required|regex:/^0[0-5]{1}\\:[0-5]{1}[0-9]{1}$/u",
            "songgenre" => "required|string",
            "songalbumid" => "required|numeric",
        ]);

        if ($validated) {
            $song = Songs::find($id);

            if ($song != null) {

                $song->title = $request->songname;
                $song->performer = $request->songperformer;
                $song->duration = $request->songduration;
                $song->genre = $request->songgenre;
                $song->albumid = $request->songalbumid;
    

                $song -> save();
    
                return redirect('/songs/list');
            } else {
                $error_message = "Nie znaleziono piosenki o id=" . $id;
                return view('songs.message', ['message' => $error_message, 'type_of_message' => 'Error']);
            }
        }
    }

    public function destroy($id)
    {
        $song = Songs::find($id);
        if ($song != null) {
            $song->delete();
            return redirect('/songs/list');
        } else {
            $error_message = "Nie znaleziono piosenki o id=" . $id;
            return view('songs.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
    }

}
