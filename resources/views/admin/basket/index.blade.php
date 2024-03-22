@extends('layouts.app')

@section('content')
<x-alert-success>
                {{ session('success') }}
            </x-alert-success>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Basket') }}</div>

                <div class="card-body">
                    @if ($basketItems->isEmpty())
                    <p>Your basket is empty.</p>
                    @else
                    <ul class="list-group">
                        @php
                        $totalPrice = 0; // Initialize total price variable
                        @endphp
                        @foreach ($basketItems as $item)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center ">
                                <div>
                                    <span>{{ $item->name }}</span>
                                    <span class="ml-3">Quantity: {{ $item->pivot->quantity }}</span>
                                    <span class="ml-3 font-weight-bold ">Price: €{{ $item->price }}</span>
                                    @php
                                    $totalPrice += $item->price * $item->pivot->quantity; // Add price of current item to total price
                                    @endphp
                                </div>
                                <form action="{{ route('user.basket.remove', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-3">
                        <strong>Total Price: €{{ number_format($totalPrice, 2) }}</strong> <!-- Display total price -->
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection