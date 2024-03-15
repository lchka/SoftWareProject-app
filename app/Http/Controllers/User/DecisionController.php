<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Decision; // Don't forget to import the Decision model
use Illuminate\Support\Facades\Auth;

class DecisionController extends Controller
{
    // Method to show the form for creating a new decision
    public function create()
    {
        return view('user.decisions.create');
    }

    // Method to store a newly created decision
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'car_model' => 'required|string|max:255',
            'car_brand' => 'required|string|max:255',
            'year_of_prod' => 'required|integer|min:1900|max:' . date('Y'),
            'decision_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('decision_image')) {
            $imagePath = $request->file('decision_image')->store('car_images');
            $validatedData['decision_image'] = $imagePath;
        }

        // Set the user_id field to the ID of the authenticated user
        $validatedData['user_id'] = Auth::id();

        $validatedData['status'] = 'pending'; // Set the status to pending

        // Create a new decision
        Decision::create($validatedData);

        return redirect()->route('decisions.create')->with('success', 'Decision created successfully!');
    }

    public function viewPastForms()
    {
        // Fetch the user's past submitted forms
        $pastForms = Decision::where('user_id', auth()->id())->get();

        return view('user.decisions.past_forms', compact('pastForms'));
    }
    public function show(Decision $decision)
    {
        return view('user.decisions.show', compact('decision'));
    }
     public function destroy(Decision $decision)
    {
        // Check if the user is authorized to delete the decision
        if ($decision->user_id == Auth::id()) {
            $decision->delete();
            return redirect()->route('user.decisions.past_forms')->with('success', 'Decision deleted successfully!');
        } else {
            return redirect()->route('user.decisions.past_forms')->with('error', 'You are not authorized to delete this decision!');
        }
    }
}
