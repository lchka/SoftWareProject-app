@extends('layouts.app')

@section('content')
<x-alert-success>
                {{ session('success') }}
            </x-alert-success>
<div class="container">
    <h2>Recycling Requests</h2>
    <div class="row">
        @foreach ($decisions as $decision)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        @if ($decision->user)
                        Recycled Part: {{ $decision->name }}
                        @else
                        Decision Form (No User) - Decision ID: {{ $decision->id }}
                        @endif
                    </h5>
                    Submitted By {{ $decision->user->name }}
                    <p class="card-text">Email: {{ $decision->user->email }}</p>
                    <p class="card-text">Submitted: {{ $decision->created_at->format('Y-m-d') }}</p>

                    <!-- Display other relevant information about the form -->
                    <!-- admin.decisions.decided.blade.php -->
                    <form action="{{ route('admin.decisions.submit', $decision->id) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="decision">Decision:</label>
        <select name="status" id="decision" class="form-control">
            <option value="">Pending</option>
            <option value="approved">Approved</option>
            <option value="denied">Denied</option>
        </select>
    </div>
    <div class="form-group">
        <label for="points">Points Allocation (Max 2500):</label>
        <input type="number" name="points" id="points" class="form-control" max="2500">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


                    <!-- View button -->
                    <a href="{{ route('admin.decisions.show', $decision->id) }}" class="btn btn-info">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection