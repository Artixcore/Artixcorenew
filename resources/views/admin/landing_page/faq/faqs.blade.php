@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav class="d-flex justify-content-between">
                <div>
                    <h1>FAQs</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Frequently Asked Questions</li>
                        <li class="breadcrumb-item active">FAQs</li>
                    </ol>
                </div>

                <ul class="sidebar-nav col-2 flex-end">
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#faq" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>Frequently Asked Question</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="faq" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('landing_page.faq.title') }}">
                                    <i class="bi bi-circle"></i><span>Title</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('landing_page.faq.faqs') }}">
                                    <i class="bi bi-circle"></i><span>FAQs</span>
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
                            <h5 class="card-title">Frequently Asked Questions: FAQs</h5>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Data updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Floating Labels Form -->
                            @foreach ($frontend_contents as $frontend_content)
                                <form class="row g-3 mb-3" action="{{ route('landing_page.faq.faqs.update') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control" name="{{ 'faq_faq' }}"
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
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ @$data->title }}" placeholder="Title" required>
                                            <label for="title">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Description" name="description" id="description" style="height: 100px;"
                                                required>{{ @$data->description }}</textarea>
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form><!-- End floating Labels Form -->
                            @endforeach

                            <form class="row g-3" action="{{ route('landing_page.faq.faqs.update') }}" method="POST">
                                @csrf
                                <input type="hidden" class="form-control" name="{{ 'faq_faq' }}"
                                    value="{{ 'faq_faq_' . $count + 1 }}">
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" name="order_of_appearance"
                                            id="order_of_appearance" min="1" placeholder="Order of Appearance"
                                            required>
                                        <label for="order_of_appearance">Order of Appearance</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Title" required>
                                        <label for="title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Description" name="description" id="description" style="height: 100px;"
                                            required></textarea>
                                        <label for="description">Description</label>
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
