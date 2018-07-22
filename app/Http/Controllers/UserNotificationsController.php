<?php

namespace App\Http\Controllers;

use App\User;

class UserNotificationsController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function asRead(User $user)
    {
    	$user->unreadNotifications->markAsRead();

    	return back();
    }
}
