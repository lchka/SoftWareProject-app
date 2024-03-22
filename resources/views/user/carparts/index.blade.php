@extends('layouts.app')

@section('content')
<x-alert-success>
                {{ session('success') }}
            </x-alert-success>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white leading-tight">
            All USER Car Parts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <!-- Filter Form -->
                <form method="GET" action="{{ route('welcome') }}" class="mb-3">
                    <!-- Filter Form Content -->
                </form>

                <!-- Display Car Parts -->
                @foreach ($carparts as $index => $carpart)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <!-- Car Part Details -->
                                <h2 class="card-title font-weight-bold mb-3">
                                    {{ $index + 1 }}. <a href="{{ route('user.carparts.show', $carpart) }}">{{ ucfirst($carpart->name) }}</a>
                                </h2>
                                <p class="card-text mb-2">
                                    <strong>Description:</strong> {{ ucfirst($carpart->description) }}
                                </p>
                                <p class="card-text mb-2">
                                    <strong>Car Brand:</strong> {{ ucfirst($carpart->car_brand) }}
                                </p>
                                <p class="card-text mb-2">
                                    <strong>Price:</strong> {{ $carpart->price }}
                                </p>
                                <p class="card-text">
                                    <!-- Car Part Image -->
                                    @if ($carpart->car_part_image)
                                        <a href="{{ route('user.carparts.show', $carpart) }}">
                                            <img src="{{ asset($carpart->car_part_image) }}" alt="{{ $carpart->name }}" class="img-fluid" style="max-width: 100px;">
                                        </a>
                                    @else
                                        No Image
                                    @endif
                                </p>
                                
                                <!-- Add to Basket Button -->
                                <form method="POST" action="{{ route('user.basket.add', $carpart->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Add to Basket</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="col-md-12">
                    <!-- Pagination Links -->
                </div>

            </div>
        </div>
    </div>
@endsection
