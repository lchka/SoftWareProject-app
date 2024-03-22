<?php

namespace App\Http\Controllers\User;

use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use App\Models\CarPart;
use App\Http\Controllers\Controller; 


class BasketController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        $basketItems = $user->carParts;

        return view('user.basket.index', compact('basketItems'));
    }
    public function addToBasket(Request $request, $car_part_id)
    {
        $user = User::find(auth()->id()); // Get the authenticated user
        $carPart = CarPart::findOrFail($car_part_id); // Retrieve the car part based on the ID
    
        // Attach the car part to the user's basket with quantity and price
        $quantity = $request->input('quantity', 1); // Default quantity to 1 if not provided
        $price = $carPart->price;
        
        $user->carParts()->attach($car_part_id, ['quantity' => $quantity, 'price' => $price]);
        return redirect()->back()->with('success', 'Product added to basket successfully');
    }

    public function removeFromBasket($car_part_id)
    {
        $user = User::find(auth()->id()); // Get the authenticated user
        $user->carParts()->detach($car_part_id);
        return redirect()->back()->with('success', 'Product removed from basket successfully');
    }
}
