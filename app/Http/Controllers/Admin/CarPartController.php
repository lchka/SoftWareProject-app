<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\CarPart;
use Illuminate\Http\Request;

class CarPartController extends Controller
{
    public function index()
    {
        $carparts = CarPart::all();
        return view('admin.carparts.index', compact('carparts'));
    }

    public function show($id)
    {
        $carpart = CarPart::findOrFail($id);
        return view('admin.carparts.show', compact('carpart'));
    }

    public function create()
    {
        return view('admin.carparts.create');
    }

    // Store a newly created car part in storage.
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'car_model' => 'required|string|max:255',
            'car_brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:10|max:900',
            'point_price' => 'required|string', // Assuming point_price is a string
            'year_of_prod' => 'required|integer|min:1960|max:' . date('Y'),
            'usage_level' => 'required|string|in:New,Like New,Good,Fair,Poor',
            'car_part_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        // Handle file upload
        if ($request->hasFile('car_part_image')) {
            $image = $request->file('car_part_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
    
            // Store the image in the 'public/carparts' directory
            $image->storeAs('public/carparts', $imageName);
    
            // Define the full path to the stored image
            $car_part_image_path = 'storage/carparts/' . $imageName;
            $validatedData['car_part_image'] = $car_part_image_path;
        }

        // Create the car part
        CarPart::create($validatedData);
    
        return redirect()->route('admin.carparts.index')->with('success', 'Car part created successfully!');
    }
    public function destroy($id)
    {
        $carPart = CarPart::findOrFail($id);
        $carPart->delete();

        return redirect()->route('admin.carparts.index')->with('success', 'Car part deleted successfully!');
    }

    // Show the form for editing the specified car part.
    public function edit($id)
    {
        $carPart = CarPart::findOrFail($id);
        return view('admin.carparts.edit', compact('carPart'));
    }

    // Update the specified car part in storage.
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'car_model' => 'required|string|max:255',
            'car_brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:10|max:900',
            'point_price' => 'required|string',
            'year_of_prod' => 'required|integer|min:1960|max:' . date('Y'),
            'usage_level' => 'required|string|in:New,Like New,Good,Fair,Poor',
            'car_part_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $carPart = CarPart::findOrFail($id);

        // Update car part details
        $carPart->update($validatedData);

        // Handle file upload if there's a new image
        if ($request->hasFile('car_part_image')) {
            $image = $request->file('car_part_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Store the image in the 'public/carparts' directory
            $image->storeAs('public/carparts', $imageName);

            // Define the full path to the stored image
            $car_part_image_path = 'storage/carparts/' . $imageName;
            
            // Update the image path
            $carPart->car_part_image = $car_part_image_path;
            $carPart->save();
        }

        return redirect()->route('admin.carparts.index')->with('success', 'Car part updated successfully!');
    }
}
