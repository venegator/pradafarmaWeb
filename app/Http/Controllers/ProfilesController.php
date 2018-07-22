<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @param  User $user
     * @return \Response
     */
    public function show(User $user)
    {
        return view('profiles.show', [
            'profileUser' => $user,
            'posts' => $user->posts()->latest()->get(),
            'threads' => $user->threads()->latest()->get(),
            'replies' => $user->replies()->latest()->get(),
            'eventos' => $user->eventos()->latest()->get(),
            'visitas' => $user->visitas()->latest()->get()
        ]);
    }
}
