<?php

namespace App\Http\Controllers;

use Berkayk\OneSignal\OneSignalFacade as OneSignal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{


    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        // Validasi data dari form
        $data = $request->validate([
            'message' => 'required',
            'url' => 'nullable|url',
            // Tambahkan validasi lain jika perlu
        ]);

        try {
            OneSignal::sendNotificationToAll(
                $data['message'],                     // Pesan
                $data['url'] ?? null,                 // URL (jika ada)
                ["headings" => ["en" => "Notification Title"]]   // Headings
                // Anda bisa menambahkan parameter lain jika perlu
            );

            return redirect()->route('notifications.create')->with('status', 'Notification sent!');
        } catch (\Exception $e) {
            // Handle kesalahan di sini, misalnya:
            return redirect()->route('notifications.create')->with('error', 'Failed to send notification: ' . $e->getMessage());
        }
    }
}
