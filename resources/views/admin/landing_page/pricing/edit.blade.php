@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Subscription Plans</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Pricing</li>
                    <li class="breadcrumb-item active">Subscription Plans</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Subscription Plan</h5>
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="{{ route('packages.update', $package) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $package->title }}" placeholder="Title" required>
                                        <label for="title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="subtitle" id="subtitle"
                                            value="{{ $package->subtitle }}" placeholder="Subtitle" required>
                                        <label for="subtitle">Subtitle</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="order_of_appearance"
                                            id="order_of_appearance" value="{{ $package->order_of_appearance }}"
                                            placeholder="Order of Appearance" required>
                                        <label for="order_of_appearance">Order of Appearance</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="price" id="price"
                                            value="{{ $package->price }}" placeholder="Price" step=".01" required>
                                        <label for="price">Price</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="discount" id="discount"
                                            value="{{ $package->discount }}" placeholder="Discount" step=".01">
                                        <label for="discount">Discount</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="promo" id="promo"
                                            value="{{ $package->promo }}" placeholder="Promo">
                                        <label for="promo">Promo</label>
                                    </div>
                                </div>

                                <h6 class="mt-4">Details <button id="add-bullet-point" type="button"
                                        class="btn btn-sm btn-primary ms-2"><i class="bi bi-plus"></i></button></h6>
                                <span class="row" id="additional-bullet-points">
                                    @foreach (json_decode($package->details) as $key => $detail)
                                        <div class="col-md-4 my-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="details[]" id="details"
                                                    value="{{ $detail }}" placeholder="details" @required($key == 1)>
                                                <label for="details">Bullet Point</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </span>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
