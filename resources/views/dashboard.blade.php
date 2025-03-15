@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5 fw-bold text-body-emphasis">Dashboard</h1>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Create Client</a>
        </div>

        <p class="lead">Welcome to your dashboard. Here you can manage your account, your clients, and much more.</p>

        <section aria-label="Client List">
            <h2>Client List</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @if(count($clients) > 0)
                    @foreach ($clients as $client)
                        <div class="col-md-4 mb-4">
                            <article class="card h-100">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        @if ($client->company_logo)
                                            <img src="{{ asset('storage/' . $client->company_logo) }}"
                                                 alt="{{ $client->name }} Logo"
                                                 class="img-fluid"
                                                 style="max-height: 100px;">
                                        @else
                                            <span>No Logo</span>
                                        @endif
                                    </div>
                                    <h5 class="card-title">{{ $client->name }}</h5>
                                    <p class="card-text">{{ $client->email }}</p>
                                    <p class="card-text">{{ $client->telephone ?? 'N/A' }}</p>
                                    <p class="card-text">{{ $client->address ?? 'N/A' }}</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>No clients found.</p>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection