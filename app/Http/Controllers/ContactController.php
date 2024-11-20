<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Store a newly created contact in the database.
     */
    public function store(Request $request)
    {
        // Validate the form data including the photo
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'notes' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048', // Handle photo upload
        ]);

        // Handle photo upload
        $photo = null;
        if ($request->hasFile('photo')) {
            // Store photo in the 'photos' directory within the 'public' disk
            $photo = $request->file('photo')->store('photos', 'public');
        }

        // Save contact in the database, including the validated data and photo path
        Contact::create(array_merge($validated, ['photo' => $photo]));

        // Return with a success message
        return back()->with('success', 'Contact saved successfully!');
    }

    /**
     * Search for a contact by name.
     */
    public function search($name)
    {
        // Search for the contact by first or last name
        $contact = Contact::where('first_name', 'LIKE', "%$name%")
                          ->orWhere('last_name', 'LIKE', "%$name%")
                          ->first();

        if ($contact) {
            return response()->json(['found' => true, 'contact' => $contact]);
        }

        return response()->json(['found' => false]);
    }
}