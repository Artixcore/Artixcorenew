@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <nav class="d-flex justify-content-between">
                <div>
                    <h1>Employee List</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Employee</h5>
                            <!-- Floating Labels Form -->
                            {{-- from edit page  --}}
                            <form class="row g-3" action="{{ route('employees.update', $employee) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        {{-- for name  --}}
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $employee->name }}" placeholder="Name" required>
                                        <label for="name">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        {{-- for email  --}}
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $employee->email }}" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        {{-- for user_type --}}
                                        <select class="form-select" name="user_type" id="user_type" required>
                                            <option value="editor" @if ($employee->user_type == 'editor') selected @endif>Employee</option>
                                            <option value="admin" @if ($employee->user_type == 'admin') selected @endif>Admin</option>
                                        </select>
                                        <label for="user_type">User Type</label>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

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
