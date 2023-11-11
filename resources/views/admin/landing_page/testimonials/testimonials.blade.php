@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Testimonials</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Testimonials</li>
                    <li class="breadcrumb-item active">Testimonials</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Testimonials: Testimonials</h5>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Data updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Floating Labels Form -->
                            @foreach ($frontend_contents as $frontend_content)
                                <form class="row g-3 mb-3"
                                    action="{{ route('landing_page.testimonials.testimonials.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control" name="{{ 'testimonials_testimonial' }}"
                                        value="{{ @$frontend_content->name }}">
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="order_of_appearance"
                                                id="order_of_appearance" min="1"
                                                value="{{ @$frontend_content->order_of_appearance }}"
                                                placeholder="Order of Appearance" required>
                                            <label for="order_of_appearance">Order of Appearance</label>
                                        </div>
                                    </div>

                                    @php
                                        $data = json_decode($frontend_content->contents);
                                    @endphp
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ @$data->name }}" placeholder="Name" required>
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="designation" id="designation"
                                                value="{{ @$data->designation }}" placeholder="Designation" required>
                                            <label for="designation">Designation</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" name="rating" id="rating"
                                                min="1" max="5" value="{{ @$data->rating }}"
                                                placeholder="Rating" required>
                                            <label for="rating">Rating</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Review" name="review" id="review" style="height: 100px;" required>{{ @$data->review }}</textarea>
                                            <label for="review">Review</label>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form><!-- End floating Labels Form -->
                            @endforeach

                            <form class="row g-3" action="{{ route('landing_page.testimonials.testimonials.update') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" class="form-control" name="{{ 'testimonials_testimonial' }}"
                                    value="{{ 'testimonials_testimonial_' . $count + 1 }}">
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="order_of_appearance"
                                            id="order_of_appearance" min="1" placeholder="Order of Appearance"
                                            required>
                                        <label for="order_of_appearance">Order of Appearance</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Name" required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="designation" id="designation"
                                            placeholder="Designation" required>
                                        <label for="designation">Designation</label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="rating" id="rating"
                                            min="1" max="5" placeholder="Rating" required>
                                        <label for="rating">Rating</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Review" name="review" id="review" style="height: 100px;" required></textarea>
                                        <label for="review">Review</label>
                                    </div>
                                </div>
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
