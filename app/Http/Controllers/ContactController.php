<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Database\QueryException;

class ContactController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $publicContacts = Contact::where('public', true)->get();
        $privateContacts = Contact::where('user_id', $user->id)->get();

        return view('contacts.index', compact('publicContacts', 'privateContacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $email = $request->input('email');

        if (Contact::where('email', $email)->exists()) {
            return redirect()->route('contacts.create')->with('error', 'Email already exists.');
        }

        // $request->validate([
        //     'name' => 'required|string|min:5',
        //     'contact' => 'required|string|min:9',
        //     'email' => 'required|string|email',
        //     'public' => 'required|boolean',
        //     'user_id' => 'required|integer',
        // ]);

        try {
            $contact = new Contact([
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
                'email' => $email,
                'public' => $request->input('public'),
                'user_id' => $request->input('user_id'),
            ]);

            $contact->save();

            return redirect()->route('contacts.create')->with('success', 'Contact created successfully!');
        } catch (QueryException $e) {
            return redirect()->route('contacts.create')->with('error', 'An error occurred while creating the contact.');
        }
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found.');
        }

        return view('contacts.edit', compact('contact'));
    }


    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $newEmail = $request->input('email');
        $currentEmail = $contact->email;

        if ($newEmail !== $currentEmail && Contact::where('email', $newEmail)->exists()) {
            return redirect()->route('contacts.edit', $id)->with('error', 'Email already exists.');
        }

        $request->validate([
            'name' => 'required|string|min:5',
            'contact' => 'required|string|min:9',
            'email' => 'required|string|email',
            'public' => 'required|boolean',
            'user_id' => 'required|integer',
        ]);

        $contact->name = $request->input('name');
        $contact->contact = $request->input('contact');
        $contact->email = $request->input('email');
        $contact->public = $request->input('public');
        $contact->user_id = $request->input('user_id');

        try {
            $contact->save();
            return redirect()->route('contacts.edit', $id)->with('success', 'Contact updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('contacts.edit', $id)->with('error', 'Error updating contact. Please try again.');
        }
    }



    public function destroy($id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found.');
        }

        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}
