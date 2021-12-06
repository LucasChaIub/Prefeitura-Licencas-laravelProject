<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityHall;
use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::query()
            ->select('id', 'name', 'term','contact_type_id','city_hall_id')
            ->with('cityHall:id,name,phone,city_id','contactType:id,name','cityHall.city:id,name')
            ->orderBy('name')
            ->latest()
            ->get();
        // dd($contacts);
        return view('contacts.index', ['contacts' => $contacts]);
    }


    public function create()
    {
        $contactTypes = ContactType::orderBy('name')->get(['id', 'name']);

        $cityHalls = CityHall::orderBy('name')->get(['id', 'name', 'phone']);

        return view('contacts.create', ['cityHalls' => $cityHalls, 'contactTypes' => $contactTypes]);
    }


    public function store()
    {
        $validateData = request()->validate([
            'name' => 'required|max:255',
            'term' => 'required|max:255',
            'contact_type_id' => 'required',
            'city_hall_id' => 'required',
        ]);
        $contacts = Contact::create($validateData);
        return redirect()->route('contacts.index', $contacts);
    }

    public function show(Contact $contact)
    {
        $contact->load(['cityHall'=> fn ($query) =>$query
            ->select('cityHall:id,name,phone,city_id', 'contactType:id,name', 'cityHall.city:id,name')
            ->with('cityHall:id,name,phone,city_id', 'contactType:id,name', 'cityHall.city:id,name')
            ->orderBy('name')
            ->latest()
            ->get()
        ]);
        $cities = City::orderBy('name')->get('id', 'name');
        return view('contacts.show', ['contact' => $contact, 'cities' => $cities]);
    }


    public function edit(Contact $contact)
    {
        $cities = City::orderBy('name')->get(['id', 'name']);
        $contactTypes = ContactType::orderBy('name')->get(['id', 'name']);
        $cityHalls = CityHall::orderBy('name')->get(['id', 'name','phone']);
        return view('contacts.edit', ['cityHalls' => $cityHalls ,'contactTypes' => $contactTypes, 'contact' => $contact, 'cities' => $cities]);
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
        return redirect()->route('contacts.index', ['contact' => $contact]);
    }

    public function destroy(Contact $contact)
    {
        return redirect()->route('contacts.index')->with('success', '<b>$contact->name</b> excluída.');
    }
}
