<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                {{ __("You're logged in!") }}

                <!-- Bootstrap Sections -->
                <div class="mt-8">
                    <!-- Section 1: Image and Text Box -->
                    <div class="row mb-4 my-5">
                        <div class="col-md-7">
                            <img src="image.jpg" class="img-fluid" alt="Image">
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Section 1: Small Text Box</h5>
                                    <p class="card-text">Content for the small text box.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <input type="text" class="form-control" placeholder="Empty Input Box">
                        </div>
                    </div>

                    <!-- Section 2: Card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Section 2
                        </div>
                        <div class="card-body">
                            Content for Section 2
                        </div>
                    </div>

                    <!-- Section 3: Alert -->
                    <div class="alert alert-primary" role="alert">
                        Section 3: This is a primary alert
                    </div>

                    <!-- Section 4: Buttons -->
                    <button type="button" class="btn btn-success">Section 4: Success Button</button>
                    <button type="button" class="btn btn-danger">Section 4: Danger Button</button>

                    <!-- Section 5: Form -->
                    <form>
                        <div class="form-group mt-4">
                            <label for="exampleFormControlInput1">Section 5: Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </form>

                    <!-- Section 6: List Group -->
                    <ul class="list-group mt-4">
                        <li class="list-group-item">Section 6: Item 1</li>
                        <li class="list-group-item">Section 6: Item 2</li>
                        <li class="list-group-item">Section 6: Item 3</li>
                    </ul>

                    <!-- Section 7: Carousel -->
                    <div id="carouselExampleSlidesOnly" class="carousel slide mt-4" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active my-5 ">
                                <img class="d-block w-100" src="..." alt="First slide">
                            </div>
                            <div class="carousel-item my-5">
                                <img class="d-block w-100 my-5" src="..." alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="..." alt="Third slide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-8">
                <div class="bg-gray-200 dark:bg-gray-700 py-4 text-center">
                    <p class="text-gray-800 dark:text-gray-300">Random words for the footer: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque euismod lectus non magna mollis consequat.</p>
                </div>
            </footer>
        </div>
    </div>
</x-app-layout>
