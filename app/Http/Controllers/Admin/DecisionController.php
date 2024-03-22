<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Decision; // Don't forget to import the Decision model
use Illuminate\Support\Facades\Auth;

class DecisionController extends Controller
{
    public function index()
    {
        // Retrieve decided forms
        $decisions = Decision::where('status', 'pending')->get();

        // Return the view with the decided forms data
        return view('admin.decisions.decided', compact('decisions'));
    }
    public function show($id)
    {
        try {
            $decision = Decision::findOrFail($id);
            return view('admin.decisions.show', compact('decision'));
        } catch (\Exception $e) {
            // return redirect()->route('user.decisions.past_forms')->with('error', 'Decision not found.');
        }
    }
    public function create()
    {
        return view('user.decisions.create');
    }
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'car_model' => 'required|string|max:255',
            'car_brand' => 'required|string|max:255',
            'year_of_prod' => 'required|integer|min:1900|max:' . date('Y'),
            'decision_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('decision_image')) {
            $image = $request->file('decision_image');
            $imageName = time() . '.' . $image->extension();

            // Store the image in the 'public/decisions' directory
            $image->storeAs('public/decisions', $imageName);

            // Define the full path to the stored image
            $decision_image_name = 'storage/decisions/' . $imageName;
            $validatedData['decision_image'] = $decision_image_name;
        }

        // Set the user_id field to the ID of the authenticated user
        $validatedData['user_id'] = Auth::id();

        $validatedData['status'] = 'pending'; // Set the status to pending

        Decision::create($validatedData);
        return redirect()->route('welcome')->with('success', 'Decision created successfully!');
    }
    public function updateStatus(Request $request, $id)  {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:approved,denied',
            'points' => $request->status == 'approved' ? 'required|integer|min:0|max:2500' : '', // Only require points when status is approved
        ]);

        // Find the decision by ID
        $decision = Decision::findOrFail($id);

        // Update the status
        $decision->status = $request->status;

        // If status is approved, assign points to the user
        if ($request->status == 'approved') {
            // Increment the user's points
            $decision->user->increment('points', $request->points);
        }

        // Save the decision
        $decision->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Decision status updated successfully!');
    }
}
