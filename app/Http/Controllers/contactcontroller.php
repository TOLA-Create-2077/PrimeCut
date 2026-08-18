<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle incoming AJAX contact/quote submissions from the frontend.
     */
    public function sendEmail(Request $request)
    {
        return $this->store($request);
    }

    /**
     * Store a newly created contact/quote submission from frontend AJAX and send notification email.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'subject'  => 'required|string|max:255',
            'message'  => 'nullable|string',
            'phone'    => 'nullable|string|max:50',
            'company'  => 'nullable|string|max:255',
            'product'  => 'nullable|string|max:255',
            'quantity' => 'nullable|string|max:100',
        ]);

        try {
            // 1. Save submission to the database
            $contact = Contact::create($validated);

            // 2. Build the email body dynamically (omitting empty fields instead of showing N/A)
            $emailBody = "You have a new website submission:\n\n";
            $emailBody .= "Name: {$validated['name']}\n";
            $emailBody .= "Email: {$validated['email']}\n";

            if (!empty($validated['phone'])) {
                $emailBody .= "Phone: {$validated['phone']}\n";
            }
            if (!empty($validated['company'])) {
                $emailBody .= "Company: {$validated['company']}\n";
            }
            if (!empty($validated['product'])) {
                $emailBody .= "Product: {$validated['product']}\n";
            }
            if (!empty($validated['quantity'])) {
                $emailBody .= "Quantity: {$validated['quantity']}\n";
            }

            $emailBody .= "\nMessage / Details:\n" . ($validated['message'] ?? 'No message provided');

            // 3. Send email notification to freetola622@gmail.com using only the submitted subject
            Mail::raw($emailBody, function ($message) use ($validated) {
                $message->to('freetola622@gmail.com')
                        ->subject($validated['subject'])
                        ->replyTo($validated['email'], $validated['name']);
            });

            return response()->json([
                'success' => true,
                'message' => 'Your message has been saved and sent successfully!',
                'data'    => $contact
            ], 200);

        } catch (\Exception $e) {
            Log::error('Contact Submission & Email Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to send your message. Please try again later.'
            ], 500);
        }
    }
}