@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Past Forms</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Date Submitted</th>
                <th>Actions</th> <!-- Changed the heading to "Actions" -->
            </tr>
        </thead>
        <tbody>
            @foreach ($pastForms as $form)
            <tr>
                <td>{{ $form->name }}</td>
                <td>{{ ucfirst($form->status) }}</td>
                <td>{{ $form->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <a href="{{ route('decisions.show', $form->id) }}" class="btn btn-primary">View</a>
                    <!-- Button to delete the form -->
                    <form action="{{ route('decisions.destroy', $form->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this form?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
