<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.add'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'telephone' => 'nullable|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', // Format: 123-456-7890
            'address' => 'nullable',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->telephone = $request->telephone;
        $client->address = $request->address;

        if ($request->hasFile('company_logo')) {
            $path = $request->file('company_logo')->store('public/logos');
            $client->company_logo = str_replace('public/', '', $path);
        }

        $client->save();

        return redirect('/dashboard')->with('success', 'Client added successfully!');
    }
}

