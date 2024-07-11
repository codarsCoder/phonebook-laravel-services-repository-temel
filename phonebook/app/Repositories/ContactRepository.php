<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository implements ContactRepositoryInterface
{
    public function getAllContacts()
    {
        return Contact::all();
    }

    public function getContactById($id)
    {
        return Contact::findOrFail($id);
    }

    public function createContact(array $contactDetails)
    {
        return Contact::create($contactDetails);
    }

    public function updateContact($id, array $newDetails)
    {
        return Contact::whereId($id)->update($newDetails);
    }

    public function deleteContact($id)
    {
        return Contact::destroy($id);
    }
}
