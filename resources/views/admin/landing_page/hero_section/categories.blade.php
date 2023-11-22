@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav class="d-flex justify-content-between">
                <div>
                    <h1>Categories</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Hero Section</li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>

                <ul class="sidebar-nav col-2 flex-end">
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#hero-section" data-bs-toggle="collapse"
                            href="#">
                            <i class="bi bi-menu-button-wide"></i><span>Hero Section</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="hero-section" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('landing_page.hero_section.title') }}">
                                    <i class="bi bi-circle"></i><span>Title & Banner</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('landing_page.hero_section.categories') }}">
                                    <i class="bi bi-circle"></i><span>Categories</span>
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
                            <h5 class="card-title">Hero Section: Categories</h5>
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
                                    action="{{ route('landing_page.hero_section.categories.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control" name="{{ 'hero_section_category' }}"
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
                                    <div class="col-md-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="icon" id="icon"
                                                value="{{ @$data->icon }}" placeholder="Icon" required>
                                            <label for="icon">Icon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="link" id="link"
                                                value="{{ @$data->link }}" placeholder="Link" required>
                                            <label for="link">Link</label>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form><!-- End floating Labels Form -->
                            @endforeach

                            <form class="row g-3" action="{{ route('landing_page.hero_section.categories.update') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" class="form-control" name="{{ 'hero_section_category' }}"
                                    value="{{ 'hero_section_category_' . $count + 1 }}">
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
                                <div class="col-md-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="icon" id="icon"
                                            placeholder="Icon" required>
                                        <label for="icon">Icon</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="link" id="link"
                                            placeholder="Link" required>
                                        <label for="link">Link</label>
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
