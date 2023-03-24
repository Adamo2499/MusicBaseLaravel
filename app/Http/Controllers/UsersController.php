<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function list(){
        $myUsers = User::all();
        return view("users.list",["users" => $myUsers]);
    }

    public function edit($id){
        $user = User::find($id);
        if ($user != null) {
            return view('/users/edit',["user"=> $user]);
        } else {
            $error_message = "Nie znaleziono usera o id=" . $id;
            return view('users.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        if ($user != null) {
            $user->type = $request->usertype;
            $user->save();
            return redirect('/users/list');
        } else {
            $error_message = "Nie znaleziono usera o id=" . $id;
            return view('users.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }

    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user == null) {
            $error_message = "Nie znaleziono usera o id=" . $id;
            return view('users.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
        if ($user->count() > 0) {
            return view('users.show', ['user' => $user,]);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
            return redirect('/users/list');
        } else {
            $error_message = "Nie znaleziono usera o id=" . $id;
            return view('albums.message', ['message' => $error_message, 'type_of_message' => 'Error']);
        }
    }
}
