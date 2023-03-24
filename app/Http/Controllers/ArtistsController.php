<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Artists;

class ArtistsController extends Controller
{
    public function list(){
        $myArtists = Artists::all();
        return view("artists.list",["artists" => $myArtists,]);
    }

    public function create(){
        return view("artists.add");
    }

    public function store(Request $request){
        $validated = $request->validate([
            "artistname" => "required|string|min:3",
            "artistdesc" => "required|string|min:5",
            "artistcategory" => "required",
            "artistwebsite" => "required|url",
        ]);

        if($validated) {
            $newArtist = new Artists();

            $newArtist->name = $request->artistname;
            $newArtist->description = $request->artistdesc;
            $newArtist->ofc_website = $request->artistwebsite;
            
            $newArtist->type = $request->artistcategory == 1 ? "solo" : "band";

            $newArtist -> save();

            return redirect('/artists/list');
        }
    }

    public function show($id)
    {
        $myArtist = Artists::find($id);
        if ($myArtist == null) {
            $error_message = "Nie znaleziono artysty o id=" . $id;
            return view('artists.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($myArtist->count() > 0) {
            return view('artists.show', ['artist' => $myArtist,]);
        }
    }

    public function edit($id)
    {
        $myArtist = Artists::find($id);
        if ($myArtist == null) {
            $error_message = "Nie znaleziono artysty o id=" . $id;
            return view('artists.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($myArtist->count() > 0) {
            return view('artists.edit', ['artist' => $myArtist,]);
        }
    }

    public function details($id)
    {
        $myArtist = Artists::find($id);
        if ($myArtist == null) {
            $error_message = "Nie znaleziono artysty o id=" . $id;
            return view('artists.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($myArtist->count() > 0) {
            return view('artists.details', ['artist' => $myArtist,]);
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "artistname" => "required|string|min:3",
            "artistdesc" => "required|string|min:5",
            "artistcategory" => "required",
            "artistwebsite" => "required|url",
        ]);

        if ($validated) {
            $artist = Artists::find($id);

            if ($artist != null) {

                $artist->name = $request->artistname;
                $artist->description = $request->artistdesc;
                $artist->ofc_website = $request->artistwebsite;
                $artist->type = $request->artistcategory == 1 ? "solo" : "band";
    
                $artist -> save();
    
                return redirect('/artists/list');
            } else {
                $error_message = "Nie znaleziono artysty o id=" . $id;
                return view('artists.message', ['message' => $error_message, 'type_of_message' => 'Error']);
            }
        }
    }

    public function destroy($id)
    {
        $artist = Artists::find($id);
        if ($artist != null) {
            $artist->delete();
            return redirect('/artists/list');
        } else {
            $error_message = "Nie znaleziono artysty o id=" . $id;
            return view('shipmodules.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
    }

}
