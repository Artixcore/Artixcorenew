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
                    @if (session()->has('success.create'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Plan added successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('success.update'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Plan updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('success.delete'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Plan deleted successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Subscription Plans <span><a href="{{ route('packages.create') }}"
                                        class="btn btn-primary float-end"><i class="bi bi-plus-lg"></i></a></span></h5>
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Promo</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($packages as $package)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $package->title }}</td>
                                            <td>{{ $package->price }}</td>
                                            <td>{{ $package->promo }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('packages.edit', $package) }}"
                                                    class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                                <form class="ms-2" action="{{ route('packages.destroy', $package) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
