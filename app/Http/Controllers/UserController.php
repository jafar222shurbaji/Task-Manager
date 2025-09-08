<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get()->all();
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getuserprofile($id)
    {
        //$user = User::find($id);
        $profile = Profile::where('user_id', $id);
        //$user = User::with('profile')->find($id);


        return response()->json($profile, 200);
    }

    public function getusertasks($id)
    {
        //$user = User::find($id);
        $tasks = Task::where('user_id', $id)->get();
        //$user = User::with('profile')->find($id);


        return response()->json($tasks, 200);
    }


    public function printing()
    {
        $users = [
            ['id' => 1, 'name' => 'jafar']
        ];
        foreach ($users as $user) {
            echo $user['id'] . "=>" . $user['name'];
        }

    }
}

