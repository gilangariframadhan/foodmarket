<?php

namespace App\Http\Controllers;

use App\Notifications\MyEmailNotification;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailNotificationController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('email-notify', compact('users'));
    }

    public function send(Request $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $message = $request->input('message');

        $user->notify(new MyEmailNotification($message));

        return redirect()->back()->with('status', 'Notifikasi telah dikirim!');
    }
}
