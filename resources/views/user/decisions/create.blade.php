@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Car Part</h2>
    <form method="POST" action="{{ route('carparts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="car_model">Car Model</label>
            <input type="text" class="form-control" id="car_model" name="car_model" required value="{{ old('car_model') }}">
            @error('car_model')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="car_brand">Car Brand</label>
            <input type="text" class="form-control" id="car_brand" name="car_brand" required value="{{ old('car_brand') }}">
            @error('car_brand')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="year_of_prod">Year of Production</label>
            <input type="number" class="form-control" id="year_of_prod" name="year_of_prod" required value="{{ old('year_of_prod') }}">
            @error('year_of_prod')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
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
