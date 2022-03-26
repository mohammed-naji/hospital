<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SimpleNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {

        $user = User::find(1);
        $user->notify( new SimpleNotification );

    }

    public function user_notification()
    {
        $user = User::find(1);
        return view('user_notification', compact('user'));
    }

    public function read($id)
    {
        $user = User::find(1);
        $user->notifications()->find($id)->markAsRead();
        return redirect()->back();
    }

    public function read_all()
    {
        $user = User::find(1);
        $user->unreadNotifications->markAsRead();
        // dd($user->unreadNotifications());
        return redirect()->back();
    }
}
