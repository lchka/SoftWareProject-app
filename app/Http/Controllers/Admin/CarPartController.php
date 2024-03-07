<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\CarPart;
use illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request;

class CarPartController extends Controller
{
    public function index()
    {
        $carparts = CarPart::all();
        return view('admin.carparts.index', compact('carparts'));
    }
}
