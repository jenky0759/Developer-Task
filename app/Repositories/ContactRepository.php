<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Interfaces\IContactRepository;

class ContactRepository extends BaseRepository implements IContactRepository
{
    function __construct(Contact $contact)
    {
        parent::__construct($contact);
    }
}
