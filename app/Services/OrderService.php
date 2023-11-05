<?php

namespace App\Services;

class OrderService
{
    public function storeOrder($totalPrice, $sessionId)
    {
        auth()->user()->orders()->create([
            'total_price' => $totalPrice,
            'session_id' => $sessionId,
        ]);
    }

    public function updateOrder($sessionId)
    {
        auth()->user()->orders()
            ->where('session_id', $sessionId)
            ->where('status', 'unpaid')
            ->update(['status' => 'paid']);
    }
}
