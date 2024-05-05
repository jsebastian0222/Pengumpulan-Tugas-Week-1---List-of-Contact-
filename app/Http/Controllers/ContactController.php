<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
      
        $existingContacts = Cookie::get('contact_data') ? unserialize(Cookie::get('contact_data')) : [];
        $existingContacts[] = $validatedData;

        Cookie::queue('contact_data', serialize($existingContacts), 5);
        return redirect('/contactlist');
    }

    public function deleteCookies(Request $request)
    {
        $index = $request->input('index');
        $serializedContactData = Cookie::get('contact_data');

        if ($serializedContactData) {
         
            $contactData = unserialize($serializedContactData);
    
            if (isset($contactData[$index])) {
                unset($contactData[$index]);
                Cookie::queue('contact_data', serialize($contactData), 5);
                return redirect('/contactlist')->with('success', 'Contact deleted successfully!');
            }
        }
        return redirect('/contactlist')->with('error', 'Unable to delete contact. Please try again.');
    }

    public function showContactList()
    {
        $serializedContactData = Cookie::get('contact_data');
        $contacts = [];
        if ($serializedContactData) {
        
            $contactData = unserialize($serializedContactData);
            $contacts = is_array($contactData) ? $contactData : [$contactData];
        }

        return view('contactlist', compact('contacts'));
    }
}