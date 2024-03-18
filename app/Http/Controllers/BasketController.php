<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function addToBasket(Request $request, $car_part_id)
    {
        $user = auth()->user(); // Assuming you're using authentication
      $user->carParts()->attach($car_part_id,['quantity'=>$request->quantity]);
        return redirect()->back()->with('success', 'Product added to basket successfully');
    }

    public function removeFromBasket($car_part_id)
    {
        $user = auth()->user(); // Assuming you're using authentication
        $user->carParts()->detach($car_part_id);
        return redirect()->back()->with('success', 'Product removed from basket successfully');
    }
}
