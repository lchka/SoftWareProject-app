@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Decision Forms</h2>
    <div class="row">
        @foreach ($decisions as $decided)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Decision Form for {{ $decided->user->name }}</h5>
                    <p class="card-text">Submitted: {{ $decided->created_at->format('Y-m-d H:i:s') }}</p>
                    <!-- Display other relevant information about the form -->
                    <form action="{{ route('admin.decisions.submit', $decided->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="decision">Decision:</label>
                            <select name="decision" id="decision" class="form-control">
                                <option value="approved">Approved</option>
                                <option value="denied">Denied</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="points">Points Allocation (Max 2500):</label>
                            <input type="number" name="points" id="points" class="form-control" max="2500" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
