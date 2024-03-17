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
    public function updateStatus(Request $request, $id)
{
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
