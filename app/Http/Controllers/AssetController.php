<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\User;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        $users = User::all();
        return view('assets.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'status' => 'required|in:Active,In-Active',
            'user_added_id' => 'required|exists:users,id',
        ]);

        Asset::create($request->all());

        return redirect()->route('assets.index')->with('success', 'Asset added successfully.');
    }

    public function edit(Asset $asset)
    {
        $users = User::all();
        return view('assets.edit', compact('asset', 'users'));
    }

    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'status' => 'required|in:Active,In-Active',
            'user_added_id' => 'required|exists:users,id',
        ]);

        $asset->update($request->all());

        return redirect()->route('assets.index')->with('success', 'Asset updated successfully.');
    }

    public function destroy(Asset $asset)
    {
        // Soft Delete the asset
        $asset->delete();

        // Redirect back to the assets list with a success message
        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully!');
    }
}

