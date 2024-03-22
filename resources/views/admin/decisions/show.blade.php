@extends('layouts.app')

@section('content')
<x-alert-success>
                {{ session('success') }}
            </x-alert-success>
<div class="container">
    <h2>Decision Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $decision->name }}</h5>
            <p class="card-text">{{ $decision->description }}</p>
            <p class="card-text"><strong>Car Model:</strong> {{ $decision->car_model }}</p>
            <p class="card-text"><strong>Car Brand:</strong> {{ $decision->car_brand }}</p>
            <p class="card-text"><strong>Year of Production:</strong> {{ $decision->year_of_prod }}</p>
            <p class="card-text"><strong>Decision Image:</strong></p>
            <img src="{{ asset($decision->decision_image) }}" alt="Decision Image" width="400" height="400">
        </div>
    </div>
</div>
@endsection
