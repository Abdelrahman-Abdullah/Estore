<?php

namespace App\Http\Controllers;

use App\Notifications\NewsletterSubscription;
use Illuminate\Http\Request;

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
        (new NewsletterSubscription())->toMail($request->validated());
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter.');
    }
}
