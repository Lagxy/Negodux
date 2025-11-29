<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of mentors.
     */
    public function index()
    {
        $mentors = Mentor::all();
        return view('mentors', compact('mentors'));
    }

    /**
     * Show the form for creating a new mentor.
     */
    public function create()
    {
        return view('mentor-register');
    }

    /**
     * Store a newly created mentor in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'photo' => 'required|url',
            'expertise' => 'required|string',
            'years_experience' => 'required|string',
            'email' => 'required|email',
            'about' => 'required|string',
            'education' => 'required|string',
            'areas_of_expertise' => 'required|array|min:1',
            'areas_of_expertise.*' => 'required|string',
            'achievements' => 'required|array|min:1',
            'achievements.*' => 'required|string',
            'portfolio' => 'required|array|min:1',
            'portfolio.*.title' => 'required|string',
            'portfolio.*.description' => 'required|string',
        ]);

        Mentor::create($validated);

        return redirect('/mentors')->with('success', 'Mentor registered successfully!');
    }

    /**
     * Display the specified mentor.
     */
    public function show($id)
    {
        $mentor = Mentor::findOrFail($id);
        return view('mentor-detail', compact('mentor'));
    }
}
