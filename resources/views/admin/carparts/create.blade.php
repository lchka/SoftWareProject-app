@extends('layouts.app')

@section('content')
<x-alert-success>
    {{ session('success') }}
</x-alert-success>
<div class="container">
    <h2>Create New Car Part</h2>
    <form action="{{ route('admin.carparts.store') }}" method="post" enctype="multipart/form-data" novalidate>
        @csrf

        <div class="form-group my-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Description" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="car_model">Car Model</label>
            <input type="text" class="form-control" id="car_model" name="car_model" placeholder="Car Model" value="{{ old('car_model') }}" required>
            @error('car_model')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="car_brand">Car Brand</label>
            <input type="text" class="form-control" id="car_brand" name="car_brand" placeholder="Car Brand" value="{{ old('car_brand') }}" required>
            <div id="brandSuggestions" class="list-group"></div> <!-- Suggestions will be displayed here -->
            @error('car_brand')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}" required min="10.00" max="900.00" step="0.01">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="point_price">Point Price</label>
            <input type="text" class="form-control" id="point_price" name="point_price" placeholder="Point Price" value="{{ old('point_price') }}" required>
            @error('point_price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="year_of_prod">Year of Production</label>
            <input type="number" class="form-control" id="year_of_prod" name="year_of_prod" placeholder="Year of Production" value="{{ old('year_of_prod') }}" required min="1960" max="{{ date('Y') }}">
            @error('year_of_prod')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="usage_level">Usage Level</label>
            <select class="form-select" id="usage_level" name="usage_level" required>
                <option value="">Select Usage Level</option>
                @foreach(['New', 'Like New', 'Good', 'Fair', 'Poor'] as $level)
                    <option value="{{ $level }}" {{ old('usage_level') == $level ? 'selected' : '' }}>{{ $level }}</option>
                @endforeach
            </select>
            @error('usage_level')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="car_part_image">Car Part Image</label>
            <input type="file" class="form-control-file" id="car_part_image" name="car_part_image" required>
            @error('car_part_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    const brands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai', 'Kia', 'Subaru', 'Jeep', 'Tesla', 'Lexus', 'Mazda', 'Volvo', 'Porsche', 'Ferrari', 'Mitsubishi'];

    document.getElementById('car_brand').addEventListener('input', function(event) {
        const input = event.target.value.toLowerCase();
        const suggestions = brands.filter(brand => brand.toLowerCase().startsWith(input));
        const suggestionsHTML = suggestions.map(suggestion => `<a href="#" class="list-group-item list-group-item-action">${suggestion}</a>`).join('');
        document.getElementById('brandSuggestions').innerHTML = suggestionsHTML;
    });

    document.getElementById('brandSuggestions').addEventListener('click', function(event) {
        if (event.target.tagName === 'A') {
            document.getElementById('car_brand').value = event.target.textContent;
            document.getElementById('brandSuggestions').innerHTML = '';
        }
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('#car_brand')) {
            document.getElementById('brandSuggestions').innerHTML = '';
        }
    });
</script>

@endsection
