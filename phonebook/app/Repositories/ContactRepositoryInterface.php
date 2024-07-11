<?php

namespace App\Repositories;

use App\Models\Contact;

interface ContactRepositoryInterface
{
    public function getAllContacts();
    public function getContactById($id);
    public function createContact(array $contactDetails);
    public function updateContact($id, array $newDetails);
    public function deleteContact($id);
}
