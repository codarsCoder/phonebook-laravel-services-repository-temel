<?php

namespace App\Services;
use App\Repositories\ContactRepositoryInterface;


class ContactService
{
    protected $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllContacts()
    {
        return $this->contactRepository->getAllContacts();
    }

    public function getContactById($id)
    {
        return $this->contactRepository->getContactById($id);
    }

    public function createContact(array $contactDetails)
    {
        return $this->contactRepository->createContact($contactDetails);
    }

    public function updateContact($id, array $newDetails)
    {
        return $this->contactRepository->updateContact($id, $newDetails);
    }

    public function deleteContact($id)
    {
        return $this->contactRepository->deleteContact($id);
    }
}
