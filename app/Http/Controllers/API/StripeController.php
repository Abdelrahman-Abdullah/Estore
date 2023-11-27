<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\PaymentRequest;
use App\Services\OrderService;
use App\Services\StripeService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;


class StripeController extends Controller
{
    public function __construct(protected StripeService $stripe)
    {

    }

    public function getClientSecretKey(PaymentRequest $request): JsonResponse
    {
        try {
            // Set your secret key. Remember to switch to your live secret key in production!
            Stripe::setApiKey(config('stripe.secret_key'));
            // Check If There Is A Customer Or Create One
            $customerId = $this->stripe->isThereCustomerOrCreate();
            // Create Ephemeral Key
            $ephemeralKey = $this->stripe->createEphemeralKey($customerId);
            // Create Payment Intent
            $paymentIntent = $this->stripe->createPaymentIntent($request->amount, $customerId);
            // Response With The Keys
            return response()->json(
                [
                    'public_key' => config('stripe.public_key'),
                    'client_secret_key' => $paymentIntent->client_secret,
                    'paymentIntentId' => $paymentIntent->id,
                    'ephemeralKey' => $ephemeralKey->secret,
                    'customer' => $customerId,
                    'success' => true,
                ], 200
            );
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

    public function checkPaymentStatus(Request $request): JsonResponse
    {
        $request->validate(['paymentIntentId' => 'required']);
        try {
            Stripe::setApiKey(config('stripe.secret_key'));
            $paymentIntent = \Stripe\PaymentIntent::retrieve($request->paymentIntentId);
            return response()->json(['status' => $paymentIntent->status], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
