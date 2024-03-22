@extends('layouts.app')

@section('content')
<div class="container">
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
    <h2>Car Part Details</h2>
    <div class="card">
        <div class="card-body">

            <h5 class="card-title">{{ $carpart->name }}</h5>
            <p class="card-text">{{ $carpart->description }}</p>
            <p class="card-text"><strong>Car Model:</strong> {{ $carpart->car_model }}</p>
            <p class="card-text"><strong>Car Brand:</strong> {{ $carpart->car_brand }}</p>
            <p class="card-text"><strong>Price:</strong> {{ $carpart->price }}</p>
            <p class="card-text"><strong>Year of Production:</strong> {{ $carpart->year_of_prod }}</p>
            <p class="card-text"><strong>Usage Level:</strong> {{ $carpart->usage_level }}</p>
            <p class="card-text"><strong>Car Part Image:</strong></p>
            <!-- Add to Basket Button -->

            <div class="d-flex">
                <img src="{{ asset($carpart->car_part_image) }}" alt="Car Part Image" width="400" height="400">
                <div class="mx-4">
                    <form method="POST" action="{{ route('user.basket.add', $carpart->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add to Basket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection