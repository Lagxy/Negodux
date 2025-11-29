<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Display a listing of UMKM.
     */
    public function index()
    {
        $umkms = Umkm::all();
        return view('umkm', compact('umkms'));
    }

    /**
     * Show the form for creating a new UMKM.
     */
    public function create()
    {
        return view('umkm-register');
    }

    /**
     * Store a newly created UMKM in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'required|url',
            'description' => 'required|string',
            'owner' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'established' => 'required|string|max:4',
            'employees' => 'required|string',
            'needs' => 'required|string',
            'reward' => 'required|string',
            'milestones' => 'required|array|min:1',
            'milestones.*' => 'required|string',
        ]);

        Umkm::create($validated);

        return redirect('/umkm')->with('success', 'UMKM registered successfully!');
    }

    /**
     * Display the specified UMKM.
     */
    public function show($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('umkm-detail', compact('umkm'));
    }
}
