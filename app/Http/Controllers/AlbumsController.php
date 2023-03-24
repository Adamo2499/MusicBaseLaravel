<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artists;
use App\Models\Albums;


class AlbumsController extends Controller
{
    public function list()
    {
        $myAlbums = Albums::all();
        $artists = Artists::all();
        return view("albums.list", ["albums" => $myAlbums,]);
    }

    public function create()
    {
        $myArtists = Artists::all();
        $myAlbums = Albums::all();
        return view("albums.add", ["artists" => $myArtists, "albums" => $myAlbums,]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'albumname' => 'required|string',
            'albumperformer' => 'required',
            'albumcategory' => 'sometimes|string',
            'albumpublishingyear' => 'numeric'
        ]);

        if ($validated) {
            $newAlbum = new Albums();

            $newAlbum->name = $request->albumname;
            $newAlbum->artistid = $request->albumperformer;
            $newAlbum->category = $request->albumcategory;
            $newAlbum->publishingyear = $request->albumpublishingyear;
            $newAlbum->save();

            return redirect('/albums/list');
        }
    }

    public function show($id)
    {
        $myAlbum = Albums::find($id);
        $myArtists = Artists::all();
        $myAlbums = Albums::all();
        if ($myAlbum == null) {
            $error_message = "Nie znaleziono albumu o id=" . $id;
            return view('albums.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($myAlbum->count() > 0) {
            return view('albums.show', ['album' => $myAlbum, "artists" => $myArtists, "albums" => $myAlbums,]);
        }
    }

    public function edit($id)
    {
        $myAlbum = Albums::find($id);
        $myArtists = Artists::all();
        $myAlbums = Albums::all();

        if ($myAlbum == null) {
            $error_message = "Nie znaleziono albumu o id=" . $id;
            return view('albums.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($myAlbum->count() > 0) {
            return view('albums.edit', ['album' => $myAlbum, "artists" => $myArtists, "albums" => $myAlbums,]);
        }
    }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'albumname' => 'required|string',
            'albumperformer' => 'required',
            'albumcategory' => 'sometimes|string',
            'albumpublishingyear' => 'numeric'
        ]);

        if ($validated) {
            $album = Albums::find($id);

            if ($album != null) {

                $album->name = $request->albumname;
                $album->artistid = $request->albumperformer;
                $album->category = $request->albumcategory;
                // $album->coverimage = $request->file('albumcoverimage')->getClientOriginalName();
                $album->publishingyear = $request->albumpublishingyear;
                $album->save();

                return redirect('/albums/list');
            } else {
                $error_message = "Nie znaleziono albumu o id=" . $id;
                return view('albums.message', ['message' => $error_message, 'type_of_message' => 'Error']);
            }
        }
    }

    public function destroy($id)
    {
        $artist = Albums::find($id);
        if ($artist != null) {
            $artist->delete();
            return redirect('/albums/list');
        } else {
            $error_message = "Nie znaleziono albumu o id=" . $id;
            return view('albums.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
    }

    public function details($id)
    {
        $myAlbum = Albums::find($id);
        $myArtists = Artists::all();
        $myAlbums = Albums::all();
        if ($myAlbum == null) {
            $error_message = "Nie znaleziono albumu o id=" . $id;
            return view('albums.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($myAlbum->count() > 0) {
            return view('albums.details', ['album' => $myAlbum, "artists" => $myArtists, "albums" => $myAlbums,]);
        }
    }

}