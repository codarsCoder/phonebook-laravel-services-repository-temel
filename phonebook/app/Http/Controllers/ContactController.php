<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        return view('contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = $this->contactService->getContactById($id);
        return view('contacts.show', compact('contact'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $this->contactService->createContact($request->all());
        return redirect()->route('contacts.index');
    }

    public function edit($id)
    {
        $contact = $this->contactService->getContactById($id);
        return view('contacts.edit', compact('contact'));
    }

    // public function update(Request $request, $id)
    // {
    //     $this->contactService->updateContact($id, $request->all());
    //     return redirect()->route('contacts.index');
    // }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $this->contactService->updateContact($id, $validatedData);

        return redirect()->route('contacts.index');
    }


    public function destroy($id)
    {
        $this->contactService->deleteContact($id);
        return redirect()->route('contacts.index');
    }
}
