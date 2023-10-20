<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function store($request)
    {
        Contact::create($request);
    }
}
