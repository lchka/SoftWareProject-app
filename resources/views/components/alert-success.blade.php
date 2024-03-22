<div class="row justify-content-center">
    <div class="col-md-6"> <!-- Adjust column width as needed -->
        @if (session('success'))
        <div class="alert alert-success mb-4 text-center" role="alert" style="max-width: 1200px;">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>
