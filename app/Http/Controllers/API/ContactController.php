<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(protected ContactService $contactService){}

    public function store(AddContactRequest $request)
    {
        $this->contactService->store($request->validated());
        return response()->json([
            'message' => 'Your message has been sent successfully',
            'statusCode' => 201
        ], 201);
    }
}
