@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Projects</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Portfolio</li>
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Portfolio: Projects</h5>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Data updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Floating Labels Form -->
                            @foreach ($frontend_contents as $frontend_content)
                                <form class="row g-3 mb-3" action="{{ route('landing_page.portfolio.projects.update') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control" name="{{ 'portfolio_project' }}"
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
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ @$data->title }}" placeholder="Title" required>
                                            <label for="title">Title</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="link" id="link"
                                                value="{{ @$data->link }}" placeholder="Link" required>
                                            <label for="link">Link</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
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

                            <form class="row g-3" action="{{ route('landing_page.portfolio.projects.update') }}"
                                method="POST">
                                @csrf
                                <input type="hidden" class="form-control" name="{{ 'portfolio_project' }}"
                                    value="{{ 'portfolio_project_' . $count + 1 }}">
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
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Title" required>
                                        <label for="title">Title</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="link" id="link"
                                            placeholder="Link" required>
                                        <label for="link">Link</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
