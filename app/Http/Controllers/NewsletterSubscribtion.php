<?php

namespace App\Http\Controllers;

use App\Notifications\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NewsletterSubscribtion extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        Notification::route('mail', $request->email)
            ->notify(new NewsletterSubscription());
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter.');
    }
}
