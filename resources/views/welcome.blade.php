@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12 mx-5">
        <div class="row justify-content-center">
            <div>
                <h1>HI CLIMATE CHANGE ECO</h1>
                <h3>This is THE HOMEPAGE FOR GREENDIESEL</h3>
                <div class="row mt-5">
                    <!-- Left Column with Padding -->
                    <div class="col-md-5 bg-primary p-4">
                        <!-- Small Input Box -->
                        <input type="text" class="form-control mb-1" placeholder="Small Input Box">
                        <!-- Big Input Box -->
                        <input type="text" class="form-control py-5" placeholder="Big Input Box">
                    </div>
                    <div class="col-md-1"></div>
                    <!-- Right Column with Colored Square -->
                    <div class="col-md-6 bg-danger">
                        <!-- Colored Square -->
                        <div style="height: 100%; width: 100%;"></div>
                    </div>
                </div>

                <!-- Card Section -->

                <div class="row my-5 py-5 mx-3 ">
                    <h3>Promoting second hand parts</h3>
                    <div class="col-md-4 col-sm-6 my-1">
                        <div class="card bg-primary text-light border-0">
                            <img src="images/card_1.png" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up
                                    the bulk of the card's content.
                                </p>
                                <a href="#" class="btn btn-light text-dark fw-semibold">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 my-1">
                        <div class="card">
                            <img src="images/card_2.png" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up
                                    the bulk of the card's content.
                                </p>
                                <a href="#" class="btn btn-primary text-light fw-semibold">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 my-1">
                        <div class="card">
                            <img src="images/card_3.png" class="card-img-top" alt="..." />
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">
                                    Some quick example text to build on the card title and make up
                                    the bulk of the card's content.
                                </p>
                                <a href="#" class="btn btn-primary text-light fw-semibold">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>
                <footer class="footer bg-dark text-light py-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Section 1</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                    <li><a href="#">Link 3</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Section 2</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                    <li><a href="#">Link 3</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Section 3</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                    <li><a href="#">Link 3</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>Section 4</h5>
                                <ul class="list-unstyled">
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                    <li><a href="#">Link 3</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
    </div>
</div>
@endsection