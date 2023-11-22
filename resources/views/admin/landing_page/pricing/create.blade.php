@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav class="d-flex justify-content-between">
                <div>
                    <h1>Subscription Plans</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Pricing</li>
                        <li class="breadcrumb-item active">Subscription Plans</li>
                    </ol>
                </div>

                <ul class="sidebar-nav col-2 flex-end">
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#pricing" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>Pricing</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="pricing" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('landing_page.pricing.title') }}">
                                    <i class="bi bi-circle"></i><span>Title</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('packages.index') }}">
                                    <i class="bi bi-circle"></i><span>Plans</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Create Subscription Plan</h5>
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="{{ route('packages.store') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Title" required>
                                        <label for="title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subtitle" id="subtitle"
                                            placeholder="Subtitle" required>
                                        <label for="subtitle">Subtitle</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="order_of_appearance"
                                            id="order_of_appearance" placeholder="Order of Appearance" required>
                                        <label for="order_of_appearance">Order of Appearance</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="price" id="price"
                                            placeholder="Price" step=".01" required>
                                        <label for="price">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="discount" id="discount"
                                            placeholder="Discount" step=".01">
                                        <label for="discount">Discount</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="promo" id="promo"
                                            placeholder="Promo">
                                        <label for="promo">Promo</label>
                                    </div>
                                </div>

                                <h6 class="mt-4">Details <button id="add-bullet-point" type="button"
                                        class="btn btn-sm btn-primary ms-2"><i class="bi bi-plus"></i></button></h6>
                                <span class="row" id="additional-bullet-points">
                                    <div class="col-md-4 my-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="details[]" id="details"
                                                placeholder="details" required>
                                            <label for="details">Bullet Point</label>
                                        </div>
                                    </div>
                                </span>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form><!-- End floating Labels Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#add-bullet-point').click(function(e) {
                e.preventDefault();
                $('#additional-bullet-points').append(
                    `
                    <div class="col-md-4 my-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="details[]"
                                placeholder="details">
                            <label>Bullet Point</label>
                        </div>
                    </div>
                    `
                );
            });
        });
    </script>
@endpush
