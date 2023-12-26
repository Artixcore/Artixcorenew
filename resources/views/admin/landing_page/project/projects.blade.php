@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav class="d-flex justify-content-between">
                <div>
                    <h1>Projects</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item">project</li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>

                <ul class="sidebar-nav col-2 flex-end">
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-bs-target="#project" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-menu-button-wide"></i><span>project</span><i
                                class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="project" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                            <li>
                                <a href="{{ route('landing_page.project.title') }}">
                                    <i class="bi bi-circle"></i><span>Title</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('landing_page.project.projects') }}">
                                    <i class="bi bi-circle"></i><span>Projects</span>
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
                            <h5 class="card-title">project: Projects</h5>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Data updated successfully!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <!-- Floating Labels Form -->
                            @foreach ($frontend_contents as $frontend_content)
                                <form class="row g-3 mb-3" action="{{ route('landing_page.project.projects.update') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" class="form-control" name="{{ 'project_project' }}"
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
                                    <div class="col-md-4">
                                        <div class="form-floating">
                                            <select class="form-select" id="type" name="type" required>
                                                <option value="application" @if (@$data->type == 'application') selected @endif>Application</option>
                                                <option value="app_design" @if (@$data->type == 'app_design') selected @endif>App Design</option>
                                                <option value="web_design" @if (@$data->type == 'web_design') selected @endif>Web Design</option>
                                                <option value="ai" @if (@$data->type == 'ai') selected @endif>AI</option>
                                            </select>
                                            <label for="type">Type</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image">Thumbnail</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder="Banner">
                                        {{-- @if (@$frontend_content->image)
                                        <img src="{{ url($frontend_content->image) }}" alt="Banner"
                                            class="mt-3 img-fluid rounded">
                                        @endif --}}
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form><!-- End floating Labels Form -->
                            @endforeach

                            <form class="row g-3" action="{{ route('landing_page.project.projects.update') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" class="form-control" name="{{ 'project_project' }}"
                                    value="{{ 'project_project_' . $count + 1 }}">
                                <div class="col-md-4">
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
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="link" id="link"
                                            placeholder="Link" required>
                                        <label for="link">Link</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Description" name="description" id="description" style="height: 100px;"
                                            required></textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="type" name="type" required>
                                            <option value="application">Application</option>
                                            <option value="app_design">App Design</option>
                                            <option value="web_design">Web Design</option>
                                            <option value="ai">AI</option>
                                        </select>
                                        <label for="type">Type</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="image">Thumbnail</label>
                                    <input type="file" class="form-control" name="image" id="image"
                                        placeholder="Banner">
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
