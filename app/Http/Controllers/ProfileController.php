<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::get()->all();
        return response()->json($profile, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->validated());

        return response()->json(
            [
                'message' => 'the profile has been created',
                'profile' => $profile,
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = Profile::find($id)->first();
        return response()->json($profile, 200);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->validated());
        return response()->json([
            "profile" => $profile,
            "message" => "profile has been updated"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return response()->json('the profile id has been deleted');
    }
}
