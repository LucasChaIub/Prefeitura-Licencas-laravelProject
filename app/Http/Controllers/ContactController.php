<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::query()
        ->select('id', 'name', 'term', 'contact_type_id', 'city_hall_id')
        ->latest()
        ->paginate();
        return view('contact.index',['contact' => $contacts]);
    }


    public function create()
    {
        $contacts = Contact::orderBy('name')->get([
            'id',
            'name',
            'term',
            'contact_type_id',
            'city_hall_id'
        ]);
        return view('contact.create',['contact' => $contacts]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'term' => 'required|max:255',
            'contact_type_id' => 'required',
            'city_hall_id' => 'required'
        ]);
        $contact = Contact::create($validatedData);
        return redirect()->route('contacts.index', $contact);
    }


    public function show(Contact $contact)
    {
        return view('contacts.show', ['contact' => $contact]);
    }


    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', ['contact' => $contact]);
    }


    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'term' => 'required|max:255',
            'contact_type_id' => 'required',
            'city_hall_id' => 'required'
        ]);
        $contact->update($validatedData);
        return redirect()->route('contacts.index', $contact)->with('success', '<b>$contacts->name</b> atualizada.');
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
    }
}
