@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Recycle Car Part</h2>
    <form action="{{ route('decisions.store') }}" method="post" enctype="multipart/form-data" novalidate onsubmit="return confirm('Please ensure to review the form details carefully prior to submission, as amendments will not be permitted!!!!') ? true : false;">
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
            @error('car_brand')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="year_of_prod">Year of Production</label>
            <input type="number" class="form-control" id="year_of_prod" name="year_of_prod" placeholder="Year of Production" value="{{ old('year_of_prod') }}" required>
            @error('year_of_prod')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="decision_image">Image</label>
            <input type="file" class="form-control-file" id="decision_image" name="decision_image">
            @error('decision_image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
