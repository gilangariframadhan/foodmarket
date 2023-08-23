<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class NotificationController extends Controller
{
    public function showForm()
    {
        return view('send-notification');
    }

    public function sendNotification(Request $request)
    {
        $message = $request->input('message');
        $users = User::all();

        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $twilio = new Client($sid, $token);

        foreach ($users as $user) {
            $phoneNumber = $user->phoneNumber; // Misalkan "081234567890"
            $internationalNumber = '+62' . substr($phoneNumber, 1); // Konversi ke format internasional

            $twilio->messages->create(
                'whatsapp:' . $internationalNumber, // Gunakan nomor yang sudah dikonversi
                [
                    'from' => 'whatsapp:' . config('services.twilio.whatsapp_number'),
                    'body' => $message
                ]
            );
        }

        return redirect()->back()->with('status', 'Notifikasi terkirim!');
    }
}
