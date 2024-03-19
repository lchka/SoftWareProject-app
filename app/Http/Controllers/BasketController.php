<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;

class BasketController extends Controller
{

    public function addToBasket(Request $request, $car_part_id)
    {
        $user = User::find(auth()->id()); // Get the authenticated user
        $user->carParts()->attach($car_part_id, ['quantity' => $request->quantity]);
        return redirect()->back()->with('success', 'Product added to basket successfully');
    }

    public function removeFromBasket($car_part_id)
    {
        $user = User::find(auth()->id()); // Get the authenticated user
        $user->carParts()->detach($car_part_id);
        return redirect()->back()->with('success', 'Product removed from basket successfully');
    }
}
