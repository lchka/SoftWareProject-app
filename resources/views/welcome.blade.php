@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" col-md-12 mx-5">
        <div class="row justify-content-center">
            <div>
                <h1>Hello World</h1>
                <h3>This is a laravel-bootstrap template</h3>
                <div class="row mt-5">
                    <!-- Left Column with Padding -->
                    <div class="col-md-5 bg-primary p-4">
                        <!-- Small Input Box -->
                        <input type="text" class="form-control mb-1" placeholder="Small Input Box">

                        <!-- Big Input Box -->
                        <input type="text" class="form-control py-5" placeholder="Big Input Box">
                    </div>

                    <!-- Right Column with Colored Square -->
                    <div class="col-md-7 bg-danger">
                        <!-- Colored Square -->
                        <div style="height: 100%; width: 100%;"></div>
                    </div>
                </div>

                <!-- Buttons Section -->
                <div class="row mt-5">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary">Primary</button>
                        <!-- Add more buttons as needed -->
                    </div>
                </div>

                <!-- Card Section -->
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
                    <!-- Add your card content here -->
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
