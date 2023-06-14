<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        Profile::updateOrInsert([
            'user_id' => $id,
        ]);
        return view('admin.profile.index', [
            'user' => DB::table('users')
                ->join('profiles', 'users.id', '=', 'profiles.user_id')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->select('users.*', 'profiles.*', 'roles.role as role_name')
                ->where('users.id', $id)
                ->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', [
            'profile' => $profile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $validated = $request->validated();

        if ($request->file('image')) {
            if ($profile->image) {
                Storage::delete($profile->image);
            }
            $validated['image'] = $request->file('image')->store('/profile');
        }

        $profile->update($validated);

        return redirect('/profile')->with(
            'success',
            "User Profile $request->first_name has been updated!"
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
