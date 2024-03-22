<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; 
use App\Models\CarPart;
use illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request;

class CarPartController extends Controller
{
    public function index()
    {
        $carparts = CarPart::all();
        return view('user.carparts.index', compact('carparts'));
    }
    public function show($id)
    {
        $carpart = CarPart::findOrFail($id);
        return view('user.carparts.show', compact('carpart'));
    }
}
