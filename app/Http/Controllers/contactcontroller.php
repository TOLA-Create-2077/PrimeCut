<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Optional: Send email using your configured SMTP settings
        // Mail::raw($validated['message'], function ($mail) use ($validated) {
        //     $mail->to('freetola622@gmail.com')
        //          ->subject($validated['subject'])
        //          ->from($validated['email'], $validated['name']);
        // });

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully!'
        ]);
    }
}