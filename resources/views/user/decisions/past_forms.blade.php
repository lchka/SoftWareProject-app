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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pastForms as $form)
            <tr>
                <td>{{ $form->name }}</td>
                <td>{{ ucfirst($form->status) }}</td>
                <td>{{ $form->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <a href="{{ route('form.show', $form->id) }}" class="btn btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
