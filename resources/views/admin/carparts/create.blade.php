@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create New Car Part</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.carparts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="car_model" class="form-label">Car Model</label>
                    <input type="text" class="form-control" id="car_model" name="car_model" required>
                </div>
                <div class="mb-3">
                    <label for="car_brand" class="form-label">Car Brand</label>
                    <select class="form-select" id="car_brand" name="car_brand" required>
                        <option value="">Select Car Brand</option>
                        @foreach(['Toyota','Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai', 'Kia', 'Subaru', 'Jeep', 'Tesla', 'Lexus', 'Mazda', 'Volvo', 'Porsche', 'Ferrari', 'Mitsubishi'] as $brand)
                            <option value="{{ $brand }}">{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" min="10.00" max="900.00" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="year_of_prod" class="form-label">Year of Production</label>
                    <input type="number" class="form-control" id="year_of_prod" name="year_of_prod" min="1900" max="{{ date('Y') }}" required>
                </div>
                <div class="mb-3">
                    <label for="usage_level" class="form-label">Usage Level</label>
                    <select class="form-select" id="usage_level" name="usage_level" required>
                        <option value="">Select Usage Level</option>
                        @foreach(['New', 'Like New', 'Good', 'Fair', 'Poor'] as $level)
                            <option value="{{ $level }}">{{ $level }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="car_part_image" class="form-label">Car Part Image</label>
                    <input type="file" class="form-control" id="car_part_image" name="car_part_image" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Car Part</button>
            </form>
        </div>
    </div>
</div>
@endsection
