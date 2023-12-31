@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav class="d-flex justify-content-between">
                <div>
                    <h1>Title</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">Our Values</li>
                        <li class="breadcrumb-item active">Title</li>
                    </ol>
                </div>

                <ul class="sidebar-nav col-2 flex-end">
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#our-values" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>Our Values</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="our-values" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('landing_page.our_values.title') }}">
                                    <i class="bi bi-circle"></i><span>Title</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('landing_page.our_values.sections') }}">
                                    <i class="bi bi-circle"></i><span>Sections</span>
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
                            <h5 class="card-title">Our Values: Title</h5>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Data updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Floating Labels Form -->
                            <form class="row g-3" action="{{ route('landing_page.our_values.title.update') }}"
                                method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ @$frontend_content->title }}" placeholder="Title">
                                        <label for="title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                            value="{{ @$frontend_content->meta_title }}" placeholder="Meta Title">
                                        <label for="meta_title">Meta Title</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Description" name="description" id="description" style="height: 100px;">{{ @$frontend_content->description }}</textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Meta Description" name="meta_description" id="meta_description"
                                            style="height: 100px;">{{ @$frontend_content->meta_description }}</textarea>
                                        <label for="meta_description">Meta Description</label>
                                    </div>
                                </div>
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
