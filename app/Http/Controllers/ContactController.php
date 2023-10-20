<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct(protected ContactService $contactService){}
    public function index()
    {
        return view('contact');
    }
    public function store(AddContactRequest $request)
    {
        $this->contactService->store($request->validated());
        return redirect()->route('contact.index')->with('message','Your message has been sent successfully');
    }
}
